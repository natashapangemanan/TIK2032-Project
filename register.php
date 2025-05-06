<?php
include "database.php";

$register_message = "";

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $register_message = "Silakan isi username dan password terlebih dahulu.";
    } else {
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";

    if($db->query($sql))  {
        $register_message = "akun berhasil dibuat. silahkan login!";
    } else {
        $register_message = "gagal membuat akun, coba lagi!";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.html" ?>
    <section class="register">
    <h3>Daftar Akun</h3>
    <i><?= $register_message ?></i>
    <form action="register.php" method="POST">
        <div class="register-input">
        <input type="text" placeholder="username" name="username" class="register-usn">
        <input type="password" placeholder="password" name="password" class="register-pw">
        </div>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
        <button type="submit" name="register"> Daftar </button
    </form>
</section>
    <?php include "footer.html" ?>
</body>
</html>