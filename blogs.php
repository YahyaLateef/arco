<?php
// connect to the database
$conn = mysqli_connect('localhost', 'yahya', '1234', 'blog-table');
// check connection
if(!$conn){
    echo 'Connection error: '. mysqli_connect_error();
}
session_start();
echo   $_SESSION["user_id"];
$user_id  =  $_SESSION["user_id"];
$sql = "SELECT blogs.id,users.name,users.email, blogs.content, blogs.images, blogs.created_at, blogs.is_active,blogs.title FROM `blogs` INNER JOIN users ON users.user_id=blogs.user_id  ; ";
$result = mysqli_query($conn,$sql); 
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="test.js"></script>
  <style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
  padding: 20px;
  font-family: Arial;
}

/* Center website */
.main {
  max-width: 100%;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 10px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
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
              <li><a href="post-detail.php?id=<?php echo 3 ?>">Post-Details</a></li>
            </ul>
          </li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
    </nav>
    </section>
<section style="margin-top:-1.5em;">
  <div class="container">
    <div class="background" style="background-image:url(assets/img/pg1.jpg)"></div>
    <div class="context34" style="top: 19em;
    left: 47.5em;">
      <h1>Our Blogs</h1>
      <div class="path">
        <a href="index.php">Home</a>
        <span>/</span>
        <a href="about.php" class="pathy">Blogs</a>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
  <form method="POST">
                <input  type="text" name="search">
                <button type="submit" name="submit" class="remove" onclick="removeDiv(this);">Submit</button>
</form>
|<?php   
$con = new PDO("mysql:host=localhost; dbname=blog-table;",'yahya','1234');
if(isset($_POST['submit'])){
    $str = $_POST['search'];
    $sth = $con ->prepare("SELECT * FROM `blogs` WHERE title = '$str'");
    $sth ->setFetchMode(PDO:: FETCH_OBJ);
    $sth ->execute();
    if($row = $sth->fetch()){
        ?>
        <div class="row">
        <div class="col-lg-2"  style=" margin-top: 2em;">
        <a class="  date" style="margin-right:5em;"><?php echo $row->created_at; ?></a>  
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
    font-size: xx-large;"><?php echo $row-> title; ?></h4>
            <p  style="color: #9f9f9f;
              font-size: 15px;
              font-weight: 400;
              line-height: 2;
              margin: 0;" class="brand-text"><?php echo $row->content; ?></p>
            <div class="card-action right-align">
					  </div>
		    </div>
        <?php 
    }
      else{
        echo "Name does not exist";
      }
}
?>
  </div>
</section>
<section style="margin-top: 10em;padding: 120px 0px;" class="image">
       <!-- MAIN (Center website) -->
<div class="main">
<!-- Portfolio Gallery Grid -->
<div class="row">
<?php foreach($users as $user){?>
  <?php if($user['id'] < 6){ ?>
  <div class="column nature">
    <div class="content">
    <div class="col s12">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user['images']); ?>"  style="width: 86.5%;height: 20em;"/> 
	      <div class="row">
      <?php if($user['is_active'] == 1){?>
        <div class="col-lg-2"  style=" margin-top: 2em;">
        <a class="  date" style="margin-right:5em;"><?php echo ($user['created_at']); ?></a>  
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
              margin: 0;" class="brand-text"><?php echo substr($user['content'],0,100); ?></p>
            <div class="card-action right-align">
						  <a class="read" href="post-detail.php?id=<?php echo ($user['id']);?>">Read more</a>
					  </div>
      <?php }?> 
		    </div>
	    </div>
    </div>
    </div>
  </div>
     <?php } ?>
    <?php }?> 
    <?php foreach($users as $user){?>
      <?php if($user['id'] < 11 and $user['id'] > 5){ ?>
  <div class="column cars">
    <div class="content">
    <div class="col s12">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user['images']); ?>"  style="width: 86.5%;height:20em;"/> 
	      <div class="row">
      <?php if($user['is_active'] == 1){?>
        <div class="col-lg-2"  style=" margin-top: 2em;">
        <a class="  date" style="margin-right:5em;"><?php echo ($user['created_at']); ?></a>  
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
              margin: 0;" class="brand-text"><?php echo substr($user['content'],0,100); ?></p>
            <div class="card-action right-align">
						  <a class="read" href="post-detail.php?id=<?php echo ($user['id']);?>">Read more</a>
					  </div>
      <?php }?> 
		    </div>
	    </div>
    </div>
    </div>
  </div>
  <?php }?>
    <?php }?> 
    <?php foreach($users as $user){?>
      <?php if($user['id'] < 16 and $user['id'] > 10){ ?>
  <div class="column people">
    <div class="content">
    <div class="col s12">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user['images']); ?>"  style="width: 86.5%;height: 20em;"/> 
	      <div class="row">
      <?php if($user['is_active'] == 1){?>
        <div class="col-lg-2"  style=" margin-top: 2em;">
        <a class="date" style="margin-right:5em;"><?php echo ($user['created_at']); ?></a>  
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
              margin: 0;" class="brand-text"><?php echo substr($user['content'],0,100); ?></p>
            <div class="card-action right-align">
						  <a class="read" href="post-detail.php?id=<?php echo ($user['id']);?>">Read more</a>
					  </div>
      <?php }?> 
		    </div>
	    </div>
    </div>
    </div>
  </div>
  <?php }?>
    <?php }?> 
    <?php foreach($users as $user){?>
      <?php if($user['id'] < 21 and $user['id'] > 15){ ?>
  <div class="column roar">
    <div class="content">
    <div class="col s12">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user['images']); ?>"  style="width: 86.5%;height: 20em;"/> 
	      <div class="row">
      <?php if($user['is_active'] == 1){?>
        <div class="col-lg-2"  style=" margin-top: 2em;">
        <a class="  date" style="margin-right:5em;"><?php echo ($user['created_at']); ?></a>  
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
              margin: 0;" class="brand-text"><?php echo substr($user['content'],0,100); ?></p>
            <div class="card-action right-align">
						  <a class="read" href="post-detail.php?id=<?php echo ($user['id']);?>">Read more</a>
					  </div>
      <?php }?> 
		    </div>
	    </div>
    </div>
    </div>
  </div>
  <?php }?>
    <?php }?> 
<!-- END GRID -->
</div>
<div id="myBtnContainer" class="center">
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn" onclick="filterSelection('nature')">1</button>
  <button class="btn" onclick="filterSelection('cars')">2</button>
  <button class="btn" onclick="filterSelection('people')">3</button>
  <button class="btn" onclick="filterSelection('roar')">4</button>
</div>
<!-- END MAIN -->
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
<script type="text/javascript">
        function removeDiv(btn){
            ((btn.parentNode).parentNode).removeChild(btn.parentNode);
        }
    </script>
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
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