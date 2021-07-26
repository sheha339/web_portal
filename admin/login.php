<?php

session_start();

// jika sudah login, alihkan ke halaman list
if (isset($_SESSION['user'])) {
    header('Location: list-artikel.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/style-login.css" />
</head>
<body>
    <div class="container">
        <form method="post" action="proses-login.php">
            <p>
            Username<br>
            <input name="username" />
            </p>

            <p>
            Password<br>
            <input name="password" type="password" />
            </p>

            <p><input type="submit" /></p>
        </form>
    </div>
    
</body>
</html>
