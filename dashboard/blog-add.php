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
$content = $title = $user_id = "";
$errors = array('content'=>"",'title'=>"");
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
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
            
            if($allowTypes){ 
                $status = 'success'; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
    
    if(empty($_POST["content"])) { 
            $errors['content'] = 'content is required <br  />';
        }else{
            $content = $_POST['content'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $content)){
                $errors['content'] = 'Title must be letters and spaces only <br  />';
                
            }
        } 
        if(empty($_POST["title"])) { 
            $errors['title'] = 'title is required <br  />';
        }else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'Title must be letters and spaces only <br  />';
                
            }
        } 
        session_start();
         $user_id  =  $_SESSION["user_id"];
        $insert = $db->query("INSERT into blogs(images,content,title,user_id) VALUES ('$imgContent','$content','$title','$user_id')");
        header('location:index.php');
        
    }
session_start();
echo $_SESSION["user_id"];
// Display status message 
echo $statusMsg; 
?>
<!DOCTYPE html>
<html>
<?php include('include/header.php')?>
<form action="blog-add.php" method="post" enctype="multipart/form-data">
    <label>Content:</label>
    <div class="red-text"><?php echo $errors['content']; ?></div>
    <input type="text" name="content" value="<?php echo $content ?>">
    <label>Title:</label>
    <div class="red-text"><?php echo $errors['title']; ?></div>
    <input type="text" name="title" value="<?php echo $title ?>">
    <input type="hidden" name="user-id" value="<?php echo "1" ?>">
    <label class="brand-text">Select Image File:</label>

    <input type="file" name="image" class="brand-text">
    <input type="submit" name="submit" value="Upload" class="btn brand a-depth-0 uplod_image">
</form>
<?php include('include/footer.php')?>
</html>