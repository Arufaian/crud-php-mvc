<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Petugas.php';

class PetugasController {
    private $petugasModel;

    public function __construct() {
        $this->petugasModel = new Petugas();
    }

    public function index() {
        require_once __DIR__ . '/../views/dashboard/index.php';
    }

    public function petugas() {
        $petugas = $this->petugasModel->getAll();
        require_once __DIR__ . '/../views/petugas/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);
            $nama_petugas = $_POST['nama_petugas'] ?? '';
            $level = $_POST['level'] ?? 'petugas';

            if ($this->petugasModel->create($username, $password, $nama_petugas, $level)) {
                header('Location: index.php?action=petugas');
                exit();
            }
        }
        require_once __DIR__ . '/../views/petugas/create.php';
    }

    public function edit($id) {
        $petugas = $this->petugasModel->getById($id);

        if (!$petugas) {
            header('Location: index.php?action=petugas');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $petugas['password'];
            $nama_petugas = $_POST['nama_petugas'] ?? '';
            $level = $_POST['level'] ?? 'petugas';

            if ($this->petugasModel->update($id, $username, $password, $nama_petugas, $level)) {
                header('Location: index.php?action=petugas');
                exit();
            }
        }
        require_once __DIR__ . '/../views/petugas/edit.php';
    }

    public function delete($id) {
        if ($this->petugasModel->delete($id)) {
            header('Location: index.php?action=petugas');
            exit();
        }
    }
}
