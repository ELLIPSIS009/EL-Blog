<?php
    include('connect.php');
    $output = '' ;
    $output2 = '' ;
    if (isset($_POST['searchVal'])){
        $searchq = $_POST['searchVal'];
        $result = $conn->query("SELECT * FROM posts WHERE title LIKE '%$searchq%'") or die ("Could not search!");
        $count = mysqli_num_rows($result);
        if($count == 0){
            $output = '<div>No results!</div>';
        }
        else{
            while($row = $result->fetch_assoc()){
                $output = '<a href="post.php?id=' . $row["id"] . '">' . $row["title"] . '</a><br>';
                echo ($output);
            }
        }
    }
?>