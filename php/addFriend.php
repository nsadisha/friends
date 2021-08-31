<?php include "db.php" ?>
<?php include "friends.php" ?>

<?php
    if(isset($_REQUEST["email"]) && isset($_REQUEST["friend"])){
        $email = $_REQUEST["email"];
        $friend = $_REQUEST["friend"];
    
        $query1 = "INSERT INTO friends(email, friendEmail) VALUES('$email', '$friend')";
        $query2 = "INSERT INTO friends(email, friendEmail) VALUES('$friend', '$email')";
        $res = execute($query1);
        $res = execute($query2);

        header("Location: ../addFriends.php");
    }else{
        header("Location: ../profile.php");
    }

?>