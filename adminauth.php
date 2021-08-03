<?php    

    session_start();
 
    include('connection.php');  
    $email = $_POST['email']; 
    $email = $email.'@sac.isro.gov.in'; 
    $pswd = $_POST['pswd']; 
    $pswd = md5($pswd); 
      
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $pswd = stripcslashes($pswd);  
        $email = mysqli_real_escape_string($con, $email);  
        $pswd = mysqli_real_escape_string($con, $pswd);  
      
        $sql = "select * from login where email = '$email' and pswd = '$pswd'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['email'] = $email;
            header("Location: admindashboard.php"); 
        }
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  