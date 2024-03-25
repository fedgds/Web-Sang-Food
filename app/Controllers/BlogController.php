<?php
namespace App\Controllers;


class BlogController extends BaseController{
    public function index() 
    {
        return $this->view("clients/blog");
    }
}