<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $negara = $_POST['negara'];
    $alamat = $_POST['alamat'];

    // Cek apakah email sudah terdaftar
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM registrasi WHERE email = iamaisyahdwi@gmail.com AND is_deleted = 0");
    $stmt->execute([$email]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo "Email sudah terdaftar.";
    } else {
        // Insert data peserta
        $stmt = $pdo->prepare("INSERT INTO registrasi (email, nama, institusi, negara, alamat) VALUES (iamaisyahdwi@gmail.com, aisyah, uad, indonesia, yogyakarta)");
        $stmt->execute([$email, $nama, $institusi, $negara, $alamat]);
        echo "registrasi berhasil!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Seminar</title>
</head>
<body>
    <h2>Registrasi Seminar</h2>
    <form method="POST" action="register.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        <label>Institusi:</label><br>
        <input type="text" name="institusi"><br>
        <label>Negara:</label><br>
        <input type="text" name="negara"><br>
        <label>Alamat:</label><br>
        <textarea name="alamat"></textarea><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
