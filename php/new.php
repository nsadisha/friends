<?php include "db.php"; ?>
<?php include "friends.php"; ?>

<?php
  //create a new user
  // if(isset($_REQUEST["submit"])){
    // getting user information
    // $name = $_REQUEST["name"];
    // $email = $_REQUEST["email"];
    // $username = $_REQUEST["username"];
    // $password = $_REQUEST["password"];
    $name = "test";
    $email = "test";
    $username = "test";
    $password = "test";

    if(!isEmailUsed($email)){
      echo "available<br>";
      $query = "INSERT INTO users(name, email, username, password) VALUES('$name', '$email', '$username', '$password')";
      $res = execute($query);
      if($res){
        echo "Success!<br>";
      }else{
        echo "Failed!<br>";
      }
    }else{
      echo "email found<br>";
    }
  // }


?>