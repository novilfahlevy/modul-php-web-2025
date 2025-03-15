<?php

require './koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $nilai = $_POST["nilai"];
    $ulasan = $_POST["ulasan"];

    $sql = "INSERT INTO buku (judul, nilai, ulasan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $judul, $nilai, $ulasan);

    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    header('Location: index.php');
    exit;
}