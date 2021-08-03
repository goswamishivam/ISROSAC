
    <?php

if(isset($_POST['submit']))
    {
          $email = $_POST['email'];
          $email = $email.'@sac.isro.gov.in';
		  $firstname = $_POST['firstname'];
		  $lastname = $_POST['lastname'];
		  $pswd = $_POST['pswd'];
		  $pswd = md5($pswd);
		  $phone = $_POST['phone'];
    
$link = mysqli_connect("localhost", "root", "", "isro");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$sql = "INSERT INTO register  values('$firstname', '$lastname','$email', '$pswd','$phone')";
if(mysqli_query($link, $sql)){
   header("Location: home.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}
?>