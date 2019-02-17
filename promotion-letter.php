<?php require_once 'core/init.php';?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="src/media/favico.ico" type="image/x-icon">

   <!--=====================BOOTSTRAP STYLES============-->
    <link href="admin/css/bootstrap.css" rel="stylesheet" />
    <link href="src/bootstrap/css/bootstrap-dropdownhover.min.css" rel="stylesheet">
	<link href="src/animate/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="src/bootstrap/css/bootstrap.min.css">
   <!--=====================BOOTSTRAP STYLES============-->

    
   <!--========================FONTAWESOME STYLES============-->
    <link href="admin/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="src/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <!--========================FONTAWESOME STYLES============-->
    

   <!--========================CUSTOM CSS============-->
    <link href="admin/css/admin.css" rel="stylesheet" />
    <link href="src/css/letter.css" rel="stylesheet" />
   <!--========================CUSTOM CSS============-->

   <!--========================GOOGLE FONTS============-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- <link href='https://fonts.googleapis.com/css?family=Nova Round' rel='stylesheet'> -->

    <!-- <link href='https://fonts.googleapis.com/css?family=meriweather' rel='stylesheet'> -->

    <link href='https://fonts.googleapis.com/css?family=Mr Dafoe' rel='stylesheet'>

    <!-- <link href='https://fonts.googleapis.com/css?family=Metal Mania' rel='stylesheet'> -->

    <link href='https://fonts.googleapis.com/css?family=Merienda One' rel='stylesheet'>
   <!--========================GOOGLE FONTS============-->
   


   <!--========================GOOGLE FONTS============-->
	<link rel="stylesheet" href="src/swal/sweetalert2.css">
	<link rel="stylesheet" href="src/swal/sweetalert2.min.css">
   <!--========================GOOGLE FONTS============-->


   <!--=================SWEETALERT CDN============-->
	<script src="src/swal/sweetalert2.all.min.js"></script>
	<script src="src/swal/sweetalert2.min.js"></script>
    <script src="src/swal/sweetalert2.all.min.js"></script>
    <script src="src/swal/sweetalert2.js"></script>
   <!--=================SWEETALERT CDN============-->


</head>
<body>
   
   <?php
        if (Session::exists('home')) {
                echo '<p>'. Session::flash('home') .'</p>';
                        
              }     
                     $user = new User();

         if ($user->isLoggedIn()) {
            include 'details/personal-data.php';
        
         if ($user->hasPermission('admin')) {

            redirect::to('admin.php');
         }
   

        }else{
        
        redirect::to('login.php');
        
        }
        
        
        
        include 'details/getlevel.php';
    ?>

<div class="container-fluid-">
    <div class="row">

    <div class="col-md-3"></div>

    <div class="col-md-6">

        <p class="letter-head">
            CREATIVE DEVS INC.
        </p>    

        <p class="letter-address">
            <strong>
                <?php
                    
                    echo $firstname .' '. $lastname ;
                
                ?>
             </strong><br/ >

                 <?php echo $street?>, <br/ >
                 <?php echo $city?>
                 <?php echo $state?>.<br/ >
                 <?php echo $phone?>.
        </p>

        <p class="letter-body">
                <?php
                    echo $letter;
                ?>
                    
        </p>
    </div>

    <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>