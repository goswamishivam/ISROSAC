<?php

  session_start(); //Add this

  //Also you have to add your connection file before your query
  require('connection.php');
  $firstname="";
  $lastname="";
  $email="";
  $phone="";

  // SQL query
  $strSQL = "SELECT * FROM register WHERE email = '".$_SESSION['email']."'";

  // Execute the query (the recordset $rs contains the result)
  $rs = mysqli_query($con, $strSQL);

  // Loop the recordset $rs
  // Each row will be made into an array ($row) using mysqli_fetch_array
  while($row = mysqli_fetch_array($rs)) {

    // Write the value of the column FirstName (which is now in the array $row)
     $firstname=$row['firstname'];
     $lastname=$row['lastname'];
     $email=$row['email'];
     $phone=$row['phone'];

  }
  // Close the database connection
  mysqli_close($con);

  ?>
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
  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
  <script type="text/javascript" src="bootstrap/Fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="bootstrap/Fontawesome/js/fontawesome.min.js"></script>
  <script type="text/javascript" src="bootstrap/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/charts/loader.js"></script>
    <style type="text/css">
        body {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
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
          <a class="nav-link active" href="dashboard.php"><div class="hover-item"><?php echo $_SESSION["email"];?></div></a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link active" href="profile.php"><div class="hover-item">Profile</div></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="project1.php"><div class="hover-item">Project</div></a>
        </li>
      </ul>
      <ul class="navbar-nav margin-right">
        <li class="nav-item">
          <a class="nav-link active" href="logout.php"><div class="hover-item"> <i class="fas fa-sign-out-alt"></i> Logout</div></a>
      </ul>
    </div>
  </div>
</nav>

  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="usericon.jpg" style="height: 200px;"><?php echo $firstname;?></span><span class="text-black-50"><?php echo $_SESSION['email']; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="post" action="updateprofile.php">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Firstname</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $firstname; ?>" > </div>
                    <div class="col-md-6"><label class="labels">Lastname</label><input type="text" class="form-control" value="<?php echo $lastname; ?>" placeholder="lastname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $phone; ?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $email; ?>"></div>
                </div>
               
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div></form>
            </div>
        </div>
      <!--   <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
        <div class="col-md-4">
            <div class="p-3 py-5">
                        <div class="profile-img">
                            <img src="isro.png" alt=""/>
                        </div>
                        <div class="profile-img">
                            <img src="sac.png" alt=""/>
                        </div>
                    </div>
                </div>
    </div>
</div>
</div>
</div>
  </body>
  </html>
  
<?php include('footer.php')?>
