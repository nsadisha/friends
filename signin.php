<?php include "php/db.php"; ?>
<?php include "php/friends.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends | Sign in</title>
    <style>
      *{
        padding: 0;
        margin: 0;
      }
      .form-div{
        border: solid 2px grey;
        border-radius: 10px;
        padding: 3rem 1rem;
        position: absolute;
        text-align: center;
        width: 25%;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      .form-div h1{
        margin-bottom: 2rem;
      }
      .form-div form .input-group{
        width: 100%;
        margin-bottom: 0.3rem;
        display: grid;
        text-align: start;
      }
      .form-div form .input-group label{
        font-weight: 600;
      }
      .form-div form .input-group input{
        padding: 0.5rem;
        border: solid 1px rgba(0,0,0,0.5);
        border-radius: 5px;
      }
      .form-div form .input-group input[type=submit]{
        margin-top: 1rem;
        cursor: pointer;
      }
      .err{
        color: red;
      }
    </style>
</head>
<body>

  <?php
    session_start();
    $err = "";
    if(isset($_REQUEST["submit"])){
      $email = $_REQUEST["email"];
      $password = $_REQUEST["password"];

      if(strlen($password)<8){
        $err =  "<br><br><h3 class=\"err\">Invalid password. Password is less than 8 charactors.</h3>";
      }else{
        if(isEmailUsed($email)){
          if($password == getPasswordForEmail($email)){
            $_SESSION['email'] = $email;
            header("Location: index.php");
          }else{
            $err = "<br><br><h3 class=\"err\">Incorrect password.</h3>";
          }
        }
      }
    }
  ?>

   <div class="form-div">
    <h1>Sign in</h1>
    <form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" id="submit" value="Sign in">
      </div>
    </form>
    <?php echo $err; ?>
  </div>
</body>
</html>