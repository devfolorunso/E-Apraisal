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
                     <h2><?php echo $firstname . ' ' . $lastname; ?></h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        
                                <?php include 'details/getcert.php';?>

                                <?php
         
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
        <div class="jumbotron bio-jumb">
            <?php
                     if (isset($_FILES['image'])) {
                            $allowedFile =  array("jpg","JPG", "PNG","JPEG", "png", "jpeg");
                            $upload = new Upload($_FILES['image'], "staffpic/", 10000000000 ,$allowedFile);
                            $image = $upload->GetFile();
                        }

                            if (Input::exists()) {
                                if (Token::check(Input::get('token'))) {
                                        try{

                                            $user->update(array(
                                                'image' => $image,
                                                'bio'=> input::get('bio')
                                            ));?>
                                            <script>
                                              Swal(
                                                  'Picture Uploaded!',
                                                  '',
                                                  'success'
                                                );

                                              setTimeout(function(){

                                              window.location.href= "complete-bio.php?username=<?php echo $username?>";
                                              }, 700);
                                              </script>

                                            <?php }
                                            catch(Exception $e){
                                            die($e->geMessage());
                                        }
                                }
                            }
                    ?>
            <div class="container-fluid">
          <form class="form" method="POST" action="" enctype="multipart/form-data">
        
        <div class="form-group">
          <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
          <textarea name="bio" class="form-control"><?php echo $bio;?></textarea>
        </div>

        <input type="hidden" name="token" value="<?php echo Token::generate();?>">

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Upload">
        </div>
      </form>
            </div>
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
