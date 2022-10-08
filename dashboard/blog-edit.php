<?php
// connect to the database
$conn = mysqli_connect('localhost', 'yahya', '1234', 'blog-table');

// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}

if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql = "UPDATE blogs SET is_active=0 WHERE id = $id_to_delete";
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
$sql = "SELECT id,images,content,created_at,title FROM blogs WHERE id = $id";
$result = mysqli_query($conn,$sql);
$blogs = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html>
<?php include('include/header.php')?>
<div class="container center grey-text">
   <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($blogs['images']); ?>">
   <h2><?php echo($blogs['title']); ?></h2>
   <h3><?php echo($blogs['content']); ?></h3>
   <h5><?php echo($blogs['created_at']); ?></h5>
<form action="blog-edit.php" method="POST">
    <input type="hidden" name="id_to_delete" value="<?php  echo ($blogs['id']); ?>"></input>
    <input type="submit" name="delete" value="delete" class="btn brand z-depth-0"></input>

<form>
</div>

<?php include('include/footer.php')?>
</html>