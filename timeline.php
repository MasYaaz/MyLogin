<?php require_once("auth.php"); ?>
<!-- ini buat verifikasi login -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aflah Mahdi Yazdi">

    <title>My Login - Sign in</title>
    <link rel="shortcut icon" href="res/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="js/bootstrap.min.js"></script>

</head>
<body>
    <header>
        <nav class="navbar bg-transparent bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand mx-auto" href="#">
                <img src="res/logo.png" alt="My Login" width="50" height="50">
              </a>
            </div>
          </nav>
    </header>
    <main>
        <div class="container tengah">
        <form action="logout.php" method="POST" class="form">
            <p class="title">Selamat Datang!</p>
            <p class="message">Selamat datang di akun anda</p>
            <h5>Email</h5>
            
            <p><?php echo $_SESSION["user"]["email"]?></p>
            <!-- ini buat nampilin string 1 kali -->

            <h5>Nama</h5>

            <p><?php echo ucwords($_SESSION["user"]["firstname"]." ".$_SESSION["user"]["lastname"],'UTF-8')?></p>
            <!-- ini buat nampilin string 2 atau lebih -->
            <!-- ucwords setelah echo untuk huruf kapital setiap kata -->
            
            <button class="submit" type="submit">Log Out</button>
        </form>
      </div>
    </main>
    <footer>
        <nav class="navbar fixed-bottom bg-transparent bg-body-tertiary">
            <div class="container">
              <a class="navbar-brand mx-auto logo">
                &copy MyLogin Copyright 2025
              </a>
            </div>
          </nav>
    </footer>
</body>
</html>