<?php

class Spp {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM tabel_spp ORDER BY id_spp DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tabel_spp WHERE id_spp = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($tahun, $nominal) {
        $stmt = $this->pdo->prepare("INSERT INTO tabel_spp (tahun, nominal) VALUES (:tahun, :nominal)");
        $stmt->bindParam(':tahun', $tahun, PDO::PARAM_INT);
        $stmt->bindParam(':nominal', $nominal);
        return $stmt->execute();
    }

    public function update($id, $tahun, $nominal) {
        $stmt = $this->pdo->prepare("UPDATE tabel_spp SET tahun = :tahun, nominal = :nominal WHERE id_spp = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':tahun', $tahun, PDO::PARAM_INT);
        $stmt->bindParam(':nominal', $nominal);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tabel_spp WHERE id_spp = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
