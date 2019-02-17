<?php require_once 'core/init.php';
   $username = input::get('username');
  $staff_id = input::get('staff_id');
  include 'details/staff-details.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>..View Staff's Profile</title>
    <link rel="shortcut icon" href="src/media/favico.ico" type="image/x-icon">
       <!-- BOOTSTRAP STYLES-->
    <link href="admin/css/bootstrap.css" rel="stylesheet" />
    <link href="src/bootstrap/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
    <link href="src/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="src/bootstrap/css/bootstrap.min.css">
     <!-- FONTAWESOME STYLES-->
    <link href="admin/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="admin/css/admin.css" rel="stylesheet" />
    <link href="src/css/stafs.css" rel="stylesheet" />

     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="src/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="src/swal/sweetalert2.css">
    <link rel="stylesheet" href="src/swal/sweetalert2.min.css">
<!--===============================================================================================-->
        <!-- SWEETALERT CDN -->
    <script src="src/swal/sweetalert2.all.min.js"></script>
    <script src="src/swal/sweetalert2.min.js"></script>
    <script src="src/swal/sweetalert2.all.min.js"></script>
    <script src="src/swal/sweetalert2.js"></script>
    <!-- SWEETALERT CDN -->

</head>
<body>

           
<div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <!-- <img class="logo" src="src/media/mapoly.jpg" /> -->

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  
                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

                         <li >
                        <a href="admin.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>
                   
                      <li>
                        <a href="allstaffs.php"><i class="fa fa-eye "></i>View Staffs</a>
                    </li>


                    <li>
                        <a href="viewtoupdate.php"><i class="fa fa-edit "></i>Edit Staffs</a>
                    </li>
                    <li>
                        <a href="viewtopromote.php"><i class="fa fa-bar-chart-o"></i>Promote Staffs</a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2> VEW STAFF </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <!-- Table -->
<i class="fa fa-user">Details</i>
<div class="jumbotron details-jumb">
    <div class="row">


           <div class="col-md-4">
           <?php
            echo "<a href=".$userimg."><img class='staff-pic mx-auto img-fluid img-circle d-block' src='". $userimg."' alt='avatar'></a>";?>
            </div>

           <div class="col-md-8">
             <p class="details">
               <!-- <span class="glyphicon glyphicon-user" aria-hidden="true">  </span> --> <a href="#" class="badge badge-dark badge-pill"> TITLE: </a>  <?php echo $title;?>

              <!--   <span class="glyphicon glyphicon-user" aria-hidden="true"></span> --> <a href="#" class="badge badge-dark badge-pill"> FIRSTNAME: </a>
                   <?php echo $firstname;?>

                <!-- <span class="glyphicon glyphicon-user" aria-hidden="true"></span> --> <a href="#" class="badge badge-dark badge-pill"> LASTNAME: </a>
               <?php echo $lastname;?> <br/>


                <!-- <i class="fa fa-envelope" aria-hidden="true"> </i> --> <a href="#" class="badge badge-dark badge-pill"> e-MAIL: </a> 
                  <?php echo $email;?>  


               <!--  <i class="fa fa-phone" aria-hidden="true"> </i> --> <a href="#" class="badge badge-dark badge-pill"> TEL: </a> <?php echo $phone;?> <br/>


                <!--             <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> --> <a href="#" class="badge badge-dark badge-pill"> DOB: </a>  <?php echo $dob;?>

                <!-- <i class="fa fa-map-marker" aria-hidden="true"> </i> --> <a href="#" class="badge badge-dark badge-pill"> STATE OF ORIGIN: </a>
               <?php echo $sog;?> <br/>


                <!-- <i class="fa fa-map-marker" aria-hidden="true"> </i> --> <a href="#" class="badge badge-dark badge-pill"> ADDRESS: </a><?php echo $street;?>, <?php echo $city;?>, <?php echo $state;?> <br/>

                <!-- <i class="fa fa-info" aria-hidden="true"></i> --> <a href="#" class="badge badge-dark badge-pill"> DEPARTMENT: </a> <?php echo $department?>

                <!-- <i class="fa fa-arrow-up" aria-hidden="true"></i> --> 
           
            </p>
            </div>
        </div>
  </div>

<div class="row">
    <div class="col-md-12">
            <i class="fa fa-info">Bio</i>
        <div class="jumbotron bio-jumb ">
            <p class="details">
                 <br/>
                             <?php echo $bio ;?><br/>
            
            <a href="#" class="badge badge-dark badge-pill"> LEVEL: <?php include 'details/getlevel.php';
                echo $level;
            ?> </a>
            </p>
        </div>
    </div>




         

                <div class="col-md-4">
                    <?php include_once 'details/getcert.php';?>
                    <div class="jumbotron cert-jumb">
                     <strong><?php echo $firstname;?></strong>  is currently a/an <strong><?php echo $certname;?></strong> Holder
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="jumbotron cert-jumb">
                         <a href='<?php echo $cv;?>'  class="badge badge-dark badge-pill"> CHECK CV</a>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="jumbotron cert-jumb">
                    <a href='<?php echo $cert;?>'  class="badge badge-dark badge-pill">VIEW CERTIFICATE</a>
                </div>
                    </div>



</div>


                 <!-- /. ROW  -->           
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
                       <div class="col-lg-12" >
  <p> &copy E-Appraisal System V2.0 <script> document.write( new Date().getFullYear());</script></p> 
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="Admin/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="Admin/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="Admin/js/custom.js"></script>
    
   
</body>
</html>
