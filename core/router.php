<?php
// Router class definition
class Router {
    protected $routes = [];

    public function get($url, $controllerMethod) {
        $this->routes['GET'][$url] = $controllerMethod;
    }

    public function post($url, $controllerMethod) {
        $this->routes['POST'][$url] = $controllerMethod;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$method][$url])) {
            // Extract controller and method from route
            list($controller, $method) = explode('@', $this->routes[$method][$url]);
            // Include the controller file
            require_once 'app/controllers/' . $controller . '.php';
            // Create an instance of the controller
            $controllerInstance = new $controller();
            // Call the method
            $controllerInstance->$method();
        } else {
            if (strpos($url, '/tosed-farms/admin') === 0) {
                include VIEW_PATH . '/admin/404.php'; 
            } else {
                echo '404 - User Page Not Found';
            }
        }
    }
}
