<?php

namespace App\Controllers;

require_once 'Models/UserModel.php';

use App\Models\UserModel;

class UserController {
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function getRegister() {
        require_once 'Views/user/register.php';
    }

    public function postRegister() {
        $user = $_POST;
        $message = $this->userModel->createUser($user);
        echo $message;
        echo '<a href="../user/login">Se connecter</a>';
    }


    // public function deleteRegister()
    // {
    //     $user = $_POST;
    //     $this->userModel->deleteUser($user);

    // }

    public function getLogin()
    {
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

    public function getLogout()
    {
        session_destroy();
        header('Location: ../user/login');
    }

    public function getCompteUser()
    {
        require_once 'Views/user/compteUser.php';
    }

    public function getModify($id_utilisateur)
    {
        $user = $this->userModel->getUserById($id_utilisateur);
        require_once 'Views/user/modify.php';
    }

    public function getUserIndex()
    {
        echo ($_SESSION['user']->id_utilisateur);
        $users = $this->userModel->getAllUser();
        $user = null;
        require_once 'Views/user/index.php';
    }
}
