<?php   
// connect to the database
$conn = mysqli_connect('localhost', 'yahya', '1234', 'blog-table');
// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}
//write querie for all
$sql = 'SELECT name,email,id FROM users';
$result = mysqli_query($conn,$sql); 
$blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<?php include('include/header.php')?>
<div class="container">
          <div class="row">
			<?php foreach($blogs as $blog) : ?>
               <div class="col s6">
				<div class="card z-depth-0">
                    <div class="card-content center">
						<h6><?php echo htmlspecialchars($blog['name']); ?></h6>
							<?php echo htmlspecialchars($blog['email'])?>
					</div>
					<div class="card-action right-align">
						<a class="brand-text" href="blog-edit.php?id=<?php echo $blog ['id'] ?>">more info</a>
					</div>
				</div>
			   </div>
            <?php endforeach ?>
		  </div>
	</div>
     


<?php include('include/footer.php')?>
</html>