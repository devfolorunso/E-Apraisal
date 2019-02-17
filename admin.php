<?php require_once 'core/init.php';?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>..Admin Dashboard</title>
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

      	echo '<p>'. Session::flash('home') .'</p>';
		 	
      } 	
		 $user = new User();

		 if ($user->isLoggedIn()) {
		 	# code...
	
		 if (!$user->hasPermission('admin')) {
		 	# code...
		 	redirect::to('staff.php');
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
                        <a href="admin.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>
                   

                   <!--  <li>
                        <a href="ui.html"><i class="fa fa-table "></i>UI Elements  <span class="badge">Included</span></a>
                    </li> -->
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
                    <div class="col-lg-12">
                     <h2>ADMIN DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome <?php echo escape($user->data()->username); ?>!!! ! </strong> You Have No pending Task For Today.
                        </div>
                        		<?php
		 
								 }else{
								 	redirect::to('login.php');
								 }
								 ?>

                    </div>
                </div>

                <hr />
                    <hr/ >
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top" id="board">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                  </div>


                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="allstaffs.php" >
 					<!-- <i class="fa fa-circle-o-notch fa-5x"></i> -->
					 <i class="fa fa-users fa-5x"></i>

                      <h4>Check Data</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                 
<!--                   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-envelope-o fa-5x"></i>
                      <h4>Mail Box</h4>
                      </a>
                      </div>
 -->                     
                     
                  <!-- </div> -->
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="viewtopromote.php" >
						 <i class="fa fa-lightbulb-o fa-5x"></i>
                      <h4>Promote Staffs</h4>
                      </a>
                      </div>
                  </div>


                  
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="viewtoupdate.php" >
 <i class="fa fa-edit fa-5x"></i>
                      <h4>Update Data</h4>
                      </a>
                      </div>
                     
                     
                  </div>
              </div>
                 <!-- /. ROW  --> 
                <div class="row text-center pad-top">
                 
                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                  </div>

                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="remove-staff.php" >
					 <i class="fa fa-trash fa-5x"></i>
                      <h4>Delete Staff</h4>
                      </a>
                      </div>
                  </div>
<!-- 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 						<i class="fa fa-gear fa-5x"></i>
                      <h4>Settings</h4>
                      </a>
                      </div>
                     
                     
                  </div> -->
                  <!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-wechat fa-5x"></i>
                      <h4>Live Talk</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-bell-o fa-5x"></i>
                      <h4>Notifications </h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-rocket fa-5x"></i>
                      <h4>Launch</h4>
                      </a>
                      </div>
                     
                     
                  </div> -->

                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                  </div>
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="register-staff.php" >
 							<i class="fa fa-user fa-5x"></i>
                      <h4>Register Staff</h4>
                      </a>
                      </div>
                  </div> 

              </div>   
                  <!-- /. ROW  -->    
                 
              </div>
                 <!-- /. ROW  -->   
				  <!-- <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                        <div class="alert alert-danger">
                             <strong>Want More Icons Free ? </strong> Checkout fontawesome website and use any icon <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">Click Here</a>.
                        </div>
                       
                    </div>
                    </div> -->
                  <!-- /. ROW  --> 
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
