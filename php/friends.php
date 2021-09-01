<?php include "db.php"; ?>

<?php
  //This file contains some php functions to make the process easier.

  //execute a query
  function execute($query){
    global $conn;
    $result = $conn->query($query);
    return $result;
  }
  function get($query){
    global $conn;
    $result = $conn->query($query);
    return $result->fetch_assoc();
  }

  // get all usersCount
  function getAllUsersCount(){
    $query="SELECT email FROM users";
    $res=execute($query);
    return $res->num_rows;
  }
  //get total connections
  function getTotalConnections(){
    $query="SELECT email FROM friends";
    $res=execute($query);
    return ($res->num_rows)/2;
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

  // get password for an email
  function getPasswordForEmail($email){
    $query = "SELECT password FROM users WHERE email='$email'";
    $res = get($query);
    $password = $res["password"];
    return $password;
  }

  function getMutualFriendsCount($email, $person){
    $query = "SELECT email FROM users WHERE email IN (SELECT friendEmail FROM friends WHERE email=\"$person\") AND email IN (SELECT friendEmail FROM friends WHERE email=\"$email\")";
    $res = execute($query);

    return $res->num_rows;
  }

?>