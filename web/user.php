<?php 
session_start();
if (!isset($_SESSION['session_username'])) {
    header("location:login_web.php");
    exit();
}

print_r("Login Berhasil")
// print_r($_SESSION);
// print_r($_COOKIE);

?>