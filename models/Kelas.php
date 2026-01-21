<?php

class Kelas {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM tabel_kelas ORDER BY id_kelas DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tabel_kelas WHERE id_kelas = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($nama_kelas, $komp_keahlian) {
        $stmt = $this->pdo->prepare("INSERT INTO tabel_kelas (nama_kelas, komp_keahlian) VALUES (:nama_kelas, :komp_keahlian)");
        $stmt->bindParam(':nama_kelas', $nama_kelas);
        $stmt->bindParam(':komp_keahlian', $komp_keahlian, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id, $nama_kelas, $komp_keahlian) {
        $stmt = $this->pdo->prepare("UPDATE tabel_kelas SET nama_kelas = :nama_kelas, komp_keahlian = :komp_keahlian WHERE id_kelas = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nama_kelas', $nama_kelas);
        $stmt->bindParam(':komp_keahlian', $komp_keahlian, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tabel_kelas WHERE id_kelas = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
