<?php 
// connect to the database
$conn = mysqli_connect('localhost', 'yahya', '1234', 'blog-table');
// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}
$name = $email = $password ="";
$errors = array('email'=>"",'name'=>"",'password'=>"");
if(isset($_POST['submit'])){
    //check email
    if(empty($_POST['email'])){
       $errors['email'] = 'an email is required <br  />';
    }else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email must be a valid email address <br  />';
        }
    }
    //check username
    if(empty($_POST['name'])){
        $errors['name'] = 'a name is required <br  />';
    }else{
        $name = $_POST['name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
            $errors['name'] = 'Title must be letters and spaces only <br  />';
        }
    }
    //check password
    if(empty($_POST['password'])){
        $errors['password'] = 'atleast one password is required <br  />';
    }else{
        $password = $_POST['password'];
        if(!preg_match("/^\d+$/", $password)){
            $errors['password'] = 'password must not have spaces or letters';

        }
    }
    if(array_filter($errors)){
      echo 'there are errors in the form';
    }else{
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $username = mysqli_real_escape_string($conn,$_POST['name']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        //create sqli
        $sql  = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
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
            <form class="white" action="login.php" method="POST">
                <label>Username:</label>
                <div class="red-text"><?php echo $errors['name']; ?></div>
                <input type="text" name="name" value="<?php echo $name ?>">
                <label>Your email:</label>
                <div class="red-text"><?php echo $errors['email'];  ?></div>
                <input type="text" name="email" value="<?php echo $email ?>">
                <label>Password</label>
                <div class="red-text"><?php echo $errors['password']; ?></div>
                <input type="text" name="password" value="<?php echo $password ?>">
                <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand a-depth-0">
                </div>
            </form>
        </div>
    </section>
</body>
</html>