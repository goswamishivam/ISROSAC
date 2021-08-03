<?php
session_start();
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'isro');

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql="SELECT * FROM addTheme";
if(mysqli_query($conn, $sql)){
    $sql1 = "SELECT * FROM addtheme";
    $result = $conn->query($sql1);
  }
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


// Uploads files
if (isset($_POST['submit'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['doc']['name'];
    
    $title=$_POST['title'];
    $projectid=$_POST['projectid'];
    $projectTheme=$_POST['projectTheme'];
    $pinumber=$_POST['pinumber'];
    $organization=$_POST['organization'];
    $isroid=$_POST['isroid'];
    $focalperson=$_POST['focalperson'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['doc']['tmp_name'];
    $size = $_FILES['doc']['size'];

    if (extension_loaded($extension)) {
    
    if (!in_array($extension, ['zip', 'pdf', 'docx','csv','xlsx'])) {
      $message2="You file extension must be .zip, .pdf, .csv, .xlsx or .docx";
       echo "<script type='text/javascript'>alert('$message2');</script>";
    } elseif ($_FILES['doc']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte
        $message3="File too large!";
        echo "<script type='text/javascript'>alert('$message3');</script>";
        
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
             
            if(mysqli_query($conn, $sql) ) {
              $message = "File uploaded successfully";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
        } else {
          $message1 = "Failed to upload file.";
          echo "<script type='text/javascript'>alert('$message1');</script>";

        }
    }
}

else{
      $sql1 = "INSERT INTO project (id, title, projectid, projectTheme, pinumber, organization, isroid, focalperson) VALUES (0, '$title','$projectid','$projectTheme','$pinumber','$organization','$isroid','$focalperson')";
      if(mysqli_query($conn, $sql1) ) {
              $message = "Record saved succesfully";
              echo "<script type='text/javascript'>alert('$message');</script>";
            }
}

    
}
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
          <a class="nav-link active" href="admindashboard.php"><div class="hover-item"><?php echo $_SESSION["email"];?></div></a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="project.php" data-toggle="modal" data-target="#exampleModal"><div class="hover-item">Add Project</div></a>
        </li>
      </ul>
      <ul class="navbar-nav margin-right">
        <li class="nav-item">
          <a class="nav-link active" href="logout.php"><div class="hover-item"> <i class="fas fa-sign-out-alt"></i> Logout</div></a>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<!-- Button trigger modal -->
<!-- <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Project
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form  action="project.php" method="post" enctype="multipart/form-data">
  <input type="file" name="doc"/>
  <center>OR</center>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="">
  </div>
  <div class="form-group">
    <label for="projectid">Project ID</label>
    <input type="text" class="form-control" id="projectid" name="projectid" placeholder="">
  </div>
  <div class="form-group">
    <label for="projectTheme">Project Theme</label>
    <select class="form-control" id="projectTheme" name="projectTheme">
      <option>Satellite Communication and Navigation Applications</option>
      <option>Electro-Optical Sensors</option>
      <option>Microwave Sensors</option>
      <option>Image Processing and Applications</option>
      <option>Process Development</option>
      <option>Voice Recognition</option>
    </select>
  </div>
  <div class="form-group">
    <label for="pinumber">PI Number</label>
    <input type="text" class="form-control" id="pinumber" name="pinumber" placeholder="">
  </div>
   <div class="form-group">
    <label for="organization">Organization</label>
    <input type="text" class="form-control" id="organization" name="organization" placeholder="">
  </div>
   <div class="form-group">
    <label for="isroid">ISRO ID</label>
    <input type="text" class="form-control" id="isroid" name="isroid" placeholder="">
  </div>
  <div class="form-group">
    <label for="focalperson">Focal Person</label>
    <input type="text" class="form-control" id="focalperson" name="focalperson" placeholder="">
  </div>
  <input type="submit" class=" btn btn-primary" name="submit"/>
</form>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<!-- Body Start -->


<div class="container">
   <h3 align="center">Add Theme</h3>
   <form method="post" id="add_details">
    <div class="form-group">
     <label>Username</label>
     <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" required />
    </div>
    <div class="form-group">
     <label>Theme Name</label>
     <input type="text" name="addTheme" class="form-control" required />
    </div>
    <div class="form-group">
     <input type="submit" name="add" id="add" class="btn btn-success" value="Add" />
    </div>
   </form>
   <br />
   <h3 align="center">Existing Themes</h3>
   <br />
   <table class="table table-striped table-bordered">
    <thead>
     <tr>
      <th>Email</th>
      <th>Theme Name</th>
     </tr>
    </thead>
    <tbody id="table_data">
    <?php
    foreach($result as $row)
    {
     echo '
     <tr>
      <td>'.$row["email"].'</td>
      <td>'.$row["addTheme"].'</td>
     </tr>
     ';
    }
    ?>
    </tbody>
   </table>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#add_details').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function(){
    $('#add').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#add').attr('disabled', false);
    if(data.email)
    {
     var html = '<tr>';
     html += '<td>'+data.email+'</td>';
     html += '<td>'+data.addTheme+'</td></tr>';
     $('#table_data').prepend(html);
     $('#add_details')[0].reset();
    }
   }
  })
 });
 
});
</script>
<!-- 
<div class="card text-white bg-warning mb-3" style="width: 16rem; float: left;margin-left: 10px; ">
  <div class="card-header">
    <a class="nav-link active" href="project.php" data-toggle="modal" data-target="#exampleModal"><div class="">Electro-Optical Sensors</div></a>
  </div>
</div>

<div class="card text-white bg-warning mb-3" style="width: 16rem; float: left;margin-left: 10px; ">
  <div class="card-header">
    <a class="nav-link active" href="project.php" data-toggle="modal" data-target="#exampleModal"><div class="">Microwave Sensors</div></a>
  </div>
</div>


<div class="card text-white bg-warning mb-3" style="width: 16rem; float: left;margin-left: 10px; ">
  <div class="card-header">
    <a class="nav-link active" href="project.php" data-toggle="modal" data-target="#exampleModal"><div class="">Process Development</div></a>
  </div>
</div>


<div class="card text-white bg-warning mb-3" style="width: 16rem; float: left;margin-left: 10px; ">
  <div class="card-header">
    <a class="nav-link active" href="project.php" data-toggle="modal" data-target="#exampleModal"><div class="">Voice Recognition</div></a>
  </div>
</div>

<div class="card text-white bg-warning mb-3" style="width: 16rem;  float: left;margin-left: 10px; ">
  <div class="card-header">
    <a class="nav-link active" href="project.php" data-toggle="modal" data-target="#exampleModal"><div class="">Satellite Communication and Navigation Applications</div></a>
  </div>
</div>

<div class="card text-white bg-warning mb-3" style="width: 16rem; float: left;margin-left: 10px; ">
  <div class="card-header">
    <a class="nav-link active" href="project.php" data-toggle="modal" data-target="#exampleModal"><div class="">Image Processing and Applications</div></a>
  </div>
</div> -->


<!-- Body Ends -->
<br><br>
</body>
</html>

<?php include('footer.php')?>
