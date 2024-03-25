<?php
namespace App\Controllers;

use App\Models\AccountModel;


class AuthController extends BaseController{
    public function login() 
    {
        $message = $_COOKIE['message'] ?? '';
        return $this->view(
            "clients/login",
            ['message' => $message]
        );
    }
    public function signup() 
    {
        return $this->view("clients/signup");
    }
    public function  register(){
        $data = $_POST;

        $account = new AccountModel;
        $account->insert($data);
        header("Location: ".ROOT_PATH."login");
        die;
    }
    public function  doLogin(){
        $data = $_POST;

        $accounts = AccountModel::where('email', '=', $data['email'])
                                ->andWhere('password', '=', $data['password'])
                                ->get();

        if (!empty($accounts)) {
            // $_SESSION['email'] = $data['email'];
            // $_SESSION['username'] = $data['username'];
            $user = $accounts[0]; // Lấy user đầu tiên nếu có nhiều kết quả
            $_SESSION['user'] = [
                'id' => $user->id, 
                'email' => $user->email,
                'username' => $user->username,
                'role' => $user->role,
            ];
            header("Location: " . ROOT_PATH . "home");
        } else {
            setcookie("message", "Sai thông tin", time() + 1);
            header("Location: " . ROOT_PATH . "login");
        }
    }
    public function logout(){
        unset($_SESSION['user']);
        header("Location: " . ROOT_PATH . "home");
        die;
    }
}