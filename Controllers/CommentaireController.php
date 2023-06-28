<?php

namespace App\Controllers;

require_once 'Models/CommentaireModel.php';

use App\Models\CommentaireModel;

class CommentaireController{
    protected $commentaireModel;

    public function __construct(){
        $this->commentaireModel = new CommentaireModel();
    }

}