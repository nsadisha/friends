<?php include "db.php" ?>
<?php include "friends.php" ?>

<?php
    if(isset($_REQUEST["email"]) && isset($_REQUEST["friend"])){
        $email = $_REQUEST["email"];
        $friend = $_REQUEST["friend"];
    
        $query1 = "DELETE FROM friends WHERE email='$email' and friendEmail='$friend'";
        $query2 = "DELETE FROM friends WHERE email='$friend' and friendEmail='$email'";
        $res = execute($query1);
        $res = execute($query2);
    }
    
    header("Location: ../profile.php");
?>