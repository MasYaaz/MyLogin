<?php
  
require_once("config.php");

if(isset($_POST['login'])){

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt =$db->prepare($sql);

    //bind parameter ke querry
    $params = array(
        ":email" => $email,
    );
    
    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //jika user terdaftar
    if($user){
        // Verifikasi password
        if(password_verify($password, $user["password"])){
            // buat session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: timeline.php");
            exit;
        }
        else{
            $error = "Password Salah!";
        }
    } else{
        $error = "Email Tidak Ditemukan!";
    }
}

?>

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
        <form class="form" action="" method="POST">
            <p class="title">Sign in</p>
            <p class="message">Sign in before continue to our web.</p>
            <label>
                <input required="" placeholder="" type="email" class="input" name="email">
                <span>Email</span>
            </label> 
                
            <label>
                <input required="" placeholder="" type="password" class="input" name="password">
                <span>Password</span>
            </label>
            <button class="submit" type="submit" name="login">Sign in</button>
            <p class="signin">Don't have account? <a href="index.php">Signup</a> </p>
        </form>
        </div>
        <?php if (!empty($error)): ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
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