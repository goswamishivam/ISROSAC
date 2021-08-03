<?php
session_start();

$connect = new PDO("mysql:host=localhost;dbname=isro", "root", "");

$data = array(
 ':email'  => $_SESSION["email"],
 ':addTheme'  => $_POST["addTheme"]
); 

$query = "
 INSERT INTO addtheme 
(email, addTheme) 
VALUES (:email, :addTheme)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 $output = array(
  'email' => $_POST['email'],
  'addTheme'  => $_POST['addTheme']
 );

 echo json_encode($output);
}

?>