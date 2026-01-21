<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Siswa.php';
require_once __DIR__ . '/../models/Kelas.php';

class SiswaController {
    private $siswaModel;
    private $kelasModel;

    public function __construct() {
        $this->siswaModel = new Siswa();
        $this->kelasModel = new Kelas();
    }

    public function index() {
        $siswa = $this->siswaModel->getAll();
        require_once __DIR__ . '/../views/siswa/index.php';
    }

    public function create() {
        $kelas = $this->kelasModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nisn' => $_POST['nisn'] ?? 0,
                'nis' => $_POST['nis'] ?? '',
                'nama' => $_POST['nama'] ?? '',
                'id_kelas' => $_POST['id_kelas'] ?? 0,
                'nama_kelas' => $_POST['nama_kelas'] ?? '',
                'alamat' => $_POST['alamat'] ?? '',
                'no_telp' => $_POST['no_telp'] ?? '',
                'id_spp' => $_POST['id_spp'] ?? 0
            ];

            if ($this->siswaModel->create($data)) {
                header('Location: index.php?controller=siswa&action=index');
                exit();
            }
        }
        require_once __DIR__ . '/../views/siswa/create.php';
    }

    public function edit($id) {
        $siswa = $this->siswaModel->getById($id);
        $kelas = $this->kelasModel->getAll();

        if (!$siswa) {
            header('Location: index.php?controller=siswa&action=index');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nisn' => $_POST['nisn'] ?? 0,
                'nis' => $_POST['nis'] ?? '',
                'nama' => $_POST['nama'] ?? '',
                'id_kelas' => $_POST['id_kelas'] ?? 0,
                'nama_kelas' => $_POST['nama_kelas'] ?? '',
                'alamat' => $_POST['alamat'] ?? '',
                'no_telp' => $_POST['no_telp'] ?? '',
                'id_spp' => $_POST['id_spp'] ?? 0
            ];

            if ($this->siswaModel->update($id, $data)) {
                header('Location: index.php?controller=siswa&action=index');
                exit();
            }
        }
        require_once __DIR__ . '/../views/siswa/edit.php';
    }

    public function delete($id) {
        if ($this->siswaModel->delete($id)) {
            header('Location: index.php?controller=siswa&action=index');
            exit();
        }
    }
}
