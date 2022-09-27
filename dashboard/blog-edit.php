<?php
include('include/db_connect.php');
if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql = "DELETE  FROM blogs WHERE id = $id_to_delete";
    if(mysqli_query($conn,$sql)){
        //success
        header('Location:index.php');
    }{
        //failiure
        echo 'query error' . mysqli_error($conn);
    }
}
//check
if(isset($_GET['id'])){
$id = mysqli_real_escape_string($conn,$_GET['id']);
$sql = "SELECT * FROM blogs WHERE id = $id";
$result = mysqli_query($conn,$sql);
$blog = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html>
<?php include('include/header.php')?>
<div class="container center grey-text">
    <?php if($blog):?>
        <h4><?php echo htmlspecialchars($blog['username']); ?></h4>
        <p><?php echo htmlspecialchars($blog['email']);?></p>
        <p><?php echo date($blog['created_at']);  ?></p>
        <p><?php echo htmlspecialchars($blog['content']); ?></p>
<!-- Delete form -->
<form action="blog-edit.php" method="POST">
    <input type="hidden" name="id_to_delete" value="<?php  echo ($blog['id']); ?>"></input>
    <input type="submit" name="delete" value="delete" class="btn brand z-depth-0"></input>

<form>

    <?php else: ?>
        <h5>No such pizza exists!</h5>
    <?php endif  ?>     
</div>

<?php include('include/footer.php')?>
</html>