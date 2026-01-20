<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        require_once __DIR__ . '/../views/dashboard.php';
    }

    public function users() {
        $users = $this->userModel->getAll();
        require_once __DIR__ . '/../views/users.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            if ($this->userModel->create($name, $email)) {
                header('Location: index.php?action=users');
                exit();
            }
        }
        require_once __DIR__ . '/../views/create.php';
    }

    public function edit($id) {
        $user = $this->userModel->getById($id);

        if (!$user) {
            header('Location: index.php?action=users');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';

            if ($this->userModel->update($id, $name, $email)) {
                header('Location: index.php?action=users');
                exit();
            }
        }
        require_once __DIR__ . '/../views/edit.php';
    }

    public function delete($id) {
        if ($this->userModel->delete($id)) {
            header('Location: index.php?action=users');
            exit();
        }
    }
}