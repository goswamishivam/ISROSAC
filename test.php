<?php
 $con = mysqli_connect('localhost','root','','isro');
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
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
 
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['Project Name','Numbers'],
 <?php 
      $query = "SELECT * from projects";

       $exec = mysqli_query($con,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['project_name']."',".$row['number']."],";
       }
       ?> 
 
 ]);

 var options = {
 title: 'Number of Projects',
  pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
 };
 var chart = new google.visualization.PieChart(document.getElementById("columnchart12"));
 chart.draw(data,options);
 }
  
    </script>

</head>
<body>
 <div class="container-fluid">
 <div id="columnchart12" style="width: 100%; height: 500px;"></div>
 </div>

</body>
</html>
