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
  <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-reboot.min.css"> -->
  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.bundle.js"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap/Fontawesome/css/fontawesome.css">
   <link rel="stylesheet" type="text/css" href="bootstrap/Fontawesome/css/all.css">
   <link rel="stylesheet" type="text/css" href="bootstrap/Fontawesome/css/fontawesome.min.css">
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

body{
    margin-top:20px;
    background-color:#e9ebee;
}

.be-comment-block {
    margin-bottom: 50px !important;
    border: 1px solid #edeff2;
    border-radius: 2px;
    padding: 50px 70px;
    border:1px solid #ffffff;
}

.comments-title {
    font-size: 16px;
    color: #262626;
    margin-bottom: 15px;
}

.be-img-comment {
    width: 60px;
    height: 60px;
    float: left;
    margin-bottom: 15px;
}

.be-ava-comment {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

.be-comment-content {
    margin-left: 80px;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-name {
    font-size: 13px;
}

.be-comment-content a {
    color: #383b43;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-time {
    text-align: right;
}

.be-comment-time {
    font-size: 11px;
    color: #b4b7c1;
}

.be-comment-text {
    font-size: 13px;
    line-height: 18px;
    color: #7a8192;
    display: block;
    background: #f6f6f7;
    border: 1px solid #edeff2;
    padding: 15px 20px 20px 20px;
}

.form-group.fl_icon .icon {
    position: absolute;
    top: 1px;
    left: 16px;
    width: 48px;
    height: 48px;
    background: #f6f6f7;
    color: #b5b8c2;
    text-align: center;
    line-height: 50px;
    -webkit-border-top-left-radius: 2px;
    -webkit-border-bottom-left-radius: 2px;
    -moz-border-radius-topleft: 2px;
    -moz-border-radius-bottomleft: 2px;
    border-top-left-radius: 2px;
    border-bottom-left-radius: 2px;
}

.form-group .form-input {
    font-size: 13px;
    line-height: 50px;
    font-weight: 400;
    color: #b4b7c1;
    width: 100%;
    height: 50px;
    padding-left: 20px;
    padding-right: 20px;
    border: 1px solid #edeff2;
    border-radius: 3px;
}

.form-group.fl_icon .form-input {
    padding-left: 70px;
}

.form-group textarea.form-input {
    height: 150px;
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
          <a class="nav-link active" href="home.php"><div class="hover-item"><i class="fas fa-home"></i> Home</div></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php"><div class="hover-item"><?php echo $_SESSION["email"];?></div></a>
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
<br>
<?php $sql = "SELECT * FROM files";
$result = $con->query($sql);
$con->close(); 
?>
<?php 
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $sql="SELECT * FROM files where id=$id";
  $result=mysqli_query($con,$sql);
  $file=mysqli_fetch_assoc($result);
  $filepath='uploads/'.$file['name'];
  if (($open = fopen($filepath, "r")) !== FALSE) 
  {
  
    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
    {        
      $array[] = $data; 
    }
  
    fclose($open);
  }
  echo "<pre>";
  //To display array data
  var_dump($array);
  echo "</pre>";
  // if (file_exists($filepath)) {
  //   header('Content-Type: application/octet-stream');
  //   header('Content-Description: File Transfer');
  //   header('Content-Disposition: attachment; filename='.basename($filepath));
  //   header('Expires: 0');
  //   header('Cache-Control: must-revalidate');
  //   header('Pragma: public');
  //   header('Content-Length:'. filesize('uploads/'.$file['name']));
  //   readfile('uploads/'.$file['name']);

  //   $count=$file['downloads']+1;
  //   $update="UPDATE files SET downloads=$count WHERE id=$id";
  //   mysqli_query($con,$update);
  //   exit;

  // }
}
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Size</th>
      <th scope="col">Downloads</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['size'];?></td>
                <td><?php echo $rows['downloads'];?></td>
                <td class="actions">
                  <a href="view.php?id=<?=$rows['id']?>" class="view">View File</a>
                </td>
            </tr>
            <?php
                }
             ?>
  </tbody>
</table>
<h2 align="center">Comments</h2>
  <br />
<div class="container">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"comment-add.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"comment-list.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>

<br>
</body>
</html>

<?php include('footer.php')?>
