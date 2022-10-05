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
  
<section style="margin-top: 10em;padding: 120px 0px;">
  <!-- <div class="container" style="width: 60%;
  margin: auto;">
    <div class="row">
      <div class="col-lg-12">
        <div class="divs-main"></div>
  
         <img src="assets/img/couch.jpg" style="width: 86.5%;height: auto;">

        </div>
        <div class="row" style="margin-bottom:8em; ">
          <div class="col-lg-2" style=" margin-top: 2em;">
            <a href="/archo/post-detail.php" class="bert">
              <span class="num">06</span><br>
              <span class="date">Aug 2022</span>
            </a>
          </div>
          <div class="col-lg-10" style=" margin-top: 2em;">
            <div class="tags">
              <a href="#">WordPress</a>
              <a href="#">Themeforest</a>
              <a href="#">Archo</a>
            </div>
            <h4 class="head-for"><a href="/archo/post-detail.php">Build a Beautiful Blog With Ease</a></h4>
            <p style="color: #9f9f9f;
            font-size: 15px;
            font-weight: 400;
            line-height: 2;
            margin: 0;">Success is no accident. It is hard work, perseverance, learning, studying, sacrifice and most of all, love<br>of what you are doing.</p>
            <a href="/archo/post-detail.php" class="read">READ MORE</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="divs-main"></div>
  
         <img src="assets/img/blog1.jpg" style="width: 86.5%;height: auto;">

        </div>
          <div class="row" style="margin-bottom:8em; ">
            <div class="col-lg-2" style=" margin-top: 2em;">
              <a href="/archo/post-detail.php" class="bert">
                <span  class="num">06</span><br>
                <span class="date">Aug 2022</span>
              </a>
            </div>
            <div class="col-lg-10" style=" margin-top: 2em;">
              <div class="tags">
                <a href="#">WordPress</a>
                <a href="#">Themeforest</a>
                <a href="#">Archo</a>
              </div>
              <h4 class="head-for"><a href="/archo/post-detail.php">Build a Beautiful Blog With Ease</a></h4>
              <p style="color: #9f9f9f;
              font-size: 15px;
              font-weight: 400;
              line-height: 2;
              margin: 0;">Success is no accident. It is hard work, perseverance, learning, studying, sacrifice and most of all, love<br>of what you are doing.</p>
              <a href="/archo/post-detail.php" class="read">READ MORE</a>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="divs-main"></div>
  
         <img src="assets/img/small-couch.jpg" style="width: 86.5%;height: auto;">

        </div>
          <div class="row" style="margin-bottom:8em;">
            <div class="col-lg-2" style=" margin-top: 2em;">
              <a href="/archo/post-detail.php" class="bert">
                <span  class="num">06</span><br>
                <span class="date">Aug 2022</span>
              </a>
            </div>
            <div class="col-lg-10" style=" margin-top: 2em;">
              <div class="tags">
                <a href="#">WordPress</a>
                <a href="#">Themeforest</a>
                <a href="#">Archo</a>
              </div>
              <h4 class="head-for"><a href="/archo/post-detail.php">Build a Beautiful Blog With Ease</a></h4>
              <p style="color: #9f9f9f;
              font-size: 15px;
              font-weight: 400;
              line-height: 2;
              margin: 0;">Success is no accident. It is hard work, perseverance, learning, studying, sacrifice and most of all, love<br>of what you are doing.</p>
              <a href="/archo/post-detail.php" class="read">READ MORE</a>
            </div>
          </div>
        </div>
       -->
       <div class="container" style="width: 60%;
  margin: auto;">
  <div class="row">
  <?php foreach($users as $user){?>
    <div class="col s12">
    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user['images']); ?>"  style="width: 86.5%;height: auto;"/> 
	      <div class="row">
      <?php if($user['is_active'] == 1){?>
        <div class="col-lg-2"  style=" margin-top: 2em;">
        <a class="bert  date"><?php echo ($user['created_at']); ?></a>  
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
						  <a class="read" href="blog-edit.php?id=<?php echo ($user['id']);?>">Read more</a>
					  </div>
      <?php }?> 
		    </div>
	    </div>
    </div>
    <?php }?> 
 
      <div class="buttons-page">
        <button type="button" class="btn btn-active" style="padding: 0px;border: 1px solid #c5a47e;">1</button>
        <button type="button" class="btn btn-default" style="padding: 0px;">2</button>
        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></button>
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