<?php
    include('connect.php');
    if($_GET['check'] == 0){
        $sql0 = "SELECT upvote from posts where id =". $_GET['id'];
        $result0 = $conn->query($sql0);
        $row = $result0->fetch_assoc();
        $count = $row['upvote'] + 1;
        $sql1 = "UPDATE posts set upvote = '$count' where id=". $_GET['id'];
        $result1 = $conn->query($sql1);
    }
    else{
        $sql0 = "SELECT downvote from posts where id =". $_GET['id'];
        $result0 = $conn->query($sql0);
        $row = $result0->fetch_assoc();
        $count = $row['downvote'] + 1;
        $sql1 = "UPDATE posts set downvote = '$count' where id=". $_GET['id'];
        $result1 = $conn->query($sql1);
    }
    header("location: index.php");
?>