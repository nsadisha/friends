<?php include "db.php"; ?>

<?php

  //execute a query
  function execute($query){
    global $conn;
    $result = $conn->query($query);
    return $result;
  }

  // checking a user is available with username
  function isUserAvailable($username){
    $query = "SELECT * FROM users where username=\"$username\"";
    $result = execute($query);

    if ($result->num_rows > 0) {
      return true;
    }else{
      return false;
    }
  }

  // checking a user is available with email
  function isEmailUsed($email){
    $query = "SELECT * FROM users where email=\"$email\"";
    $result = execute($query);

    if ($result->num_rows > 0) {
      return true;
    }else{
      return false;
    }
  }

  // add friend
  function addFriend($email, $friend){
    $query1 = "INSERT INTO friends(email, friendEmail) VALUES('$email', '$friend')";
    $query2 = "INSERT INTO friends(email, friendEmail) VALUES('$friend', '$email')";
    $res = execute($query1);
    $res = execute($query2);
    if($res){
      echo "Added!<br>";
    }else{
      echo "Already added!<br>";
    }
  }
  // remove from friends
  function removeFriend($email, $friend){
    $query1 = "DELETE FROM friends WHERE email='$email' and friendEmail='$friend'";
    $query2 = "DELETE FROM friends WHERE email='$friend' and friendEmail='$email'";
    $res = execute($query1);
    $res = execute($query2);
  }

?>