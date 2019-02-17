<?php require_once 'core/init.php';?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>..Update staff's DATA</title>
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
    <!--================================-->
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

 <hr /> <!--====UPADTE FORM STATRS  HERE====-->
 <?php

 $id = input::get('staff_id');
    
    if (Input::exists()) {

        $update = DB::getInstance()->update('staff', $id, array(

        'title' => input::get('title'),

        'firstname' => input::get('firstname'),

        'lastname' => input::get('lastname'),

        'phone' => input::get('phone'),

        'street' => input::get('street'),

        'city' => input::get('city'),

        'state' => input::get('state'),

        'department' => input::get('department')

                ));

        if($update){ 
        echo ' <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <center> DATA UPDATED SUCCESSFULLY!!! </center></div>';     
            
        }else{

        echo "Unable to update" . error();
        }
    }?>

<div class="row">
    <div class="col-md-3"></div>

<div class="col-md-6">
        <?php 
        include 'details/toupdate.php';    
        ?>
<form class="form" method="post">
    
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" value="<?php echo $title;?>" name="title">
    </div>

    <div class="form-group">
        <label>Firstname</label>
        <input type="text" class="form-control" value="<?php echo $firstname;?>" name="firstname">
    </div>

    <div class="form-group">
        <label>Lastname</label>
        <input type="text" class="form-control" value="<?php echo $lastname;?>" name="lastname">
    </div>

    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="form-control" value="<?php echo $phone;?>" name="phone">
    </div>


    
    <div class="form-group">
         <label>Address</label>
      <div class="row">
        
        <div class="form-group col-md-12">
            <input type="text" class="form-control" value="<?php echo $street;?>" name="street">
        </div>  
        
        <div class="form-group col-md-6">
            <input type="text" class="form-control" value="<?php echo $city;?>" name="city">
        </div>
     
        <div class="form-group col-md-6">
            <input type="text" class="form-control" value="<?php echo $state;?>" name="state">
        </div>
 
      </div>
    </div>


    <div class="form-group">
        <label>Depertment</label>
        <input type="text" class="form-control" value="<?php echo $department?>" name="department">
    </div>
    
    <input type="hidden" name="token" value="<?php echo Token::generate();?>">

<div class="row">
    <div class="col-md-6">    
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="submit">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <a href ="viewtoupdate.php" class="btn btn-info">Go Back</a>
        </div>
    </div>
</form>

</div>

<div class="col-md-3"></div>


</div>

<hr /> <!--===UPDATE FORM ENDS HERE=====-->

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
