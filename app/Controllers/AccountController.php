<?php
namespace App\Controllers;

use App\Models\AccountModel;
class AccountController extends BaseController{
    public function list() {
        // $accounts = AccountModel::all();
        $accounts = AccountModel::where('role', '!=', '2')->get();
        return $this->view(
            "admin/account/list",
            ["accounts" => $accounts]
        );
    }
    public function delete() {
        $id = $_GET['id'];
        AccountModel::delete($id);
        header("Location: " . ROOT_PATH . "account/list");
        die;
    }
    public function phanquyen() {
        $id = $_GET['id'];
        $accountModel = new AccountModel;

        $newRole = 1;

        $result = $accountModel->updateColumn($id, 'role', $newRole);

        if ($result) {
            header("Location: " . ROOT_PATH . "account/list");
            die;
        } else {
            echo "Failed to update role.";
        }
    }
    public function goquyen() {
        $id = $_GET['id'];
        $accountModel = new AccountModel;

        $newRole = 0;

        $result = $accountModel->updateColumn($id, 'role', $newRole);

        if ($result) {
            header("Location: " . ROOT_PATH . "account/list");
            die;
        } else {
            echo "Failed to update role.";
        }
    }
}