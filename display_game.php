<?php
include "DB.php";
$query="SELECT * FROM Games";
$display_game=mysqli_query($conn,$query);
if(!$display_game)
{
    die('query failed').mysqli_error($conn);
}
while ($row=mysqli_fetch_array($display_game))
{
    echo "<tr>";
    echo "<td class='game_id'>{$row['id']}</td>";
    echo "<td><a rel='".$row['id']."' class='game-link' href='javascript:void(0)'> {$row['game']}</a></td>";
    echo "</tr>";

}
?>
<script>
    $(document).ready(function () {


        $('.game-link').on('click', function () {
            $('#action-container').show();
            var id = $(this).attr("rel");
            $.post("procsses.php", {id: id}, function (data) {
                $("#action-container").html(data);
            });
        })
    });
</script>
