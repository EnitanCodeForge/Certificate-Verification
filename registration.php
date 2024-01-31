<?php include('reg.php'); ?>
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
                        <a class="active-menu" href="index.php"><i class="fa fa-sign-out "></i>Back</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Registration</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                    
                        
                        <div class="panel-body">
                            <div class="panel-body col-md-6 col-sm-6">
                                        <form role="form" method="post" action="registration.php">
                                               
                                           <div class="page-subhead-line"><h4><b>General Information</b></h4></div>
                                                   <div class="form-group"> 
                                                        <label>Institution Name</label>
                                                        <input name="Institution_name" class="form-control" type="text" required>
                                                    
                                                        <label>Contact Address</label>
                                                        <textarea name="Address" class="form-control" rows="3" required></textarea>
                                                    
                                                    
                                                        <label>Phone Number</label>
                                                        <input name="Number" class="form-control" type="text" required>
                                                    
                                            
                                            <div class="page-subhead-line"><h4><b>Contact Person Details</b></h4></div>
                                            
                                                  
                                                        <label>First Name</label>
                                                        <input name="Firstname" class="form-control" type="text" requiredrequiredrequired>
                                                    
                                                        <label>Last Name</label>
                                                        <input name="Lastname" class="form-control" type="text" requiredrequired>
                                                  
                                                        <label>Phone Number</label>
                                                        <input name="P_number" class="form-control" type="text" required>
                                                  
                                                        <label>Email Address</label>
                                                        <input name="Email" class="form-control" type="text" required>
                                                    
                                            
                                            <div class="page-subhead-line"><h4><b>Login Details</b></h4></div>
                                            
                                                    
                                                        <label>UserName</label>
                                                        <input name="Username" class="form-control" type="text" required>
                                                    
                                                        <p>
                                                            <b>Password Policy:</b>
                                                            <span> Password length must be more the 8 character in length</span>
                                                        </p>
                                                        <label>Password</label>
                                                        <input name="Password1" class="form-control" type="password" required>
                                                        <label>Re-Type Password</label>
                                                        <input name="Password2" class="form-control" type="password" required>
                                                    </div>
                                                    

                                                    <button type="submit" name="register" class="btn btn-danger">Register Now </button>
                                                
                                                
                                                </form>
                                                
                                    

                                            
                                        </div>   

                            
                        </div>
                  
                </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : Ogungbemi Enitan
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
