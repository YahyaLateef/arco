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
// $sql = "SELECT id,images,content,created_at,title FROM blogs WHERE id = $id";
$sql = "SELECT blogs.id,users.name, blogs.content, blogs.images, blogs.created_at,blogs.title FROM `blogs` INNER JOIN users ON users.user_id=blogs.user_id WHERE blogs.id = '$id' ";
$result = mysqli_query($conn,$sql);
$blogs = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
}
$author_name = $email = $comment ="";
$errors = array('email'=>"",'author_name'=>"",'comment'=>"");
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
    if(empty($_POST['author_name'])){
        $errors['author_name'] = 'a name is required <br  />';
    }else{
        $author_name = $_POST['author_name'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $author_name)){
            $errors['author_name'] = 'Title must be letters and spaces only <br  />';
        }
    }
    //check password
    if(empty($_POST['comment'])){
        $errors['comment'] = 'a comment is required <br  />';
    }else{
        $comment = $_POST['comment'];
        if(!preg_match("/^[a-zA-Z\s]+$/", $comment)){
            $errors['comment'] = 'comment must not have numbers';

        }
    }
    if(array_filter($errors)){
      echo 'there are errors in the form';
    }else{
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $author_name = mysqli_real_escape_string($conn,$_POST['author_name']);
        $comment = mysqli_real_escape_string($conn,$_POST['comment']);
        //create sqli
        $sql  = "INSERT INTO comments(author_name,email,comment) VALUES('$author_name','$email','$comment')";
        //save to db
        if(mysqli_query($conn,$sql)){

        }else{
            echo 'query error' . mysqli_error($conn);
            
       }
        echo 'form is valid';
    }
    //post check end
}
$sql = 'SELECT comment,author_name,created_at,id FROM comments';
$result = mysqli_query($conn,$sql); 
$coms = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
//mysqli_close($conn);
$name_replier = $reply = $comment_id ="";
$errors = array('reply'=>"",'name_replier'=>"",'comment_id'=>"");
if(isset($_POST['submit1'])){
    //check email
    if(empty($_POST['reply'])){
       $errors['reply'] = 'an reply is required <br  />';
    }else{
        $reply = $_POST['reply'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $reply)){
            $errors['reply'] = 'Reply must be letters and spaces only <br  />';
        }
    }
    //check username
    if(empty($_POST['name_replier'])){
        $errors['name_replier'] = 'a name is required <br  />';
    }else{
        $name_replier = $_POST['name_replier'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $name_replier)){
            $errors['name_replier'] = 'Title must be letters and spaces only <br  />';
        }
    }
    //check password
    if(empty($_POST['comment_id'])){
        $errors['comment_id'] = 'a comment id is required <br  />';
    }else{
        $comment_id = $_POST['comment_id'];
        if(!preg_match("/^[1-9][0-9]?$|^100$/", $comment_id)){
            $errors['comment_id'] = 'comment id must not have letters';

        }
    }
    if(array_filter($errors)){
      echo 'there are errors in the form';
    }else{
        $reply = mysqli_real_escape_string($conn,$_POST['reply']);
        $name_replier = mysqli_real_escape_string($conn,$_POST['name_replier']);
        $comment_id = mysqli_real_escape_string($conn,$_POST['comment_id']);
        //create sqli
        $sql  = "INSERT INTO replies(name_replier,reply,comment_id) VALUES ('$name_replier','$reply','$comment_id')";
        //save to db
        if(mysqli_query($conn,$sql)){

        }else{
            echo 'query error' . mysqli_error($conn);
            
       }
        echo 'form is valid';
    }
    //post check end
}
$sql = "SELECT reply,name_replier,created_at,comment_id,id FROM replies WHERE comment_id = 2";
$result = mysqli_query($conn,$sql); 
$replies = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
//mysqli_close($conn);
?>
<html lang="en">
<head>
  <title>Archo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/syntax.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/577c3f1cbb.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/577c3f1cbb.js" crossorigin="anonymous"></script>
  <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
   background-color: transparent;
   border: none;
  color: white;
  /*padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px; */
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body style="background: #181818;">
  <div class="cursor"></div>
<section>
<nav class="navbar fixed-top">
  <div class="container-fluid black" style="padding-top: 1em;">
    <div class="navbar-header" style="padding-left: 19em;">
      <div class="navbar-brand">
        <img class="animate" src="assets/img/logo-light (1).png" style="width: 100px; height: 30px;">
      </div>
    </div>
    <ul class="nav navbar-nav" style="padding-left: 39em;">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="portfolio.php">Portfolio</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blogs
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="blogs.php">Blogs</a></li>
          <li><a href="post-detail.php">Post-Details</a></li>
        </ul>
      </li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
