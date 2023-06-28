<?php

namespace App\Controllers;

require_once 'Models/PostModel.php';
require_once 'Models/CommentaireModel.php';

use App\Models\PostModel;
use App\Models\CommentaireModel;

class PostController {
    protected $postModel;
    protected $commentaireModel;

    public function __construct() {
        $this->postModel = new PostModel();
        $this->commentaireModel = new CommentaireModel();
    }

    public function getIndex() {
        $posts = $this->postModel->getAllPost();
        $post = null;
        require_once 'Views/posts/index.php';
    }

    public function getCreate() {
        $post = null;
        require_once 'Views/posts/create.php';
    }

    public function postCreate() {
        $post = $_POST;
        $this->postModel->createPost($post);
        header('Location: ../post/index');
    }

    public function getDelete($id) {
        $this->postModel->delete($id);
        header('Location: ../../post/index');
    }

    public function getUpdate($id) {
        $post = $this->postModel->getPostById($id);
        require_once 'Views/posts/create.php';
    }

    public function postUpdate($id) {
        $post = $_POST;
        $this->postModel->updatePost($id, $post);
        header('Location: ../../post/index');
    }

    public function getDetails($id){
        $post = $this->postModel->getPostById($id);
        $commentaires = $this->commentaireModel->getAll($id);
        require_once 'Views/posts/details.php';
    }
}
