<?php
namespace App;

class Router {
    protected static $routes = [];
    // Method get: dùng để gọi đến đường dẫn $path theo phương thức GET
    public static function get($path, $callback) {
        static::$routes['get'][$path] = $callback;
    }
    // Method post: dùng để gọi đến đường dẫn $path theo phương thức POST
    public static function post($path, $callback) {
        static::$routes['post'][$path] = $callback;
    }
    // Method getMethod để lấy REQUEST_METHOD trên sever
    public function getMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    // Method resolve: để giải quyết các đường dẫn được truyền vào $routes
    public function resolve() {
        $method = $this->getMethod();
        $path = str_replace(ROOT_URI, "/", $_SERVER['REQUEST_URI']);   
        // Tìm vị trí của dấu ?
        $position = strpos($path, "?");
        // Cắt bỏ phần tham số nếu tìm thấy
        if ($position) {
            $path = substr($path, 0, $position);
        }
        $callback = false;
        if(isset(static::$routes[$method][$path])) {
            $callback = static::$routes[$method][$path];
        }
        if($callback === false) {
            echo "404 FILE NOT FOUND";
            die;
        }
        if(is_callable($callback)) {
            return $callback();
        }
        // Kiểm tra callback là mảng
        if(is_array($callback)) {
            $callback[0] = new $callback[0];
            return call_user_func($callback);
        }
    }
}