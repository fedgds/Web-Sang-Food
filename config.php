<?php
const ROOT_PATH = "http://localhost/web-sang-food-mvc/";
const ROOT_URI = "/web-sang-food-mvc/";
function dd($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
function redirect($route) {
    header("location: ". ROOT_PATH . $route);
}