</nav>
</section>
<section style="margin-top:-1.5em;">
  <div class="container">
    <div class="background" style="background-image: url(assets/img/pg1.jpg);"></div>
    <div class="context34" style="top: 21em;
    left: 45.5em;">
      <h1>Post Details</h1>
      <div class="path">
        <a href="index.php">Home</a>
        <span>/</span>
        <a href="about.php">Blog</a>
        <span>/</span>
        <a href="about.php" class="pathy">Post-Details</a>
      </div>
    </div>
  </div>
</section>
<section style="margin-bottom: 10em;padding: 120px 0px;">
  <div class="container">
    <div class="trat-post">
      <h2>Build a Beautiful Blog With Ease</h2>
      <div class="info">
        <p>
          <a href="/archo/post-detail.php">ALEX SMITH</a>
         /
          <a href="/archo/post-detail.php">August 6 , 2022</a>
          /
          <a href="/archo/post-detail.php">Web Design</a>
        </p>
      </div>
    </div>
    <div class="image-start">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($blogs['images']); ?>" style="height:100%;"/>
    </div>
    <div class="content pt-20">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="cont">
            <div class="spacial">
              <p><?php echo($blogs['content']); ?></p>
            </div>
            <p><?php echo($blogs['content']); ?></p>
            <h6 class="spacial">- We all intend to plan ahead.</h6>
            <p><?php echo($blogs['content']); ?></p>
            <ul class="spacial">
              <li><span style="margin-right: 10px;
                font-weight: 500;
                font-size: 13px;">01</span> Integer in volutpat libero.</li>
              <li><span style="margin-right: 10px;
                font-weight: 500;
                font-size: 13px;">02</span> Vivamus maximus ultricies pulvinar.</li>
              <li><span style="margin-right: 10px;
                font-weight: 500;
                font-size: 13px;">03</span> priorities that will pop up in any particular month.</li>
              <li><span style="margin-right: 10px;
                font-weight: 500;
                font-size: 13px;">04</span> We all intend to plan ahead.</li>
              <li><span style="margin-right: 10px;
                font-weight: 500;
                font-size: 13px;">05</span> The main component of a healthy env for self esteem.</li>
            </ul>
            <div class="quotes text-center">
              <p><?php echo($blogs['content']); ?></p>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-10">
 
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($blogs['images']); ?>" style="height: 200px;"></div></div><div class="col-md-6">
                    <div class="mb-10"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($blogs['images']); ?>" style="height: 200px;"></div>
                  </div>
                </div>
                <p style="border-bottom: 1px solid #9f9f9f9f;"><?php echo($blogs['content']); ?></p>
              <div class="share-info">
                <div class="social">
                  <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                  <a href="#"><i class="fa-brands fa-twitter"></i></a>
                  <a href="#"><i class="fa-brands fa-behance"></i></a>
                </div>
                <div class="tags2">
                  <a href="/blog-details/#">Web</a>,
                  <a href="/blog-details/#">Themeforest</a>,
                  <a href="/blog-details/#">ThemesCamp</a>
                </div>
              </div>
            </div>
 
            <div class="authors">
            <div class="row">
                 <div class="col-md-3">
                  <div class="author-img">
                    <img src="assets/img/post-author.jpg" style="width: 100%;height: 200px;">

                  </div>
                 </div>
                 <div class="col-md-9">
                  <div class="info2">
                    <h6><span class="auth">AUTHOR :</span><?php echo htmlspecialchars($blogs['name']); ?></h6>
                    <p style="font-size:16px;">the main component of a healthy environment for self esteem is that it needs be nurturing. The main compont of a healthy environment.</p>
                    <div class="social1">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-behance"></i></a>
                    </div>
                  </div>
               </div>
               </div>
                
              </div>
            </div>
            </div>
          </div>
          <div class="page-control">
            <div class="btn-group row" role="group">
              <div class="col-md-5">
              <button type="next" class="btn btn-default" style="width: 105%;text-align: left;">PREV POST</button>
              </div>
              <div class="col-md-1">
              <button type="next" class="btn btn-default" style="width: 50%;"><i class="fas fa-th-large"></i></button>
              </div>
              <div class="col-md-5">
                <button type="next" class="btn btn-default" style="width: 105%;margin-left: -25px;text-align: right;">NEXT POST</button>
                </div>
            </div>
          </div>
          <div class="comments-area">
            <h5>Comments:</h5>
            <?php foreach($coms as $com){ ?>
            <div class="row" style="padding: 30px 0;
            margin: 30px 0;
            border-bottom: 1px solid #333;">
            
              <div class="col-md-12">
                <div class="comet"></div>
                <div class="row">
                  <div class="col-md-1">
                    <div class="comet-img">
 
                      <img src="assets/img/post-author.jpg" style="width: 100%; height: 100px;">

                    </div>
                  </div>
                  <div class="col-md-11">
                    <div class="comet-info">
                      <h6><?php echo ($com['author_name']); ?></h6><br><span><?php echo ($com['created_at']); ?></span>
                      <button class="open-button replay" onclick="openForm()" >Reply</button>

<div class="form-popup" id="myForm">
  <form action="post-detail.php" class="form-container" method="post" enctype="multipart/form-data">
    <h1>Reply</h1>

    <label>Author name:</label>
    <div class="red-text"><?php echo $errors['name_replier']; ?></div>
    <input type="text" name="name_replier" value="<?php echo $name_replier ?>" class="form-control">
    <label>Reply:</label>
    <div class="red-text"><?php echo $errors['reply']; ?></div>
    <input type="text" name="reply" value="<?php echo $reply ?>" class="form-control">
    <label>Comment NO:</label>
    <div class="red-text"><?php echo $errors['comment_id']; ?></div>
    <input type="text" name="comment_id" value="<?php echo $comment_id ?>" class="form-control">
              <input type="submit" name="submit1" value="submit1"  class="btn">
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
                      <p class="same"><?php echo ($com['comment']);?></p>
                      <p class="same">COMMENT NO :<?php echo ($com['id']);?></p>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            <?php foreach($replies as $replie){ ?>
              <div class="row" style="padding: 30px 0;
            margin: 30px 0;
            border-bottom: 1px solid #333;">
            
              <div class="col-md-10 offeset-md-2">
                <div class="comet"></div>
                <div class="row">
                  <div class="col-md-1">
                    <div class="comet-img">
 
                      <img src="assets/img/post-author.jpg" style="width: 100%; height: 100px;">

                    </div>
                  </div>
                  <div class="col-md-11">
                    <div class="comet-info">
                      <h6><?php echo ($replie['name_replier']); ?></h6><br><span><?php echo ($replie['created_at']); ?></span>
                      <p class="same">Reply NO :<?php echo ($replie['id']);?></p>
                      <p class="same"><?php echo ($replie['reply']);?></p>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            <?php  }  ?>
            <?php } ?>
          </div>
          <div class="comment-form">
          <form  action="post-detail.php" method="post" enctype="multipart/form-data">
              <!-- <div class="form-group">
                <label for="Message"></label>
          <textarea class="form-control" id="textAreaExample2" rows="5" placeholder=" Your Message"></textarea>
              </div> -->
              <label>Author name:</label>
    <div class="red-text"><?php echo $errors['author_name']; ?></div>
    <input type="text" name="author_name" value="<?php echo $author_name ?>" class="form-control">
    <label>Email:</label>
    <div class="red-text"><?php echo $errors['email']; ?></div>
    <input type="text" name="email" value="<?php echo $email ?>" class="form-control">
    <label>Comment:</label>
    <div class="red-text"><?php echo $errors['comment']; ?></div>
    <input type="text" name="comment" value="<?php echo $comment ?>" class="form-control">
              <input type="submit" name="submit" value="submit"  style="font-size: 16px;
              font-weight: 500;
              letter-spacing: 1px;
              position: absolute;
              top: 88px;
    left: 350px;
              width: 100%;
              height: 100%;
              z-index: 2;
              width: 170px;
              height: 50px;
              text-align: center;
              line-height: 34px;
              font-family: 'Jost', sans-serif;
              position: relative;
              color: black;
              background-color: #c5a47e;
              border:2px solid black;
              margin-left: 6em;
          margin-top: -5em;">
            </form>
          </div>
        </div>
        </div>
        </div>
       
  </div>
