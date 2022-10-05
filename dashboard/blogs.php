<?php
// Database configuration  
$dbHost     = "localhost";  
$dbUsername = "yahya";  
$dbPassword = "1234";  
$dbName     = "blog-table";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
// Check connection  
if ($db->connect_error) {  
  die("Connection failed: " . $db->connect_error);  
}
 
// Get image data from database 
$result = $db->query("SELECT images,content,id FROM blogs ORDER BY id "); 
?>
<!DOCTYPE html>
<html>
<?php include('include/header.php')?>
<div class="container">
          <div class="row">
<div class="col s6">
	  <div class="card z-depth-0">
        <div class="card-content center">
        <?php if($result->num_rows > 0){ ?> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['images']); ?>" /> 
            <p class="brand-text"><?php echo ($row['content']); ?></p>
            <div class="card-action right-align">
						<a class="brand-text" href="blog-edit.php?id=<?php echo ($row['id']); ?>">more info</a>
					</div>
        <?php } ?> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
		</div>
	  </div>
	</div>
    </div>
	</div>


<?php include('include/footer.php')?>
</html>