<?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ulasan_buku";

    $conn = new mysqli($servername, $username, $password, $dbname, 3360);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul = $_POST["judul"];
        $nilai = $_POST["nilai"];
        $ulasan = $_POST["ulasan"];

        $sql = "INSERT INTO buku (judul, nilai, ulasan) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sis", $judul, $nilai, $ulasan);

        if ($stmt->execute()) {
            echo '<div class="container">
                <div class="alert alert-success mt-5" role="alert">
                    Buku berhasil ditambahkan
                </div>
            </div>';
        } else {
            echo '<div class="container">
                <div class="alert alert-danger mt-5" role="alert">
                    Buku gagal ditambahkan
                </div>
            </div>';
        }

        $stmt->close();
    }

    $conn->close();
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
            <form method="post" action="">
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