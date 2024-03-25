<?php
namespace App\Controllers;

use App\Models\CartModel;

class CartController extends BaseController {
    public function list() {
        $carts = CartModel::where('idAccount', '=', $_SESSION['user']['id'])->get();
        return $this->view(
            "clients/cart", 
            ['carts'=>$carts]
        );
    }
    public function addCart() {
        $data = $_POST;

        $cart = new CartModel;
        $cart->insert($data);
        header("Location: ".ROOT_PATH."cart");
        die;
    }
    public function delete() {
        $id = $_GET['id'];
        CartModel::delete($id);
        header("Location: " . ROOT_PATH . "cart");
        die;
    }
}