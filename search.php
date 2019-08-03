<?php

/*
IMPORTANT THINGS IN PHP CODE
1-connection to the database
2-checking if it connect to the AJAX database
3-getting the value of the input
4- query statment to select all data in a colum
5- fetching the data using while loop
6- display data using list item
7-doing the CRUD stands for create read update delete
*/
include "DB.php";
$search=$_POST['search'];// the search variable from ajax code
if(!empty($_POST['search'])) {
    $sql = "SELECT * FROM Games WHERE game LIKE '$search%'";
    $ajax_search_query = mysqli_query($conn, $sql);
    if (!$ajax_search_query) {
        die("query failed" . mysqli_error($conn));
    }
    $count = mysqli_num_rows($ajax_search_query);
    if ($count <= 0) {
        echo "sorry we dont have this game";

    }
    else {
        while ($row = mysqli_fetch_assoc($ajax_search_query)) {
            $game = $row['game'];


            ?>
            <ul class="list-unstyled">
                <?php
                echo "<li>{$game} in shop</li>";
                ?>
            </ul>
        <?php } ?>
        <?php
    }
}
?>

