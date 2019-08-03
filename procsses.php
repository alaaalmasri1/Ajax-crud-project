<?php
include "DB.php";
if(isset($_POST['id']))
{
   $id=mysqli_real_escape_string($conn,$_POST['id']);
$query="SELECT * FROM Games WHERE id=".$id;
$display_game=mysqli_query($conn,$query);
if(!$display_game)
{
    die('query failed').mysqli_error($conn);
}
while ($row=mysqli_fetch_array($display_game))
{
    echo "<input rel= '".$row['id']."'type='text' class='form-control title-input' value='".$row['game']."'>";
    echo "<input type='button' class='btn btn-success update' value='update'>";
    echo "<input type='button' class='btn btn-danger delete' value='delete'>";

}
}
if(isset($_POST['updatethis']))
{
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $game=mysqli_real_escape_string($conn,$_POST['game']);
    $id=$_POST['id'];
    $game=$_POST['game'];
    $Query="UPDATE Games SET game='$game'WHERE id=$id";

    $ajax_query=mysqli_query($conn,$Query);
    if(!$ajax_query)
    {
        die("query failed".mysqli_error($conn));
    }
}
if(isset($_POST['deletethis']))
{
    $delete_id=$_POST['id'];
    $Query="DELETE FROM Games WHERE id='$delete_id'";

    $ajax_query=mysqli_query($conn,$Query);
    if(!$ajax_query)
    {
        die("query failed".mysqli_error($conn));
    }
}
?>
<script>
    $(document).ready(function () {
var id;
var game;
var updatethis="update";
var deletethis="delete";
$(".title-input").on('input', function () {
     id=$(this).attr('rel');
    game=$(this).val();
});
$(".update").on('click',function () {
    $.post("procsses.php",{id:id,game:game,updatethis:updatethis},function (data) {
        alert('data has been updated');
        
    });
});
        $(".delete").on('click',function () {
            id=$(".title-input").attr('rel');
            $.post("procsses.php",{id:id,deletethis:deletethis},function (data) {
                alert(data);

            });
        });
    });
</script>