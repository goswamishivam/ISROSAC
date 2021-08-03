<?php
session_start();
include 'connection.php';
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
  <!-- <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
  
  <style>
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
          <a class="nav-link active" href="admindashboard.php"><div class="hover-item"><?php echo "Welcome, ".$_SESSION["email"];?></div></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="project.php"><div class="hover-item">Project</div></a>
        </li>
      </ul>
      <ul class="navbar-nav margin-right">
        <li class="nav-item">
          <a class="nav-link active" href="logout.php"><div class="hover-item"><i class="fas fa-sign-out-alt"></i> Logout</div></a>
      </ul>
    </div>
  </div>
</nav>
<br>
<div class="card text-white bg-primary mb-3" style="max-width: 20rem; float: left; margin-left: 10px;">
  <div class="card-header"><i class="fas fa-book"></i> Current Projects</div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text"><?php
                      $query = "SELECT id FROM project ORDER BY id";
                      $query_run = mysqli_query($con,$query);

                      $row = mysqli_num_rows($query_run);

                      echo $row;
                    ?></p>
  </div>
</div>
<div class="card text-white bg-secondary mb-3" style="max-width: 20rem; float: left;margin-left: 10px;">
  <div class="card-header"><i class="fas fa-book"></i> Existing Categories</div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text">
        <?php
                    $query = "SELECT projectTheme FROM project GROUP BY projectTheme";
                    $query_run = mysqli_query($con,$query);

                    $row = mysqli_num_rows($query_run);

                    echo $row;
                  
                  ?>
    </p>
  </div>
</div>
<div class="card text-white bg-success mb-3" style="max-width: 20rem; float: left; margin-left: 10px;">
  <div class="card-header"><i class="fas fa-users"></i> Current Active Users</div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text">
         <?php
                    $query = "SELECT email FROM register ORDER BY email";
                    $query_run = mysqli_query($con,$query);

                    $row = mysqli_num_rows($query_run);

                    echo $row;
                  ?>
    </p>
  </div>
</div>

<!-- <div class="card text-white bg-danger mb-3" style="max-width: 20rem; float: left; margin-left: 10px;">
  <div class="card-header"><i class="far fa-calendar-alt"></i> Current Projects</div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text">
         <?php
                      $query = "SELECT id FROM project ORDER BY id";
                      $query_run = mysqli_query($con,$query);

                      $row = mysqli_num_rows($query_run);

                      echo $row;
                    ?>
    </p>
  </div>
</div>
<div class="card text-white bg-warning mb-3" style="max-width: 20rem; float: left;margin-left: 10px; ">
  <div class="card-header"><i class="fas fa-book"></i> Current Projects</div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text">
         <?php
                      $query = "SELECT id FROM project ORDER BY id";
                      $query_run = mysqli_query($con,$query);

                      $row = mysqli_num_rows($query_run);

                      echo $row;
                    ?>
    </p>
  </div>
</div>
<div class="card text-white bg-info mb-3" style="max-width: 20rem; float: left; margin-left: 10px;">
  <div class="card-header"><i class="fas fa-book"></i> Current Projects</div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text"> <?php
                      $query = "SELECT id FROM project ORDER BY id";
                      $query_run = mysqli_query($con,$query);

                      $row = mysqli_num_rows($query_run);

                      echo $row;
                    ?></p>
  </div>
</div>
<div class="card bg-light mb-3" style="max-width: 20rem; float: left; margin-left: 10px; ">
  <div class="card-header"><i class="fas fa-book"></i> Current Projects</div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text"> <?php
                      $query = "SELECT id FROM project ORDER BY id";
                      $query_run = mysqli_query($con,$query);

                      $row = mysqli_num_rows($query_run);

                      echo $row;
                    ?>
                        
                    </p>
  </div>
</div>
<div class="card text-white bg-dark mb-3" style="max-width: 20rem; float: left; margin-left: 10px;">
  <div class="card-header"><i class="fas fa-book"></i> Current Projects</div>
  <div class="card-body">
    <h4 class="card-title"></h4>
    <p class="card-text">
         <?php
                      $query = "SELECT id FROM project ORDER BY id";
                      $query_run = mysqli_query($con,$query);

                      $row = mysqli_num_rows($query_run);

                      echo $row;
                    ?>
    </p>
  </div>
</div> -->
<br><br>

</body>
</html>
<br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php')?>
