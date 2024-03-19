<?php
class BlogCommentsModel
{
    public static function total($post_id) {
        try{
            global $pdo;

            $query = "SELECT COUNT(*) as total FROM blog_comments WHERE post_id = ? AND (approved IS NULL OR approved = 1)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$post_id]);

            $commentsTotal = $stmt->fetch(PDO::FETCH_ASSOC);

            return $commentsTotal['total'];
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function totalForClient($post_id) {
        try{
            global $pdo;

            $query = "SELECT COUNT(*) as total FROM blog_comments WHERE post_id = ? AND approved = 1";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$post_id]);

            $commentsTotal = $stmt->fetch(PDO::FETCH_ASSOC);

            return $commentsTotal['total'];
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function createComment($post_id, $comment, $admin_id = "", $user_id = "", $comment_details = array())
    {
        if (!empty($admin_id)) {
            // $admin_id has a value
            try{
                global $pdo;
                $query = "INSERT INTO blog_comments (post_id, admin_id, message, approved) 
                          VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$post_id, $admin_id, $comment, 1]);
    
                return true;
            }catch (PDOException $e) {
                return false;
            }
        } elseif (!empty($user_id)) {
            // $user_id has a value
            try{
                global $pdo;
                $query = "INSERT INTO blog_comments (post_id, user_id, message) 
                          VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$post_id, $user_id, $comment]);
    
                return true;
            }catch (PDOException $e) {
                return false;
            }
        } elseif (!empty($comment_details)) {
            // $comment_details is an array and has elements
            try{
                global $pdo;
                $query = "INSERT INTO blog_comments (post_id, name, email, message) 
                          VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$post_id, $comment_details['name'], $comment_details['email'], $comment]);
    
                return true;
            }catch (PDOException $e) {
                return false;
            }
        } else {
            // None of the variables have values
        }
    }

    public static function getAllComments($post_id) {
        try{
            global $pdo;

            $query = "SELECT * FROM blog_comments WHERE post_id = ? ORDER BY date_posted DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$post_id]);

            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $comments;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getComment($comment_id) {
        try{
            global $pdo;

            $query = "SELECT * FROM blog_comments WHERE comment_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$comment_id]);

            $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $comment;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function updateCommentStatus($comment_id, $status)
    {
        try{
            global $pdo;

            $query = "UPDATE blog_comments
            SET approved = ?
            WHERE comment_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$status, $comment_id]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function updateComment($comment_id, $message)
    {
        try{
            global $pdo;

            $query = "UPDATE blog_comments
            SET message = ?
            WHERE comment_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$message, $comment_id]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function deleteComment($comment_id)
    {
        try{
            global $pdo;

            $query = "DELETE FROM blog_comments WHERE comment_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$comment_id]);

        }catch (PDOException $e) {
            return false;
        }
    }
}
