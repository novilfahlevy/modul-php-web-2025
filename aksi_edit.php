<?php
// Memulai session
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['sudah_login']) || $_SESSION['sudah_login'] !== true) {
    header('Location: login.php');
    exit;
}

require './koneksi.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $judul = $_POST["judul"];
    $nilai = $_POST["nilai"];
    $ulasan = $_POST["ulasan"];

    $sql = "UPDATE buku SET judul = ?, nilai = ?, ulasan = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $judul, $nilai, $ulasan, $id);

    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    header('Location: index.php');
    exit;
}

