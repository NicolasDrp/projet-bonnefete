<?php

namespace App\Controllers;

require_once 'Models/LogModel.php';

use App\Models\LogModel;

class LogController {
    protected $logModel;

    public function __construct() {
        $this->logModel = new LogModel();
    }

    public function getIndex() {
        $logs = $this->logModel->recupererLogs();
        require_once 'Views/logs/index.php';
    }
}
