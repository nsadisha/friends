<?php include "php/db.php" ?>
<?php include "php/friends.php" ?>
<?php session_start(); ?>

<?php
  if(!isset($_REQUEST["page"])){
    header("Location: addFriends.php?page=1");
  }
  $page = $_REQUEST["page"];
  $start = 5*($page - 1);

  if(empty($_SESSION["email"])){
    header("Location: index.php");
  }else{
    //getting logged user's information
    $email = $_SESSION["email"];

    //getting the last page
    $q = "SELECT name,email FROM users WHERE email NOT IN (SELECT friendEmail FROM friends WHERE email=\"$email\") AND email<>\"$email\"";
    $qRes = execute($q);
    $rows = $qRes->num_rows;
    $lastPage = ceil($rows/5);

    // function to display all available people(not friends)
    function displayPeople(){
      global $email, $start;
      $q = "SELECT name,email FROM users WHERE email NOT IN (SELECT friendEmail FROM friends WHERE email=\"$email\") AND email<>\"$email\" LIMIT $start , 5";
      $result = execute($q);

      while($person = $result->fetch_assoc()){
        $personName = $person["name"];
        $personEmail = $person["email"];
        $dpName = $personName[0].$personName[1];

        $mutualCount = getMutualFriendsCount($email, $personEmail);

        $personElement = "
          <div class=\"friend\">
            <div class=\"friend-dp\">$dpName</div>
            <div class=\"name-email\">
              <h4>$personName</h4>
              <h5>$personEmail</h5>
            </div>
            <p>$mutualCount mutual friends</p>
            <a href=\"php/addFriend.php?email=$email&friend=$personEmail\"><button>Add friend</button></a>
          </div>
        ";

        echo $personElement;
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends | Profile</title>
    <style>
      body{
        text-align: center;
        display: grid;
        align-items: center;
        padding-top: 2rem;
      }
      .link{
        padding: 0.5rem 1rem;
        margin-top: 2rem;
        background: rgba(0,0,0,0.2);
        font-size: 1.2rem;
        border-radius: 5px;
        cursor: pointer;
        text-decoration:none;
        max-width: max-content;
      }
      .friends-section{
        display: grid;
        padding: 0 20rem;
      }
      .friends-section .friend{
        display: grid;
        grid-template-columns: 1fr 10fr 10fr 5fr;
        align-items: center;
        text-align:start;
        padding: 0.3rem;
      }
      .friends-section .friend:nth-child(2n){
        background: rgba(0,0,0,0.2);
      }
      .friends-section .friend .name-email{
        margin-left: 2rem;
      }
      .friends-section .friend h4,h5{
        margin: 0;
      }
      .friend-dp{
        width: 2.5rem;
        height: 2.5rem;
        clip-path: circle();
        background-color: rgba(0,0,0,0.4);
        display: grid;
        align-items: center;
        text-align: center;
      }

      .padination{
        display: flex;
        max-width: max-content;
        border: solid 2px black;
        border-radius: 5px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 1rem;
      }
      .padination div{
        padding: 0.5rem;
        border: none;
        cursor: pointer;
        background: rgba(0,0,0,0.3);
        font-size: 1.2rem;
      }
      .padination div:nth-child(2){
        margin: 0 3px;
        background: white;
      }
      
    </style>
</head>
<body>
    <h1>Add friends</h1>
    <hr width="100%">

    <div class="friends-section">
      <?php displaypeople(); ?>

      <div class="padination">
        <div><a <?php echo $page!=1?"href=addFriends.php?page=".($page-1)."":""; ?>>&lt; Previous</a></div>
        <div><?php echo $page; ?></div>
        <div><a <?php echo $page!=$lastPage?"href=addFriends.php?page=".($page+1)."":""; ?>>Next &gt;</a></div>
      </div>

      <div style="margin-top: 2rem;">
        <a href="profile.php" class="link">Profile</a>
        <a href="index.php" class="link">Home</a>
      </div>
    </div>
</body>
</html>