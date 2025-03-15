<?php
    require './koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <div class="d-flex align-items-center gap-3 mb-4">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <h1>Tambah Buku</h1>
            </div>
            <form method="post" action="aksi_tambah.php">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai</label>
                    <select class="form-select" id="nilai" name="nilai" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ulasan" class="form-label">Ulasan</label>
                    <textarea class="form-control" id="ulasan" name="ulasan" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Buku</button>
            </form>
        </div>
    </body>
</html>