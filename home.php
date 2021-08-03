<!DOCTYPE html>
<html>
<head>
  <title></title> 
  <style>

  #mySidenav a {
  margin-top: 45px;
  position: absolute;
  left: -65px;
  transition: 0.3s;
  padding: 10px;
  width: 100px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 15px;
}

#mySidenav a:hover {
  left: 0;
}

#about {
  top: 20px;
  background-color: #04AA6D;
}

#blog {
  top: 70px;
  background-color: #2196F3;
}

#projects {
  top: 120px;
  background-color: #f44336;
}

#contact {
  top: 170px;
  background-color: #555;
}

</style>
</head>
<body>
<?php include('header.php');?>
<center><h1 style="padding: 20px;">Web based CMS forum for Research Projects</h1></center>
<marquee  onmouseover="stop()" onmouseout="start()">
<a href="#">This portal is hosted by Space Application Center (SAC) ISRO, Ahemdabad.</a> 
</marquee>

<div id="mySidenav" class="sidenav">
  <a href="#" id="about">About <i class="fas fa-address-book" style="float: right;"></i></a>
  <a href="#" id="blog">Blog <i class="fas fa-blog" style="float: right;"></i></a>
  <a href="#" id="projects">Notice <i class="fas fa-exclamation-circle" style="float: right;"></i></a>
  <a href="#" id="contact">Ask <i class="far fa-question-circle" style="float: right;"></i></a>
</div>

<div class="container-fluid">
<!-- <img src="image1.jpg" style="height: 20%; width: 70%; margin-left: 10px;"><br><br>
<img src="image2.jpg" style="height: 20%; width: 70%; margin-left: 10px;"> -->

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-left: 50px; margin-top: 50px; margin-right: 50px;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="image1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image2.jpg" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>




</body>
</html>
<br><br><br><br><br>
<?php include('footer.php');?>