</section>
 
<section style="background: #252531;
width: calc(100% - 50px);
margin-left: 25px;
margin-bottom: 25px;
color: #fff;
padding: 100px 0;">

  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="title">
 
          <h5 style="margin-bottom: 30px;
          line-height: 1.4;
          font-weight: 600;font-size:25px;">Contact Us</h5>
        </div>
        <ul class="AEC">

          <li>
            <div class="icon">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="context">
              <h6>Officeal Address</h6>
 
              <p>504 White St . Dawsonville, GA 30534 ,<br>New York</p>

            </div>
          </li>
          <li>
            <div class="icon">
 
              <i class="fa-regular fa-envelope"></i>

            </div>
          <div class="context">
            <h6>Email Us</h6>
            <p>support@gmail.com</p>
          </div>
          </li>
          <li>
          <div class="icon">
            <i class="fa-solid fa-phone"></i>
          </div>
          <div class="context">
            <h6>Call us</h6>
            <p>+87986451666</p>
          </div>
          </li>
        </ul>
    </div>
    <div class="col-lg-4">
      <div class="title">
 
        <h5  style="margin-bottom: 30px;
        line-height: 1.4;
        font-weight: 600;font-size:25px;">Recent News</h5>
      </div>
      <ul class="AEC">
        <li>
          <a href="blogs.php">
            <img src="assets/img/couch.jpg" style="width: 100px;height: auto;position: absolute;left: -28px;">
            <div class="context64">
              <p style="font-size: 13px;">The Start-Up Ultimate Guide to Make<br>Your WordPress Journal.</p>

              <span class="date">14 Jan 2022</span>
            </div>
          </a>
        </li>
        <li>
          <a href="blogs.php">
 
            <img src="assets/img/blog1.jpg" style="width: 100px;height: auto;position: absolute;left: -28px;">
            <div class="context64">
              <p style="font-size: 13px;">The Start-Up Ultimate Guide to Make<br>Your WordPress Journal.</p>

              <span class="date">14 Jan 2022</span>
            </div>
          </a>
        </li>
      </ul>
      <div class="email">
        <form>
 
          <div class="form-group" style="margin: 73px 0px 0px -29px;">
            <label for="email"></label>
            <input type="email" class="form-control" id="email" placeholder="Type Your Email">

          </div>
        </form>
        <div class="form-icon">
          <i class="fa-regular fa-paper-plane"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
 
      
        <div class="title" style="margin-bottom: 50px;">
        <img src="assets/img/logo-light (1).png" style="width: 100px;height:30px">
      </div>
      <div class="social3">
        <div class="row">
          <li>
            <i class="fa-brands fa-facebook-f"></i>
          </li>
          <li>
            <i class="fa-brands fa-twitter"></i>
          </li>
          <li>
            <i class="fa-brands fa-instagram"></i>
          </li>
          <li>
            <i class="fa-brands fa-youtube"></i>
          </li>
        </div>
      </div>
      <div class="copy-right">
        <p>© 2022, Arch Template. Made with passion by<a href="#">ThemesCamp</a></p>
      </div>
    </div>
  </div>
