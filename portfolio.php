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
   
<section style="margin-top: -7em;">
  <div class="background-small"></div>
<div class="port">
  <div class="context1">
    <h2>Architecture is a visual art,<br>and the building speak for themeselves</h2>
    <p>Architecture bibendum pharetra eleifend. Suspendisse vel volutpat purus, sit amet bibendum nisl. Cras mollis<br>turpis a ipsum ultes, nec condimentum ipsum consequat. Mauris vitae consequat nibh, vitae interdum mi.</p>
  </div>
</div>
</section>
<section style="padding: 120px 0;">
  <div class="container">
    <!-- MAIN (Center website) -->
<div class="main">
  <h3>Works</h3>
  
  <div id="myBtnContainer">
    <button class="btn flower active" onclick="filterSelection('all')">All</button>
    <button class="btn flower" onclick="filterSelection('nature')"> Interior</button>
    <button class="btn flower" onclick="filterSelection('cars')"> Theater</button>
    <button class="btn flower" onclick="filterSelection('people')"> Residential</button>
  </div>
  
  <!-- Portfolio Gallery Grid -->
  <div class="row tree">
    <div class="column leaf nature people">
      <div class="content12">
        <img src="https://archo-react.vercel.app/assets/img/works/1.jpg" alt="Mountains" style="width:100%">
        <div class="cont vis"><h5><a href="#">Modern Townhouse</a></h5><span>Architecture</span><span>Modern</span></div>
      </div>
    </div>
    <div class="column leaf cars">
      <div class="content12">
      <img src="https://archo-react.vercel.app/assets/img/works/2.jpg" alt="Lights" style="width:100%">
      <div class="cont vis"><h5><a href="#">Modern Townhouse</a></h5><span>Architecture</span><span>Modern</span></div>
      </div>
    </div>
    <div class="column leaf nature">
      <div class="content12">
      <img src="https://archo-react.vercel.app/assets/img/works/5.jpg" alt="Nature" style="width:100%">
      <div class="cont vis"><h5><a href="#">Modern Townhouse</a></h5><span>Architecture</span><span>Modern</span></div>
      </div>
    </div>
    
    <div class="column leaf people">
      <div class="content12">
        <img src="assets/img/blog1.jpg" alt="Car" style="width:100%">
        <div class="cont vis"><h5><a href="#">Modern Townhouse</a></h5><span>Architecture</span><span>Modern</span></div>
      </div>
    </div>
    <div class="column leaf cars">
      <div class="content12">
      <img src="https://archo-react.vercel.app/assets/img/works/4.jpg" alt="Car" style="width:100%">
      <div class="cont vis"><h5><a href="#">Modern Townhouse</a></h5><span>Architecture</span><span>Modern</span></div>
      </div>
    </div>
   
  <!-- END GRID -->
  </div>
  
  <!-- END MAIN -->
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
</body>
</html>