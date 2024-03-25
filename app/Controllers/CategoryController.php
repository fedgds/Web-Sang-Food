<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class CategoryController extends BaseController{
    public function index() {
        $categories = CategoryModel::all();
        return $this->view(
            "clients/categories",
            ["categories" => $categories]
        );
    }
    public function productInCategory() {
        $idCate = $_GET['id'];
        $category = CategoryModel::where('id', '=', $idCate)->get();
        $products = ProductModel::where('idCategory', '=', $idCate)->get();
        return $this->view("clients/category", ['products'=>$products, 'category'=>$category]);
    }
    public function list() {
        $message = $_COOKIE['message'] ?? '';
        $categories = CategoryModel::all();
        return $this->view(
            "admin/categories/list",
            ["categories" => $categories, 'message' => $message]
        );
    }
    public function add() {
        return $this->view("admin/categories/add");
    }
    public function store() {
        $data = $_POST;
        $file = $_FILES['image'];
        $image = $file['name'];
        move_uploaded_file($file['tmp_name'], "images/" . $image);
        $data['image'] = $image;

        $category = new CategoryModel;
        $category->insert($data);
        header("Location: ".ROOT_PATH."category/list");
        die;
    }
    public function edit() {
        $id = $_GET['id'];
        $category = CategoryModel::find($id);
        return $this->view(
            "admin/categories/edit",
            ['category' => $category]
        );
    }
    public function update() {
        $data = $_POST;
        $file = $_FILES['image'];
        
        if ($file['size'] > 0) {
            $image = $file['name'];
            move_uploaded_file($file['tmp_name'], "images/" . $image);
            $data['image'] = $image;
        }

        $category = new CategoryModel;
        $category->update($data['id'], $data);
        
        header("Location: " . ROOT_PATH . "category/edit?id=" . $data['id']);
        die;
    }
    public function delete() {
        $id = $_GET['id'];
        CategoryModel::delete($id);
        setcookie("message", "Xóa thành công", time() + 1);
        header("Location: " . ROOT_PATH . "category/list");
        die;
    }
}