<?php
session_start();
require_once "./env.php";
require_once "./config.php";
require_once __DIR__ . "/vendor/autoload.php";

use App\Controllers\HomeController;
use App\Controllers\CategoryController;
use App\Controllers\RecipeController;
use App\Controllers\BlogController;
use App\Controllers\AboutController;
use App\Controllers\AuthController;
use App\Controllers\ProductController;
use App\Controllers\AccountController;
use App\Controllers\CommentController;
use App\Controllers\CartController;
use App\Router;

$router = new Router();
// Clients
Router::get("/", [HomeController::class, 'index']); 
Router::get("/home", [HomeController::class, 'index']); 
Router::get("/detail", [HomeController::class, 'detail']);
Router::get("/comment", [CommentController::class, 'comment']);
Router::get("/comment", [CommentController::class, 'listWhere']);
Router::post("/comment", [CommentController::class, 'insert']);
Router::get("/categories", [CategoryController::class, 'index']); 
Router::get("/category", [CategoryController::class, 'productInCategory']); 
Router::get("/recipes", [RecipeController::class, 'index']); 
Router::get("/blog", [BlogController::class, 'index']); 
Router::get("/about", [AboutController::class, 'index']); 
Router::get("/cart", [CartController::class, 'list']); 
Router::get("/delete-cart", [CartController::class, 'delete']); 
Router::post("/detail", [CartController::class, 'addCart']); 
Router::get("/login", [AuthController::class, 'login']); 
Router::post("/login", [AuthController::class,'doLogin'] );
Router::get("/signup", [AuthController::class, 'signup']); 
Router::post("/signup", [AuthController::class, 'register']); 
Router::get("/logout", [AuthController::class, 'logout']); 
// Admin
error_reporting(0);
if(isset($_SESSION['user']) && $_SESSION['user']['role'] != 0){
    Router::get("/admin/home", [HomeController::class, 'homeAdmin']); 

    Router::get("/category/list", [CategoryController::class, 'list']);
    Router::get("/category/add", [CategoryController::class, 'add']);
    Router::post("/category/add", [CategoryController::class, 'store']);
    Router::get("/category/edit", [CategoryController::class, 'edit']);
    Router::post("/category/edit", [CategoryController::class, 'update']);
    Router::get("/category/delete", [CategoryController::class, 'delete']); 

    Router::get("/product/list", [ProductController::class, 'list']); 
    Router::get("/product/add", [ProductController::class, 'add']); 
    Router::post("/product/add", [ProductController::class, 'store']); 
    Router::get("/product/edit", [ProductController::class, 'edit']); 
    Router::post("/product/edit", [ProductController::class, 'update']); 
    Router::get("/product/delete", [ProductController::class, 'delete']); 

    Router::get("/comment/list", [CommentController::class, 'list']);
    Router::get("/comment/delete", [CommentController::class, 'delete']);
    if($_SESSION['user']['role'] == 2){
        Router::get("/account/list", [AccountController::class, 'list']);
        Router::get("/account/delete", [AccountController::class, 'delete']);
        Router::get("/account/phanquyen", [AccountController::class, 'phanquyen']);
        Router::get("/account/goquyen", [AccountController::class, 'goquyen']);
    }
}

$router->resolve();