</section>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<script>
  const updateProperties = (elem, state) => {
elem.style.setProperty('--x', `${state.x}px`)
elem.style.setProperty('--y', `${state.y}px`)
elem.style.setProperty('--width', `${state.width}px`)
elem.style.setProperty('--height', `${state.height}px`)
elem.style.setProperty('--radius', state.radius)
elem.style.setProperty('--scale', state.scale)
}

document.querySelectorAll('.cursor').forEach(cursor => {
let onElement

const createState = e => {
const defaultState = {
  x: e.clientX,
  y: e.clientY,
  width: 40,
  height: 40,
  radius: '50%'
}

const computedState = {}

if (onElement != null) {
  const { top, left, width, height } = onElement.getBoundingClientRect()
  const radius = window.getComputedStyle(onElement).borderTopLeftRadius

  computedState.x = left + width / 2
  computedState.y = top + height / 2
  computedState.width = width
  computedState.height = height
  computedState.radius = radius
}

return {
  ...defaultState,
  ...computedState
}
}

document.addEventListener('mousemove', e => {
const state = createState(e)
updateProperties(cursor, state)
})

document.querySelectorAll('a, button').forEach(elem => {
elem.addEventListener('mouseenter', () => (onElement = elem))
elem.addEventListener('mouseleave', () => (onElement = undefined))
})
})

 </script>
<script>
      
  $(document).ready(function(){
    $(window).scroll(function(){
      var scroll = $(window).scrollTop();
      if (scroll > 300) {
        $(".black").css("background" , "#212121");
      }
      if(scroll > 300){
      $(".black").css("min-height" , "80px")
    }
      else{
        $(".black").css("background" , "transparent");  	
      }
    })
  })
      </script>
</body>
</html>