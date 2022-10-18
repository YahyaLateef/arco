<?php
// connect to the database
$conn = mysqli_connect('localhost', 'yahya', '1234', 'blog-table');
// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}
session_start();
$user_id  =  $_SESSION["user_id"];
$sql = "SELECT blogs.id,blogs.user_id,users.name,users.email, blogs.content, blogs.images, blogs.created_at, blogs.is_active,blogs.title FROM `blogs` INNER JOIN users ON users.user_id=blogs.user_id WHERE blogs.user_id = $user_id; ";
$result = mysqli_query($conn,$sql); 
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      .rai{
        margin-bottom:5em;
        background:#101010;
      }
    </style>
  </head>
<?php include('include/header.php')?>
<div class="container" style="width: 60%;
  margin: auto;">
  <div class="row">
  <?php foreach($users as $user){?>
    <div class="col s12 rai">
	      <div class="row">
      <?php if($user['is_active'] == 1){?>
        <div class="col-lg-2"  style=" margin-top: 5em;">
        <a style="color:#0f0;"><?php echo ($user['created_at']); ?></a>  
        </div>
        <div class="col-lg-10" style=" margin-top: 2em;">
            <h4><?php echo ($user['title']); ?></h4>
            <p class="brand-text"><?php echo substr($user['content'],0,100); ?></p>
            <div class="card-action right-align">
						  <a style="color:#0f0;display:block;" class="read" href="../blogs.php?id=<?php echo ($user['id']);?>">view</a>
              <a style="color:#0f0;display:block;" class="read" href="blog-edit.php?id=<?php echo ($user['id']);?>">read more</a>
					  </div>
      <?php }?> 
		    </div>
	    </div>
    </div>
    <?php }?> 
  </div>
</div>
<?php include('include/footer.php')?>
</html>