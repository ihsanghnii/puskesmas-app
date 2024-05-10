<?php 
session_start();
require_once('dbkoneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script>alert('Harap mengisi semua kolom!'); window.location.href='register.html';</script>";
        exit;
    }

    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $hashedPassword = md5($password);
    $role = "operator";

    $checkEmail = $dbh->prepare("SELECT * FROM user WHERE email = ?");
    $checkEmail->execute([$email]);
    if ($checkEmail->rowCount() > 0) {
        echo "<script>alert('Email sudah terdaftar! Silakan login atau gunakan email lain.'); window.location.href='login.html';</script>";
        exit;
    }

    try {
        $sql = "INSERT INTO user (nama, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$nama, $email, $hashedPassword, $role]);

        echo "<script>alert('Pendaftaran Berhasil! Anda Sekarang Bisa Login'); window.location.href='login.html';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Pendaftaran gagal! Error: " . $e->getMessage() . "');</script>";
    }
}
?>
