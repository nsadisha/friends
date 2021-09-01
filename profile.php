<?php include "php/db.php" ?>
<?php include "php/friends.php" ?>
<?php session_start(); ?>

<?php
  if(!isset($_REQUEST["page"])){
    header("Location: profile.php?page=1");
  }
  $page = $_REQUEST["page"];
  $start = 5*($page - 1);

  if(empty($_SESSION["email"])){
    header("Location: index.php");
  }else{
    //getting logged user's information
    $email = $_SESSION["email"];
    $query = "SELECT * FROM users WHERE email=\"$email\"";
    $result = execute($query);
    $userData = $result->fetch_assoc();

    //getting friends    
    $friendsQuery = "SELECT * FROM friends WHERE email=\"$email\" LIMIT $start , 5";
    $friendResult = execute($friendsQuery);
    $numberOfFriends = $friendResult->num_rows;
    
    //getting the last page
    $q = "SELECT * FROM friends WHERE email=\"$email\"";
    $qRes = execute($q);
    $rows = $qRes->num_rows;
    $lastPage = ceil($rows/5);

    //displays all afriends
    function displayFriends(){
      global $friendResult, $email, $numberOfFriends;
      if($numberOfFriends == 0){
        echo "<h2>You don't have any friends!</h2>";
        return;
      }
      while($friend = $friendResult->fetch_assoc()) {
        $femail=$friend["friendEmail"];
        $q = "SELECT * FROM users WHERE email=\"$femail\"";
        $result = execute($q);
        $userData = $result->fetch_assoc();

        $friendName = $userData["name"];
        $friendEmail = $userData["email"];
        $dpName = $friendName[0].$friendName[1];

        $mutualCount = getMutualFriendsCount($email, $friendEmail);

        $friendElement = "
        <div class=\"friend\">
          <div class=\"friend-dp\">$dpName</div>
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
        position: relative;
        width: 2.5rem;
        height: 2.5rem;
        clip-path: circle();
        background-color: rgba(0,0,0,0.4);
        display: grid;
        align-items: center;
        text-align: center;
      }

      .pagination{
        display: flex;
        max-width: max-content;
        border: solid 2px black;
        border-radius: 5px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 1rem;
      }
      .pagination div{
        padding: 0.5rem;
        border: none;
        cursor: pointer;
        background: rgba(0,0,0,0.3);
        font-size: 1.2rem;
      }
      .pagination div:nth-child(2){
        margin: 0 3px;
        background: white;
      }
      .d-none{display: none;}
      
    </style>
</head>
<body>
    <div class="dp"><?php echo $userData["name"][0].$userData["name"][1]; ?></div>
    <h1 style="margin-bottom:0;"><?php echo $userData["name"]."(".$userData["username"].")"; ?></h1>
    <h3 style="margin-top:0;"><?php echo $userData["email"]; ?></h3>
    <h3 style="margin-top:0;">You have total <?php echo $rows; ?> friend<?php if($numberOfFriends!=1)echo "s" ?>.</h3>

    <hr width="100%">

    <h1>Friends</h1>
    <div class="friends-section">
      <?php displayFriends(); ?>

      <div class=<?php echo $rows==0?"d-none":"pagination"; ?>>
        <div><a <?php echo $page!=1?"href=profile.php?page=".($page-1)."":""; ?>>&lt; Previous</a></div>
        <div><?php echo $page; ?></div>
        <div><a <?php echo $page!=$lastPage?"href=profile.php?page=".($page+1)."":""; ?>>Next &gt;</a></div>
      </div>

      <div style="margin-top: 2rem;">
        <a href="addFriends.php" class="link">Add new friends</a>
        <a href="index.php" class="link">Home</a>
      </div>
    </div>
</body>
</html>