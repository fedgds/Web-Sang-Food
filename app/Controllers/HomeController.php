<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class HomeController extends BaseController{
    public function index() 
    {
        // $products = ProductModel::all();
        $products = ProductModel::where('status', '=', '0')
                                ->limit('8')
                                ->get();
        $categories = CategoryModel::all();
        return $this->view("clients/home", ['products'=>$products, 'categories'=>$categories]);
    }
    public function detail()
    {
        $id = $_GET['id'];
        $products = ProductModel::find($id);
        return $this->view("clients/detail", ['products'=>$products]);
    }
    public function homeAdmin()
    {
        return $this->view("admin/home");
    }
}