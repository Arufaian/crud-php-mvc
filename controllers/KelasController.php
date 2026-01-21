<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Kelas.php';

class KelasController {
    private $kelasModel;

    public function __construct() {
        $this->kelasModel = new Kelas();
    }

    public function index() {
        require_once __DIR__ . '/../views/dashboard/index.php';
    }

    public function kelas() {
        $kelas = $this->kelasModel->getAll();
        require_once __DIR__ . '/../views/kelas/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_kelas = $_POST['nama_kelas'] ?? '';
            $komp_keahlian = $_POST['komp_keahlian'] ?? 0;

            if ($this->kelasModel->create($nama_kelas, $komp_keahlian)) {
                header('Location: index.php?controller=kelas&action=kelas');
                exit();
            }
        }
        require_once __DIR__ . '/../views/kelas/create.php';
    }

    public function edit($id) {
        $kelas = $this->kelasModel->getById($id);

        if (!$kelas) {
            header('Location: index.php?controller=kelas&action=kelas');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_kelas = $_POST['nama_kelas'] ?? '';
            $komp_keahlian = $_POST['komp_keahlian'] ?? 0;

            if ($this->kelasModel->update($id, $nama_kelas, $komp_keahlian)) {
                header('Location: index.php?controller=kelas&action=kelas');
                exit();
            }
        }
        require_once __DIR__ . '/../views/kelas/edit.php';
    }

    public function delete($id) {
        if ($this->kelasModel->delete($id)) {
            header('Location: index.php?controller=kelas&action=kelas');
            exit();
        }
    }
}
