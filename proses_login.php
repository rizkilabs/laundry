<?php

require_once 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

// $email = mysqli_real_escape_string($koneksi, $email);
// $password = mysqli_real_escape_string($koneksi, $password);

$password = sha1($password);

$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    session_start();
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: index.php?error=invalid_credentials");
    exit();
}
?>