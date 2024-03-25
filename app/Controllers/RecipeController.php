<?php
namespace App\Controllers;


class RecipeController extends BaseController{
    public function index() 
    {
        return $this->view("clients/recipes");
    }
}