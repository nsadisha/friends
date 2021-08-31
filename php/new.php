<?php include "db.php"; ?>
<?php include "friends.php"; ?>

<?php
  //create a new user
  if(isset($_REQUEST["submit"])){
    //getting user information
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    if(strlen($password)<8){
      die("<h3>Password must have atleast 8 charactors. <a href=\"/friends/register.php\">Try again!</a></h3>");
    }

    if(!isEmailUsed($email)){
      $query = "INSERT INTO users(name, email, username, password) VALUES('$name', '$email', '$username', '$password')";
      $res = execute($query);
      if($res){
        echo "<h3>Registration successfull!!! Go to your <a href=\"/friends/index.php?username=$username\">account</a>.</h3>";
      }else{
        echo "<h3>Unfortunately, your account cannot be created!</h3>";
      }
    }else{
      echo "<h3>This email is already used. <a href=\"/friends/register.php\">Try with a new one</a>.</h3>";
    }
  }else{
    echo "<h2>Please submit the form!</h2>";
  }


?>