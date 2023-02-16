<?php
namespace App\Controllers;

use App\Request;

class AdminController extends Controller {
    public function index() {
        if(!isset($_SESSION['id'])) {
            header("Location: ./");
        }
        return $this->view('Back-end/index', []);
    }
}