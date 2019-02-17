<?php require_once 'core/init.php';?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>..Staff Section</title>
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
            <?php
        if (Session::exists('home')) {
                # code...
                echo '<p>'. Session::flash('home') .'</p>';
                        
              }     
                     $user = new User();

         if ($user->isLoggedIn()) {
            # code...
          include 'details/personal-data.php';

         if ($user->hasPermission('admin')) {
            # code...
            redirect::to('admin.php');
         }
         ?>

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
                 


                    <li class="active-link">
                        
                    <li class="active-link">
                        <a href="staff.php?username=<?php echo $username;?>" ><i class="fa fa-desktop "></i>MY Dashboard<span class="badge">Included</span></a>
                    </li>
                   

                   <!--  <li>
                        <a href="ui.html"><i class="fa fa-table "></i>UI Elements  <span class="badge">Included</span></a>
                    </li> -->
                    <li>
                        <a href="complete-bio.php?username=<?php echo $username;?>"><i class="fa fa-eye "></i>Upload A picture!</a>
                    </li>


                   <li>
                        <a href="certification.php?username=<?php echo $username;?>"><i class="fa fa-edit "></i>Certificates</a>
                    </li>                   
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
         <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2><?php  
                      echo $firstname .' '. $lastname; ?></h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                              <?php include 'details/getcert.php';?>
                            <?php include 'details/getlevel.php';
                            
                            $current = date('d F Y, h:i:s A');


                            if ($promoted < $current) {
                              ?>
                               
                             <?php echo '
                         <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <strong> ' . $firstname .' '.  $lastname .'</strong> You Have   A New  <a class="alert-link" href="promotion-letter.php?username='.$username .'"><span class="badge badge-dark badge-pill"><span class="fa fa-inbox"> Message</span></span></a>
                        </div>';?>
                             <?php
                                } 
         
                                 }else{
                                    redirect::to('login.php');
                                 }
                               ?>

                    </div>
                </div>

                    <hr/ >  
<div class="row">
  
   <div class="col-md-4">
        <div class="jumbotron staff-jumb" align="center">
           <?php
            echo "<a href=".$userimg."><img class='staff-pic mx-auto img-fluid img-circle d-block' src='". $userimg."' alt='avatar'></a>";?>
        </div>
  </div> 

<div class="col-md-8">
    <div class="jumbotron details-jumb">
         <p class="details">
         <!-- <span class="glyphicon glyphicon-user" aria-hidden="true">  </span> --> <a href="#" class="badge badge-dark badge-pill"> TITLE: </a> <?php echo $title;?>
          <!--   <span class="glyphicon glyphicon-user" aria-hidden="true"></span> --> <a href="#" class="badge badge-dark badge-pill"> FIRSTNAME: </a> 
                   <?php echo $firstname;?>


            <!-- <span class="glyphicon glyphicon-user" aria-hidden="true"></span> --> <a href="#" class="badge badge-dark badge-pill"> LASTNAME: </a>
                             <?php echo $lastname;?> <br/>


            <!-- <i class="fa fa-envelope" aria-hidden="true"> </i> --> <a href="#" class="badge badge-dark badge-pill"> e-MAIL: </a> 
                             <?php echo $email;?> 


           <!--  <i class="fa fa-phone" aria-hidden="true"> </i> --> <a href="#" class="badge badge-dark badge-pill"> TEL: </a> <?php echo $phone;?> <br/>


            <!--             <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> --> <a href="#" class="badge badge-dark badge-pill"> DOB: </a> 
                             <?php echo $dob;?>

            <!-- <i class="fa fa-map-marker" aria-hidden="true"> </i> --> <a href="#" class="badge badge-dark badge-pill"> STATE OF ORIGIN: </a>
                             <?php echo $sog;?> <br/>


            <!-- <i class="fa fa-map-marker" aria-hidden="true"> </i> --> <a href="#" class="badge badge-dark badge-pill"> ADDRESS: </a>
                             <?php echo $street;?>, <?php echo $city;?>, <?php echo $state;?> <br/>

            <!-- <i class="fa fa-info" aria-hidden="true"></i> --> <a href="#" class="badge badge-dark badge-pill"> DEPARTMENT: </a>                 <?php echo $department;?>

             <!-- <i class="fa fa-info" aria-hidden="true"></i> --> <a href="#" class="badge badge-dark badge-pill"> JOINED: </a>                 <?php echo $joined;?>

            <!-- <i class="fa fa-arrow-up" aria-hidden="true"></i> --> <a href="#" class="badge badge-dark badge-pill"> LEVEL: <?php include 'details/getlevel.php';
                echo $level;
            ?> </a> <br/>
       
        </p>
    </div>
</div>



<div class="col-md-12">
    <div class="jumbotron bio-jumb">
        <p class="details">
                         <?php echo $bio;?>
        </p>
    </div>
</div>

</div>

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
    <script src="admin/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
      <script src="src/bootstrap/js/bootstrap-dropdownhover.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="admin/js/custom.js"></script>
    
   
</body>
</html>
