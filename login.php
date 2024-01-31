<?php
error_reporting(0);

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "cert_ver");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if (isset($_POST['login'])){
        
        
     
        $Username = mysqli_real_escape_string($link, $_POST['Username']);
        $Password = mysqli_real_escape_string($link, $_POST['Password']);
        
}


         
        $Password = sha1($Password);
//svar_dump($Password);
        $sql = "SELECT * FROM users WHERE Username='$Username' and Password='$Password'";
        $result = mysqli_query($link, $sql);
 
        if (mysqli_num_rows($result) == 1){
                
                header('location:home.php');
        }



 


mysqli_query($link, $sql);
error_reporting(0);
 
// close connection
mysqli_close($link);
?>