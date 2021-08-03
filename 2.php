<?php

if(isset($_POST['email']))
    {
        $email = $_POST['email'];
		  $addTheme = $_POST['addTheme'];
    
$link = mysqli_connect("localhost", "root", "", "isro");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "INSERT INTO addtheme (`id`, `email`, `addTheme`) values('0', '$email','$addTheme')";
if(mysqli_query($link, $sql)){
    $sql1 = "SELECT * FROM addtheme WHERE id=(SELECT max(id) FROM addtheme);";
	$result = $link->query($sql1);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
  	echo "<br>"."The Submitted Record is: "."<br>";
    echo "<br>"."<strong>Id: </strong> " . $row["id"]. " <strong> Email: </strong> " . $row["email"]. "<strong>  Name: </strong> " . $row["addTheme"]. "<br>";
  }
} else {
  echo "0 results";
}

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}
?>