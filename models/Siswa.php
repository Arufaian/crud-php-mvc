<?php

class Siswa {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM tabel_siswa ORDER BY nisn DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tabel_siswa WHERE nisn = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO tabel_siswa (nisn, nis, nama, id_kelas, nama_kelas, alamat, no_telp, id_spp) VALUES (:nisn, :nis, :nama, :id_kelas, :nama_kelas, :alamat, :no_telp, :id_spp)");
        $stmt->bindParam(':nisn', $data['nisn'], PDO::PARAM_INT);
        $stmt->bindParam(':nis', $data['nis']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':id_kelas', $data['id_kelas'], PDO::PARAM_INT);
        $stmt->bindParam(':nama_kelas', $data['nama_kelas']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':no_telp', $data['no_telp']);
        $stmt->bindParam(':id_spp', $data['id_spp'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE tabel_siswa SET nisn = :nisn, nis = :nis, nama = :nama, id_kelas = :id_kelas, nama_kelas = :nama_kelas, alamat = :alamat, no_telp = :no_telp, id_spp = :id_spp WHERE nisn = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nisn', $data['nisn'], PDO::PARAM_INT);
        $stmt->bindParam(':nis', $data['nis']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':id_kelas', $data['id_kelas'], PDO::PARAM_INT);
        $stmt->bindParam(':nama_kelas', $data['nama_kelas']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':no_telp', $data['no_telp']);
        $stmt->bindParam(':id_spp', $data['id_spp'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tabel_siswa WHERE nisn = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
