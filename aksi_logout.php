<?php
// Memulai session
session_start();

// Ganti data Session dengan array kosong
// (ini bertujuan untuk menghapus semua data session)
$_SESSION = [];

// Menghancurkan session
session_destroy();

// Redirect ke halaman login
header("Location: login.php");
exit;