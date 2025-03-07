<?php
    // Database connection
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ulasan_buku";

    $conn = mysqli_connect($hostname, $username, $password, $dbname, 3360);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Reviews</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h1>Buku Favorit</h1>
                <a href="tambah.php" class="btn btn-primary">Tambah</a>
            </div>
            <div class="row">
                <?php
                    // Ambil data buku dari database
                    $sql = "SELECT judul, nilai, ulasan FROM buku";
                    $result = $conn->query($sql);
                ?>

                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3"><?php echo htmlspecialchars($row["judul"]); ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">
                                        Rating:
                                        <?php
                                            $rating = intval($row["nilai"]);
                                            for ($i = 0; $i < 5; $i++) {
                                                if ($i < $rating) {
                                                    echo '★';
                                                } else {
                                                    echo '☆';
                                                }
                                            }
                                        ?>
                                    </h6>
                                    <p class="card-text"><?php echo htmlspecialchars($row["ulasan"]); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Belum ada data buku</p>
                <?php endif; ?>

                <?php $conn->close(); ?>
            </div>
        </div>
    </body>
</html>