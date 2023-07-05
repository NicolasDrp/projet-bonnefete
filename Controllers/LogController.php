<?php

namespace App\Controllers;

require_once 'Models/LogModel.php';

use App\Models\LogModel;

class LogController {
    protected $logModel;

    public function __construct() {
        // Instanciation du modèle nécessaire
        $this->logModel = new LogModel();
    }

    public function getIndex() {
        // Récupérer les logs à partir du modèle LogModel
        $logs = $this->logModel->recupererLogs();
        // Inclure la vue pour afficher les logs
        require_once 'Views/logs/index.php';
    }
}
