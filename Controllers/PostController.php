<?php

namespace App\Controllers;

require_once 'Models/PostModel.php';

use App\Models\PostModel;

class PostController {
    protected $postModel;

    public function __construct() {
        $this->postModel = new PostModel();
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
}
