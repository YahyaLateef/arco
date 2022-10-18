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
    <div class="background" style="background-image: url(https://archo-react.vercel.app/assets/img/pg2.jpg);"></div>
    <div class="context34">
      <h1>Contact Us</h1>
      <div class="path">
        <a href="index.php">Home</a>
        <span>/</span>
        <a href="about.php" class="pathy">Contact Us</a>
      </div>
    </div>
  </div>
</section>

<section style="margin-top:4em;margin-bottom:4em; padding: 120px 0px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card contact" style="width:360px">
          <div class="card-body">
            <i class="fa-solid fa-mobile-screen"></i>
            <h6 class="card-title" style=" font-size: 20px;
            color: #c5a47e;
            margin-bottom: 10px;
            font-family: CCFont,sans-serif;margin-left: 3em;">Call Us</h6>
            <p class="card-text" style="color: #9f9f9f;
            font-size: 15px;
            font-weight: 400;
            line-height: 2;
            margin: 0;margin-left: 4em;">+7 (111) 1234 56789<br>+1 (000) 9876 54321</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card contact" style="width:360px">
          <div class="card-body">
            <i class="fa-regular fa-envelope-open"></i>
            <h6 class="card-title" style=" font-size: 20px;
            color: #c5a47e;
            margin-bottom: 10px;
            font-family: CCFont,sans-serif;margin-left: 3em;">Email Us</h6>
            <p class="card-text"  style="color: #9f9f9f;
            font-size: 15px;
            font-weight: 400;
            line-height: 2;
            margin: 0;margin-left: 4em;">contact@Archo.com<br>Username@website.com</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card contact" style="width:360px">
          <div class="card-body">
            <i class="fa-regular fa-map"></i>
            <h6 class="card-title" style=" font-size: 20px;
            color: #c5a47e;
            margin-bottom: 10px;
            font-family: CCFont,sans-serif;margin-left: 3em;">Address</h6>
            <p class="card-text"  style="color: #9f9f9f;
            font-size: 15px;
            font-weight: 400;
            line-height: 2;
            margin: 0;margin-left: 4em;"> B17 Princess Road, London, Greater<br>London NW18JR, United Kingdom</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="padding: 120px 0px;">
  <div class="row">
    <div class="col-lg-6">
      <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=600&amp;hl=en&amp;q=Louvre museum, 75001 Paris, فرنسا  &amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://embedmapgenerator.com/">embed google maps in website</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:600px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:600px;}.gmap_iframe {height:600px!important;}</style></div>
    </div>
    <div class="col-lg-6" style="padding: 120px 5%;">
      <form class="formula">
        <div class="form-group"></div>
         <label for="Name"></label>
         <input type="name" class="form-control" id="Name" aria-describedby="nameHelp" placeholder="Name">
         <label for="Email"></label>
         <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Email">
          <label for="Message"></label>
          <textarea class="form-control" id="textAreaExample1" rows="4" placeholder="Message"></textarea>
          
        </div>
        <button type="submit" class="btn btn-primary bbs" style="font-size: 16px;
        font-weight: 500;
        letter-spacing: 1px;
        position: absolute;
        top: -1px;
        left: 0;
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
    margin-top: -5em;
    ">Send Message</button>
      </form>
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
      if (scroll > 30) {
        $(".black").css("background" , "#212121");
      }
      if(scroll > 30){
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