<?php
class BlogCommentsRepliesModel
{
    public static function createReply($comment_id, $reply, $admin_id = "", $user_id = "", $reply_details = array())
    {
        if (!empty($admin_id)) {
            // $admin_id has a value
            try{
                global $pdo;
                $query = "INSERT INTO blog_comment_replies (comment_id, admin_id, message, approved) 
                          VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$comment_id, $admin_id, $reply, 1]);

                return true;
            }catch (PDOException $e) {
                return false;
            }
        } elseif (!empty($user_id)) {
            // $user_id has a value
            try{
                global $pdo;
                $query = "INSERT INTO blog_comment_replies (comment_id, user_id, message) 
                          VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$comment_id, $user_id, $reply]);
    
                return true;
            }catch (PDOException $e) {
                return false;
            }
        } elseif (!empty($reply_details)) {
            // $comment_details is an array and has elements
            try{
                global $pdo;
                $query = "INSERT INTO blog_comment_replies (comment_id, name, email, message) 
                          VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$comment_id, $reply_details['name'], $reply_details['email'], $reply]);
    
                return true;
            }catch (PDOException $e) {
                return false;
            }
        } else {
            // None of the variables have values
        }
    }

    public static function getAllCommentReplies($comment_id) {
        try{
            global $pdo;

            $query = "SELECT * FROM blog_comment_replies WHERE comment_id = ? ORDER BY date_posted DESC";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$comment_id]);

            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $comments;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function updateCommentReplyStatus($reply_id, $status)
    {
        try{
            global $pdo;

            $query = "UPDATE blog_comment_replies
            SET approved = ?
            WHERE reply_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$status, $reply_id]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function updateCommentReply($reply_id, $message)
    {
        try{
            global $pdo;

            $query = "UPDATE blog_comment_replies
            SET message = ?
            WHERE reply_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$message, $reply_id]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function deleteReply($reply_id)
    {
        try{
            global $pdo;

            $query = "DELETE FROM blog_comment_replies WHERE reply_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$reply_id]);

        }catch (PDOException $e) {
            return false;
        }
    }
}
