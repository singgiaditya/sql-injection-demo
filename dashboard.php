<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4>Selamat datang, <?= htmlspecialchars($_SESSION['username']) ?>!</h4>
                </div>
                <div class="card-body">
                    <p class="lead">Kamu berhasil login ke dashboard.</p>
                    <p>Halaman ini hanya bisa diakses setelah login. Gunakan halaman ini untuk menguji session atau buat fitur lanjutan di sini.</p>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
