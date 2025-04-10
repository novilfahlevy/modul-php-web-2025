<?php

// Memulai session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'koneksi.php';

    // Mengambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mempersiapkan query untuk dieksekusi
    $sql = "SELECT id, username, password FROM pengguna WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    // Mengeksekusi (menjalankan) query
    $stmt->execute();

    // Mengambil data pengguna dari query
    $result = $stmt->get_result();

    // Cek apakah ada pengguna dengan username tersebut
    if ($result->num_rows === 1) {
        $pengguna = $result->fetch_assoc();

        // Verifikasi password
        if ($password === $pengguna['password']) {
            // Simpan data pengguna ke session
            $_SESSION['sudah_login'] = true;
            $_SESSION['id_pengguna'] = $pengguna['id'];
            $_SESSION['username'] = $pengguna['username'];

            // Jika login berhasil, redirect ke halaman index.php
            header("Location: index.php");
            exit;
        } else {
            // Password salah
            $_SESSION['error'] = "Username atau password salah";
        }
    } else {
        // Username tidak ditemukan
        $_SESSION['error'] = "Username atau password salah";
    }

    // Jika login gagal, kembalikan ke halaman login dengan pesan error
    header("Location: login.php");
    exit;
}