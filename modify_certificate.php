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
        <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
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
                                <a href="upload.php"><i class="fa fa-database"></i>Upload</a>
                            </li>
                            <li>
                                <a href="verify_certificate.html"><i class="fa fa-check "></i>Verify</a>
                            </li>
                             <li>
                                <a href="verify_modify.html"><i class="fa fa-edit "></i>Modify</a>
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
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">MODIFY</h1>
                        <h1 class="page-subhead-line"> 
                            <div class="alert alert-info">
                                You can now Modify. Ogungbemi Enitan Profile.
                            </div>
                        </h1>

                    </div>
                </div>
                 <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="panel panel-info">
                        <div class="panel-heading">
                          STUDENT INFORMATION
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                        <div class="form-group">
                                            <label>Student Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Student Reg Number</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control">
                                                <option>Male</option>
                                                <option>Female</option>
                                        </select>
                                        </div>
                                
                                
                                        <div class="form-group">
                                            <label class="control-label">Picture</label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-info"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file"></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="form-group">
                                            <label>Verification Number</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Institution_id</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </form>
                            </div>
                        </div>
                            </div>
                     <div class="col-md-6 col-sm-6 col-xs-12">
                       <div class="panel panel-info">
                                <div class="panel-heading">
                                   CERTIFICATE DETAILS
                                </div>
                                <div class="panel-body">
                                    <form role="form">

                                         <div class="form-group">
                                                    <label>Serial No</label>
                                                    <input class="form-control" type="text">
                                         </div>
                                        <div class="form-group">
                                                    <label>Registration Number</label>
                                                    <input class="form-control" type="text">
                                         </div>
                                          <div class="form-group">
                                            <label>Programme</label>
                                                <select class="form-control">
                                                   <option>Bsc Computer Information System</option>
                                                   <option>Two Vale</option>
                                                   <option>Three Vale</option>
                                                   <option>Four Vale</option>
                                                </select>                    
                                        </div>
                                            <div class="form-group">
                                            <label>Institution</label>
                                                <select class="form-control">
                                                   <option>Esm University</option>
                                                   <option>Univerity of Lagos</option>
                                                   <option>University of Ile-Ife</option>
                                                   <option>Olabisi Onabanjo University</option>
                                                </select>                    
                                        </div>

                                        <div class="form-group">
                                            <label>Year of Graduation</label>
                                                <select class="form-control">
                                                   <option>2018</option>
                                                   <option>2017</option>
                                                   <option>2016</option>
                                                   <option>2015</option>
                                                </select>                    
                                        </div>
                                        <div class="form-group">
                                            <label>Class</label>
                                                <select class="form-control">
                                                   <option>Secondclass Lower</option>
                                                   <option>First Class Honor</option>
                                                   <option>Second Class Upper</option>
                                                   <option>Third Class Upper</option>
                                                </select>                    
                                        </div>
                                                

                                            </form>
                                    </div>
                                </div>
                     </div>
        </div>
                <center>
                    <br/>
                    <button type="submit" class="btn btn-info"> Submit </button>
                </center>
                
             <!--/.ROW-->

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
    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/js/bootstrap-fileupload.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
