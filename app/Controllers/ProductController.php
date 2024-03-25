<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends BaseController {
    public function join() {
        $joins = [
            "JOIN categories ON products.idCategory = categories.id"
        ];
        return $joins;
    }
    public function list() {
        $message = $_COOKIE['message'] ?? '';
        $productModel = new ProductModel();
        $products = $productModel->select('categories.name as cateName', 'products.id', 'products.name', 'products.price', 'products.image', 'products.des', 'products.status')
        ->join($this->join())
        ->orderBy('products.id', 'desc')
        ->getJoin();
        return $this->view(
            "admin/products/list",
            ["products" => $products, 'message' => $message]
        );
    }
    public function add() {
        $categories = CategoryModel::all();
        return $this->view(
            "admin/products/add",
            ["categories" => $categories]
        );
    }
    public function store() {
        $data = $_POST;
        $file = $_FILES['image'];
        $image = $file['name'];
        move_uploaded_file($file['tmp_name'], "images/" . $image);
        $data['image'] = $image;

        $product = new ProductModel;
        $product->insert($data);
        header("Location: ".ROOT_PATH."product/list");
        die;
    }
    public function edit() {
        $id = $_GET['id'];
        $product = ProductModel::find($id);
        $categories = CategoryModel::all();
        return $this->view(
            "admin/products/edit",
            ['product' => $product, 'categories' => $categories]
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

        $product = new ProductModel;
        $product->update($data['id'], $data);
        
        header("Location: " . ROOT_PATH . "product/edit?id=" . $data['id']);
        die;
    }
    public function delete() {
        $id = $_GET['id'];
        ProductModel::delete($id);
        setcookie("message", "Xóa thành công", time() + 1);
        header("Location: " . ROOT_PATH . "product/list");
        die;
    }
}