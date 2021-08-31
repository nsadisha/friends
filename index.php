<?php include "php/friends.php"; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/styles.css">
  <title>Friends | Home</title>

  <style>
    h1,h4{text-align:center;}
    .links{
      display: flex;
      justify-content: center;
    }
    a{
      padding: 0.5rem 1rem;
      margin: 0 5px;
      background: rgba(0,0,0,0.2);
      font-size: 1.2rem;
      border-radius: 5px;
      cursor: pointer;
      text-decoration:none;
    }
  </style>
</head>
<body>
  <h1>Friends Management System</h1>
  <h4>
    Name: Sadisha Nimsara Gangodage<br>
    Student No: SE/2018/017<br>
    Email: nsadisha@gmail.com
  </h4>
  <div class="links">
    <?php if(!empty($_SESSION["email"])){ ?>
      <a href="profile.php">Profile</a>
      <a href="php/logout.php">Logout</a>
    <?php }else{ ?>      
      <a href="register.php">Register</a>
      <a href="signin.php">Sign in</a>
    <?php } ?>
    <a href="about.php">About</a>
  </div>
  
</body>
</html>