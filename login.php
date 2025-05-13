<?php
include "database.php";

$register_message = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $register_message = "Silakan isi username dan password terlebih dahulu.";
    } else {
        $check_sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $db->query($check_sql);

        if ($result->num_rows > 0) {
            $register_message = "Akun dengan username tersebut sudah ada, silakan login.";
        } else {
            $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
            if ($db->query($sql)) {
                $register_message = "Akun berhasil dibuat. Silakan login!";
            } else {
                $register_message = "Gagal membuat akun, coba lagi!";
            }
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
        <section class="login">
        <h3>Masuk Akun</h3>
        <i><?= $login_message ?></i>
        <form action="login.php" method="POST">
            <div class="login-input">
            <input type="text" placeholder="username" name="username" class="login-usn">
            <input type="password" placeholder="password" name="password" class="login-pw">
            </div>
            <p>Belum punya akun? <a href="register.php">Register</a></p>
            <div class="login-button">
            <button type="submit" name="login"> Masuk </button>
            </div>
        </form>
</section>
        <?php include "footer.html" ?>
    </body>
   
    </html>
