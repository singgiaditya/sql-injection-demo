<?php
session_start();
include 'db.php';

$result = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    // SELECT * FROM users WHERE username = '' OR 1=1; -- ' AND password = '$password'
    // $query = mysqli_query($conn, $sql);
    $query = mysqli_multi_query($conn, $sql);

    var_dump($query);
    
    // $data = $query->fetch_assoc();

    // if (mysqli_num_rows($query) > 0) {
    //     $_SESSION['username'] = $data['username'];
    //     // var_dump($data);
    //     header("Location: dashboard.php");
    //     // exit;
    // } else {
    //     // var_dump($sql);
    //     $result = "<div class='alert alert-danger'>Login gagal!</div>";
    // }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>SQL Injection Demo</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h4>Login Form - SQL Injection Demo</h4>
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
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <div class="mt-3">
                        <?php echo $result; ?>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3 text-muted">
                <small>Form yang tidak aman oleh sql injection</small>
            </div>
        </div>
    </div>
</div>

</body>
</html>
