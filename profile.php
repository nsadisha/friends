<?php include "php/db.php" ?>
<?php include "php/friends.php" ?>
<?php session_start(); ?>

<?php
  if(empty($_SESSION["email"])){
    header("Location: index.php");
  }else{
    //getting logged user's information
    $email = $_SESSION["email"];
    $query = "SELECT * FROM users WHERE email=\"$email\"";
    $result = execute($query);
    $userData = $result->fetch_assoc();

    //getting friends    
    $friendsQuery = "SELECT * FROM friends WHERE email=\"$email\"";
    $friendResult = execute($friendsQuery);
    $numberOfFriends = $friendResult->num_rows;

    function displayFriends(){
      global $friendResult, $email;
      while($friend = $friendResult->fetch_assoc()) {
        $femail=$friend["friendEmail"];
        $q = "SELECT * FROM users WHERE email=\"$femail\"";
        $result = execute($q);
        $userData = $result->fetch_assoc();

        $friendName = $userData["name"];
        $friendEmail = $userData["email"];

        $mutualCount = getMutualFriendsCount($email, $friendEmail);

        $friendElement = "
        <div class=\"friend\">
          <div class=\"friend-dp\"></div>
          <div class=\"name-email\">
            <h4>$friendName</h4>
            <h5>$friendEmail</h5>
          </div>
          <p>$mutualCount mutual friends</p>
          <a href=\"php/removeFriend.php?email=$email&friend=$friendEmail\"><button>Remove friend</button></a>
        </div>";

        echo $friendElement;
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
      .dp{
        width: 7rem;
        height: 7rem;
        clip-path: circle();
        background-color: rgba(0,0,0,0.4);
        margin-left: auto;
        margin-right: auto;
        font-size: 2.5rem;
        display: grid;
        align-items: center;
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
      }
      
    </style>
</head>
<body>
    <div class="dp"><?php echo $userData["name"][0].$userData["name"][1]; ?></div>
    <h1 style="margin-bottom:0;"><?php echo $userData["name"]."(".$userData["username"].")"; ?></h1>
    <h3 style="margin-top:0;"><?php echo $userData["email"]; ?></h3>
    <h3 style="margin-top:0;">You have total <?php echo $numberOfFriends; ?> friend<?php if($numberOfFriends!=1)echo "s" ?>.</h3>

    <hr width="100%">

    <h1>Friends</h1>
    <div class="friends-section">
      <?php displayFriends(); ?>

      <a href="addFriends.php" class="link">Add new friends</a>
    </div>
</body>
</html>