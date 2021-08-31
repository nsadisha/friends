<?php include "php/friends.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Friends</title>
</head>
<body>

  <?php
    // $userName = $_REQUEST["username"];
    // $sql = "SELECT * FROM users where username=\"$userName\"";
    // $result = execute($sql);

    if(isUserAvailable("nsadisha")){
      echo "user found!<br>";
    }else{
      echo "user not found!<br>";
    }

    addFriend("test11","test22");
    removeFriend("test11","test22");

    // if ($result->num_rows > 0) {

    //   echo "<h1>User found!</h1>";
    //   // output data of each row
    //   while($row = $result->fetch_assoc()) {
    //     echo "Name: " . $row["name"]. " Country: " . $row["country"]. "<br>";
    //   }
    // } else {
    //   echo "<h1>No user found!</h1>";
    // }
  ?>
  
</body>
</html>