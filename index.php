<?php
    require_once("config.php");

    if(isset($_POST['register'])){
    
        // filter data yang diinputkan
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        // enkripsi password
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    
    
        // menyiapkan query
        $sql = "INSERT INTO users (firstname, lastname, email, password) 
                VALUES (:firstname, :lastname, :email, :password)";
        $stmt = $db->prepare($sql);
    
        // bind parameter ke query
        $params = array(
            ":firstname" => $firstname,
            ":lastname" => $lastname,
            ":password" => $password,
            ":email" => $email
        );
    
        // eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute($params);
    
        // jika query simpan berhasil, maka user sudah terdaftar
        // maka alihkan ke halaman login
        if($saved) header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aflah Mahdi Yazdi">

    <title>My Login - Account Registration</title>
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
        <form class="form" action="" method="POST">
            <p class="title">Register</p>
            <p class="message">Signup now and get full access to our app. </p>
                <div class="flex">
                <label>
                    <input required="" placeholder="" type="text" class="input" name="firstname" />
                    <span>Firstname</span>
                </label>

                <label>
                    <input required="" placeholder="" type="text" class="input" name="lastname" />
                    <span>Lastname</span>
                </label>
            </div>  
                    
            <label>
                <input required="" placeholder="" type="email" class="input" name="email" />
                <span>Email</span>
            </label> 
                
            <label>
                <input required="" placeholder="" type="password" class="input" name="password" />
                <span>Password</span>
            </label>
            <button type="submit" class="submit" name="register">Submit</button>
            <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>
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