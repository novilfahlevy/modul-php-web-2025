<?php
// Memulai session
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['sudah_login']) || $_SESSION['sudah_login'] !== true) {
    header('Location: login.php');
    exit;
}

require './koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM buku WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $stmt->close();
    $conn->close();

    header('Location: index.php');
    exit;
}