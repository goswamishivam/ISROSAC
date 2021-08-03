<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css"> -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/Fontawesome/css/fontawesome.css">
   <link rel="stylesheet" type="text/css" href="bootstrap/Fontawesome/css/all.css">
   <link rel="stylesheet" type="text/css" href="bootstrap/Fontawesome/css/fontawesome.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-reboot.min.css"> -->
  <script type="text/javascript" src="bootstrap/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="bootstrap/Fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="bootstrap/Fontawesome/js/fontawesome.min.js"></script>
  <!-- <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script> -->


  <style type="text/css">
    .hover-item {
  background-color:inherit;
}
.hover-item:hover {
  background-color: green;
}
  </style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <img src="isro.png" style="height: 50px; padding-right: 0px;">
  <img src="sac.png" style="height: 50px; width: 100px; padding-right: 5px;">
  <a class="navbar-brand" href="#">CMS Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          <a class="nav-link active" href="home.php"><div class="hover-item"> <i class="fas fa-home"></i> Home</div></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="home.php" data-toggle="modal" data-target="#exampleModal"><div class="hover-item">Admin Login</div></a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
     <a class="nav-link active" href="home.php" data-toggle="modal" data-target="#exampleModalUser"><div class="hover-item"><i class="fas fa-sign-in-alt"></i> Log-In</div></a></ul>
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-user-plus"></i> Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="adminauth.php" method="post">
        <div class="container">
  
      <div class="input-group mb-2">
        <input type="text" name="email" id="email" class="form-control" placeholder="Username" required=""/>
          <div class="input-group-postpend">
              <div class="input-group-text" id="email" >@sac.isro.gov.in</div>
          </div>
      </div>
   
    <div class="input-group mb-2">
      <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" style=" width: 300px; display: block; margin: auto; "required=""/>
    </div>
    <input type="submit" id="button" value="Login" class="btn btn-primary deep-purple btn-block " style=" width: 100px; display: block; margin: auto;">
  </div>
</form>
<br>
</div>
</div>
</div>

<div class="modal fade" id="exampleModalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i> User Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="authentication.php" method="post">
        <div class="container">
  
      <div class="input-group mb-2">
        <input type="text" name="email" id="email" class="form-control" placeholder="Username" required=""/>
          <div class="input-group-postpend">
              <div class="input-group-text" id="email" >@sac.isro.gov.in</div>
          </div>
      </div>
   
    <div class="input-group mb-2">
      <input type="password" class="form-control" id="pswd" placeholder="Enter password" name="pswd" style=" width: 300px; display: block; margin: auto; "required=""/>
    </div>
    <input type="submit" id="button" value="Login" class="btn btn-primary deep-purple btn-block " style=" width: 200px; display: block; margin: auto;">
  </div>
  <br>
  <a href="" style="margin-left: 35%;">Forget Password?</a>
<br>
<p style="margin-left: 30%;">New User? <a href="Signup.php">Signup Now</a>  </p>
</form>
<br>
</div>
</div>
</div>


</body>
</html>