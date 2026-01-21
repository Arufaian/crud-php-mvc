<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Spp.php';

class SppController {
    private $sppModel;

    public function __construct() {
        $this->sppModel = new Spp();
    }

    public function index() {
        $spp = $this->sppModel->getAll();
        require_once __DIR__ . '/../views/spp/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tahun = $_POST['tahun'] ?? 0;
            $nominal = $_POST['nominal'] ?? 0;

            if ($this->sppModel->create($tahun, $nominal)) {
                header('Location: index.php?controller=spp&action=index');
                exit();
            }
        }
        require_once __DIR__ . '/../views/spp/create.php';
    }

    public function edit($id) {
        $spp = $this->sppModel->getById($id);

        if (!$spp) {
            header('Location: index.php?controller=spp&action=index');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tahun = $_POST['tahun'] ?? 0;
            $nominal = $_POST['nominal'] ?? 0;

            if ($this->sppModel->update($id, $tahun, $nominal)) {
                header('Location: index.php?controller=spp&action=index');
                exit();
            }
        }
        require_once __DIR__ . '/../views/spp/edit.php';
    }

    public function delete($id) {
        if ($this->sppModel->delete($id)) {
            header('Location: index.php?controller=spp&action=index');
            exit();
        }
    }
}
