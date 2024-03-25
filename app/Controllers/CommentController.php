<?php
namespace App\Controllers;

use App\Models\CommentModel;

class CommentController extends BaseController {
    public function join(){
        $joins = [
            "JOIN products ON comment.idProduct = products.id
             JOIN account ON comment.idAccount = account.id"
        ];
        return $joins;
    }
    public function list(){
        $commentModel = new CommentModel();
        $comments = $commentModel->select('comment.id', 'comment.text', 'products.name', 'account.username', 'comment.date')
        ->join($this->join())
        ->orderBy('comment.id', 'desc')
        ->getJoin();
        return $this->view(
            "admin/comment/list",
            ["comments" => $comments]
        );
    }
    public function listWhere(){
        $commentModel = new CommentModel();
        $comments = $commentModel
            ->select('comment.id', 'comment.idProduct', 'comment.text', 'products.name', 'account.username', 'comment.date')
            ->join($this->join())
            ->whereEqual('comment.idProduct', $_GET['id'])
            ->orderBy('comment.id', 'desc')
            ->getJoin();
    
        return $this->view(
            "clients/comment",
            ["comments" => $comments]
        );
    }
    
    public function insert() {
        $data = $_POST;
        $id = $data['id'];
        $comment = new CommentModel;
        $comment->insert($data);
        header("Location: ".ROOT_PATH."comment?id=$id");
        die;
    }
    public function delete() {
        $id = $_GET['id'];
        CommentModel::delete($id);
        header("Location: " . ROOT_PATH . "comment/list");
        die;
    }
    public function comment() {
        return $this->view("clients/comment");
    }
}