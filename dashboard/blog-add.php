<?php
include('include/db_connect.php');
$content = $user_id ="";
$errors = array('content'=>"",'user_id'=>"");
if(isset($_POST['submit'])){
    //check username
    if(empty($_POST['content'])){
        $errors['content'] = 'a username is required <br  />';
    }else{
        $content = $_POST['content'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $content)){
            $errors['content'] = 'content must be letters and spaces only <br  />';
        }
    }
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $sql = "INSERT into blogs (images-blog) VALUES ('$imgContent')"; 
             
            if($sql){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
    if(array_filter($errors)){
      echo 'there are errors in the form';
    }else{
        $content = mysqli_real_escape_string($conn,$_POST['content']);
        //create sqli
        $sql  = "INSERT INTO blogs(content) VALUES('$content')";
        //save to db
        if(mysqli_query($conn,$sql)){

        }else{
            echo 'query error' . mysqli_error($conn);
            
       }
        echo 'form is valid';
        header('location:index.php');
    }
    //post check end
}


?>
<!DOCTYPE html>
<html>
<?php include('include/header.php')?>
<form action="blog-add.php" method="post" enctype="multipart/form-data">
    <label>Content:</label>
    <div class="red-text"><?php echo $errors['content']; ?></div>
    <input type="text" name="content" value="<?php echo $content ?>">
    <input type="hidden" name="user-id" value="<?php echo $user_id ?>">
    <label class="brand-text">Select Image File:</label>
    <input type="file" name="image" class="brand-text">
    <input type="submit" name="submit" value="Upload" class="btn brand a-depth-0 uplod_image">
</form>
<?php include('include/footer.php')?>
</html>