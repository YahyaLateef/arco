<?php 
session_start();
// connect to the database
$conn = mysqli_connect('localhost', 'yahya', '1234', 'blog-table');
// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}
$errors = array('email'=>"",'name'=>"",'password'=>"",'id'=>"");
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $emailid = $_POST['email'];
    if(empty($_POST['email'])){
        $errors['email'] = 'an email is required';
    }else{
        if(!filter_var($emailid, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email must be a valid email address <br  />';
        }
    }
    $name = $_POST['name'];
    if(empty($_POST['name'])){
        $errors['name'] = 'a name is required';
    }else{
        if(!preg_match( '/^[A-Za-z]+$/' ,$name)){
            $errors['name'] = 'name must be letters only <br  />';
        }
    }
    $password = $_POST['password'];
    if(empty($_POST['password'])){
        $errors['password'] = 'a password  is required';
    }else{
        if(!preg_match( '/^([1-9][0-9]{1,3}|10000)$/' ,$password)){
            $errors['password'] = 'password must be numbers only <br  />';
        }
    }
    if(array_filter($errors)){
        echo 'there are errors in the form';
      }else{
    $sql = "SELECT count(*) as total FROM `users` WHERE email = '.$emailid.'AND user_id = '$id' AND name = '.$name.' AND password = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $_SESSION["id"] = $id;
     $_SESSION["email"] = $emailid;
     $_SESSION["name"] = $name;
     header("Location: index.php");
     die;}
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
  background:#00008b;
}
.brand{
	  	background: #cbb09c !important;
	  }
  	.brand-text{
  		color: #cbb09c !important;
  	}
  	form{
  		max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
  	}
        </style>
    </head>
    <body>
    <section>
        <div class="container grey-text">
            <form  method="POST" class="white">
            <input type="hidden" name="id" placeholder="">
                <label>Username:</label>
                <p class="redtext"><?php echo $errors['name'] ?></p>
                <input type="text" name="name" placeholder="">
                <label>Your email:</label>
                <p class="redtext"><?php echo $errors['email'] ?></p>
                <input type="text" name="email"  placeholder="">
                <label>Password</label>
                <p class="redtext"><?php echo $errors['password'] ?></p>
                <input type="text" name="password"  placeholder="">
                <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand a-depth-0">
                </div>
            </form>
        </div>
    </section>
</body>
</html>