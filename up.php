<?php
error_reporting(0);
session_start();

$link = mysqli_connect("localhost", "root", "", "cert_ver");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

if (isset($_POST['upload'])){
        
        $StuName = mysqli_real_escape_string($link, $_POST['StuName']);
        $StuRegNum = mysqli_real_escape_string($link, $_POST['StuRegNum']);
        $Gender = mysqli_real_escape_string($link, $_POST['Gender']);
        $VeriNum = mysqli_real_escape_string($link, $_POST['VeriNum']);
        $InstituteID = mysqli_real_escape_string($link, $_POST['InstituteID']);
        $SerialNo = mysqli_real_escape_string($link, $_POST['SerialNo']);
        $RegNum = mysqli_real_escape_string($link, $_POST['RegNum']);
        $Programme = mysqli_real_escape_string($link, $_POST['Programme']); 
        $Institution = mysqli_real_escape_string($link, $_POST['Institution']);
        $YearOfGrad = mysqli_real_escape_string($link, $_POST['YearOfGrad']);
        $Class = mysqli_real_escape_string($link, $_POST['Class']);
        
        
       
}


        $sql = "INSERT INTO uploads (StuName, StuRegNum, Gender, Picture, VeriNum, InstituteID, SerialNo, RegNum, Programme, Institution, YearOfGrad, Class) VALUES ('$StuName', '$StuRegNum', '$Gender', '', '$VeriNum', '$InstituteID', '$SerialNo', '$RegNum', '$Programme', '$Institution', '$YearOfGrad', '$Class')";
        //var_dump($sql);
 
 
if(mysqli_query($link, $sql)){
        
                $_SESSION['success_msg'] = "Successful"; 

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);


header("Location: upload.php");
?>