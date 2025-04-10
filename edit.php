<?php
    // Memulai session
    session_start();
    
    // Cek apakah user sudah login
    if (!isset($_SESSION['sudah_login']) || $_SESSION['sudah_login'] !== true) {
        header('Location: login.php');
        exit;
    }
    
    // Kalau ga ada ID di URL, redirect ke index.php (halaman utama)
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    require './koneksi.php';

    // Ambil ID dari URL, dan ambil data buku dari database berdasarkan ID tersebut
    $id = $_GET['id'];
    $sql = "SELECT id, judul, nilai, ulasan FROM buku WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Ambil hasil query
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika bukunya ada, ambil data buku sebagai array asosiatif
        $row = $result->fetch_assoc();
    } else {
        // Jika tidak ada data buku dengan ID tersebut, redirect ke index.php (halaman utama)
        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <?php require './navbar.php'; ?>

        <div class="container mt-5">
            <div class="d-flex align-items-center gap-3 mb-4">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <h1>Edit Buku</h1>
            </div>

            <!-- Masukan ID ke URL pada atribut action -->
            <form method="post" action="aksi_edit.php?id=<?= $row['id'] ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $row['judul'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai</label>
                    <select class="form-select" id="nilai" name="nilai" required>
                        <option value="1" <?= $row['nilai'] == 1 ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= $row['nilai'] == 2 ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= $row['nilai'] == 3 ? 'selected' : '' ?>>3</option>
                        <option value="4" <?= $row['nilai'] == 4 ? 'selected' : '' ?>>4</option>
                        <option value="5" <?= $row['nilai'] == 5 ? 'selected' : '' ?>>5</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ulasan" class="form-label">Ulasan</label>
                    <textarea class="form-control" id="ulasan" name="ulasan" rows="3" required><?= $row['ulasan'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit Buku</button>
            </form>
        </div>
    </body>
</html>