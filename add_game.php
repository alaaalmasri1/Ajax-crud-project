<?php
include "DB.php";
//code for inserting data to the databsae
if(isset($_POST['game_name']))
{
    $game=$_POST['game_name'];
    $sql="INSERT INTO Games(game) VALUES ('$game')";
    $ajax_add_game=mysqli_query($conn,$sql);
    if(!$ajax_add_game)
    {
        die("query failed".mysqli_error($conn));
    }
}
?>