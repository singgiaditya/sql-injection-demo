<?php
$host = "localhost";
// $user = "root";
// $pass = "";
$user = "appuser";
$pass = "passwordku";
$db   = "sql_injection";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
