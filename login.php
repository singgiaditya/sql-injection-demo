<?php
session_start();
include 'db.php';

$result = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $username = mysqli_real_escape_string($conn,$username);
    // jum'at
    // var_dump($username);
    $password = $_POST['password'];

    // if (!filter_var($username, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^[a-zA-Z0-9]+$/"]])) {
    //     $result = "<div class='alert alert-warning'>Invalid Username!</div>";
    // }

    // // Versi aman dengan prepared statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password); // 'ss' untuk 2 parameter string
    mysqli_stmt_execute($stmt);
    $query = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $result = "<div class='alert alert-danger'>Login gagal!</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Login</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h4>Secure Login Form</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="mb-3">
                            <label class="form-label">Username:</label>
                            <input type="text" name="username" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" required />
                        </div>
                        <button type="submit" class="btn btn-success w-100">Login</button>
                    </form>

                    <div class="mt-3">
                        <?php echo $result; ?>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3 text-muted">
                <small>Form ini sudah aman dari SQL Injection 😎</small>
            </div>
        </div>
    </div>
</div>

</body>
</html>
