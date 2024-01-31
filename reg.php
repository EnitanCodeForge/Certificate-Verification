<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "cert_ver");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if (isset($_POST['register'])){
        
        
        $Institution_name = mysqli_real_escape_string($link, $_REQUEST['Institution_name']);
        $Address = mysqli_real_escape_string($link, $_REQUEST['Address']);
        $Number = mysqli_real_escape_string($link, $_REQUEST['Number']);
        $Firstname = mysqli_real_escape_string($link, $_REQUEST['Firstname']);
        $Lastname = mysqli_real_escape_string($link, $_REQUEST['Lastname']);
        $P_number = mysqli_real_escape_string($link, $_REQUEST['P_number']);
        $Email = mysqli_real_escape_string($link, $_REQUEST['Email']);
        $Username = mysqli_real_escape_string($link, $_REQUEST['Username']);
        $Password1 = mysqli_real_escape_string($link, $_REQUEST['Password1']); 
        $Password2 = mysqli_real_escape_string($link, $_REQUEST['Password2']);
}

error_reporting(0);

 if($Password1 != $Password2){
         echo "<h3>The two password do not match</h3>";
         
 }else if(empty($Password1 && $Password2)){
         echo "";
         
 }else{
         
        $Password = sha1($Password1);
        $sql = "INSERT INTO users (Institution_name, Address, Number, Firstname, Lastname, P_number, Email, Username, Password) VALUES ('$Institution_name', '$Address', '$Number', '$Firstname', '$Lastname', '$P_number', '$Email', '$Username', '$Password')";
 }

 






error_reporting(0);


if(mysqli_query($link, $sql)){
    echo "";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

error_reporting(0);
 
// close connection
mysqli_close($link);
?>