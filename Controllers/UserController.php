<?php

namespace App\Controllers;
require_once 'Models/UserModel.php';

use App\Models\UserModel;

class UserController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getRegister()
    {
        require_once 'Views/user/register.php';
    }

    public function postRegister()
    {
        $user = $_POST;
        $message = $this->userModel->createUser($user);
        echo $message;
        echo '<a href="../user/login">Se connecter</a>';
    }

    public function getLogin(){
        require_once 'Views/user/login.php';
    }

    public function postLogin()
    {
      $this->userModel = new UserModel();
      $user = $this->userModel->getOneByEmail($_POST['email']);
      if ($user && password_verify($_POST['password'], $user->password_utilisateur)) {
        $_SESSION['user'] = $user;
        header('Location: ../post/index');
        
        
      } 
    }

    public function getLogout(){
        session_destroy();
        header('Location: ../user/login');
    }

    public function getCompteUser(){
        require_once 'Views/user/compteUser.php';
    }

    public function getModifyUser($id){
        $user = $this->userModel->getUserById($id);
        require_once 'Views/user/modifyUser.php';
    }
}

// $post = $this->postModel->getPostById($id);

