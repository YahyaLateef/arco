<?php
// connect to the database
$conn = mysqli_connect('localhost', 'yahya', '1234', 'blog-table');
// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}
$sql = 'SELECT blogs.id,users.name,users.email, blogs.content, blogs.images, blogs.created_at, blogs.is_active,blogs.title FROM `blogs` INNER JOIN users ON users.user_id=blogs.user_id; ';
$result = mysqli_query($conn,$sql); 
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<?php include('include/header.php')?>
<div class="container" style="width: 60%;
  margin: auto;">
  <div class="row">
  <?php foreach($users as $user){?>
    <div class="col s12">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user['images']); ?>"  style="width: 86.5%;height: auto;"/> 
	      <div class="row">
      <?php if($user['is_active'] == 1){?>
        <div class="col-lg-2"  style=" margin-top: 2em;">
        <a class="bert"><?php echo ($user['created_at']); ?></a>  
        </div>
        <div class="col-lg-10" style=" margin-top: 2em;">
        <div class="tags">
                <a href="#">WordPress</a>
                <a href="#">Themeforest</a>
                <a href="#">Archo</a>
              </div>
            <h4 style="font-weight: 700;
    line-height: 1.6;
    margin-bottom: 5px;
    color: #fff;
    font-size: xx-large;"><?php echo ($user['title']); ?></h4>
            <p  style="color: #9f9f9f;
              font-size: 15px;
              font-weight: 400;
              line-height: 2;
              margin: 0;" class="brand-text"><?php echo ($user['content']); ?></p>
            <div class="card-action right-align">
						  <a class="read" href="blog-edit.php?id=<?php echo ($user['id']);?>"></a>
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