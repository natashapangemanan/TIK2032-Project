    <?php
    include "database.php";

    $login_message = "";

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $login_message = "Silakan isi username dan password terlebih dahulu.";
        } else {
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $db->query($sql); 

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            header("location: index.html");
        } else {
                $login_message = "akun tidak ditemukan";
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