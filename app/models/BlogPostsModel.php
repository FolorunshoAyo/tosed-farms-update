<?php

class BlogPostsModel{
    public static function total(){
        try{
            global $pdo;

            $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM blog_posts");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['total'];
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function create($admin_id, $category_id, $featured_image, $title, $content, $status)
    {
        try{
            global $pdo;
            $query = "INSERT INTO blog_posts (admin_id, category_id, featured_image, title, content, status) 
                      VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$admin_id, $category_id, $featured_image, $title, $content, $status]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function update($post_id, $featured_image, $category_id, $title, $content, $status)
    {
        try{
            global $pdo;

            $query = "UPDATE blog_posts
            SET category_id = ?, featured_image = ?, title = ?, content = ?, status = ?
            WHERE post_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$category_id, $featured_image, $title, $content, $status, $post_id]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function updateWithoutImage($post_id, $category_id, $title, $content, $status)
    {
        try{
            global $pdo;

            $query = "UPDATE blog_posts
            SET category_id = ?, title = ?, content = ?, status = ?
            WHERE post_id = ?";
            $stmt = $pdo->prepare($query);
            return $stmt->execute([$category_id, $title, $content, $status, $post_id]);

        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllBlogPosts($category, $limit, $offset) {
        if($category === ''){
            try{
                global $pdo;
    
                $query = "SELECT admins.*, blog_posts.*, blog_categories.name  AS category
                FROM blog_posts
                INNER JOIN blog_categories ON  blog_posts.category_id = blog_categories.category_id
                INNER JOIN admins ON blog_posts.admin_id = admins.admin_id
                WHERE NOT status = 3
                ORDER BY blog_posts.title LIMIT $limit OFFSET $offset";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
    
                $blogPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $blogPosts;
            }catch (PDOException $e) {
                return false;
            }
        }else{
            try{
                global $pdo;
    
                $query = "SELECT admins.*, blog_posts.*, blog_categories.name AS category
                FROM blog_posts
                INNER JOIN blog_categories ON  blog_posts.category_id = blog_categories.category_id
                INNER JOIN admins ON blog_posts.admin_id = admins.admin_id
                WHERE blog_categories.name = ? AND NOT status = 3
                ORDER BY blog_posts.title LIMIT $limit OFFSET $offset";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$category]);
    
                $blogPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                return $blogPosts;
            }catch (PDOException $e) {
                return false;
            }
        }
    }

    public static function getBlogPost($post_id) {
        try{
            global $pdo;

            $query = "SELECT blog_posts.*, blog_categories.*, admins.*
            FROM blog_posts
            INNER JOIN blog_categories ON  blog_posts.category_id = blog_categories.category_id
            INNER JOIN admins ON blog_posts.admin_id = admins.admin_id
            WHERE post_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$post_id]);

            $blogPost = $stmt->fetch(PDO::FETCH_ASSOC);

            return $blogPost;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getBlogPostByTitle($title) {
        try{
            global $pdo;

            $query = "SELECT blog_posts.*, blog_categories.name as category_name, admins.*
            FROM blog_posts
            INNER JOIN blog_categories ON  blog_posts.category_id = blog_categories.category_id
            INNER JOIN admins ON blog_posts.admin_id = admins.admin_id
            WHERE title = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$title]);

            $blogPost = $stmt->fetch(PDO::FETCH_ASSOC);

            return $blogPost;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getLatestBlogPosts($amount) {
        try{
            global $pdo;

            $query = "SELECT blog_posts.*, blog_categories.name as category_name, admins.* 
            FROM blog_posts 
            INNER JOIN blog_categories ON  blog_posts.category_id = blog_categories.category_id
            INNER JOIN admins ON blog_posts.admin_id = admins.admin_id
            WHERE status = 2 
            ORDER BY date_posted DESC 
            LIMIT $amount";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $blogPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $blogPosts;
        }catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllBlogCategories() {
        try{
            global $pdo;

            $query = "SELECT * FROM blog_categories ORDER BY name";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $blogCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $blogCategories;
        }catch (PDOException $e) {
            return false;
        }

    }

    public function searchBlogPosts($search_term){
        try{
            global $pdo;

            $query = "SELECT *
            FROM blog_posts
            WHERE title LIKE '%?%' OR category LIKE '%?%'
            ORDER BY name";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$search_term]);

            $blogPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $blogPosts;
        }catch (PDOException $e) {
            return false;
        }
    }
}