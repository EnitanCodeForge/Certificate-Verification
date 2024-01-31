<?php

$link = mysqli_connect("localhost", "root", "", "cert_ver");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  
if(isset($_POST['submitted'])){
        
        var_dump($_POST);
       
        $svn = $_POST['svn'];
        $name = $_POST['name'];
        $regNo = $_POST['regNo'];
        $serialNo = $_POST['serialNo'];
        $institutionId = $_POST['institutionId'];
        
         
        
}

//modify_certificate.html

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Certificate Verification</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">CERT-VERI</a>
            </div>

            
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    

                    <li>
                        <a  href="#"><i class="fa fa-desktop "></i>Home</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-file-text "></i>Certificate <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-database"></i>Upload</a>
                            </li>
                            <li>
                                <a href="verify_certificate.html"><i class="fa fa-check "></i>Verify</a>
                            </li>
                             <li>
                                <a href="#"><i class="fa fa-edit "></i>Modify</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="verify_purchase.html"><i class="fa fa-yelp "></i>Purchase Verification Code</a>
                     </li>
                    <li>
                        <a href="#"><i class="fa fa-user "></i>Update Profile </a>
                    </li>
                    <li>
                        <a class="active-menu" href="index.html"><i class="fa fa-sign-out "></i>Logout</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                       <h1 class="page-head-line">MODIFY</h1>
                        <h1 class="page-subhead-line"></h1>

                    </div>
                    <div class="col-md-6">
                            
                    <form method="post">
                            
                     <div class="form-group">
                         <label>Student Verification No</label>
                            <input class="form-control" type="text" name="svn">
                     </div>
                     <div class="form-group">
                         <label>Student Name</label>
                            <input class="form-control" type="text" name="name">
                     </div>
                     <div class="form-group">
                         <label>Student Reg No</label>
                            <input class="form-control" type="text" name="regNo">
                     </div>
                        
                     <div class="form-group">
                         <label>Serial No</label>
                            <input class="form-control" type="text" name="serialNo">
                     </div>
                     <div class="form-group">
                         <label>Institution Id</label>
                            <input class="form-control" type="text" name="institutionId">
                     </div>
                        
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary" name="submitted">
                                <i class="fa fa-edit"></i>&nbsp;&nbsp;Modify
                            </button>
                        </span>

                    </div>
                            
                            </form>
                        
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2018 Cert-Veri | Design By : Ogungbemi Enitan
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
