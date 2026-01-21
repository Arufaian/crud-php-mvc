<?php

class Petugas {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM tabel_petugas ORDER BY id_petugas DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tabel_petugas WHERE id_petugas = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($username, $password, $nama_petugas, $level) {
        $stmt = $this->pdo->prepare("INSERT INTO tabel_petugas (username, password, nama_petugas, level) VALUES (:username, :password, :nama_petugas, :level)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nama_petugas', $nama_petugas);
        $stmt->bindParam(':level', $level);
        return $stmt->execute();
    }

    public function update($id, $username, $password, $nama_petugas, $level) {
        $stmt = $this->pdo->prepare("UPDATE tabel_petugas SET username = :username, password = :password, nama_petugas = :nama_petugas, level = :level WHERE id_petugas = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nama_petugas', $nama_petugas);
        $stmt->bindParam(':level', $level);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tabel_petugas WHERE id_petugas = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
