<?php
  require_once 'core/init.php';
  $username = input::get('username');
  include 'details/staff-details.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
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
    <link href="src/css/stafs.css" rel="stylesheet" />

     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <!--=================================================-->
    <link rel="stylesheet" type="text/css" href="src/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="src/swal/sweetalert2.css">
    <link rel="stylesheet" href="src/swal/sweetalert2.min.css">
  <!--=================================================-->
    
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
                        <!-- <img src="Admin/img/logo.png" /> -->
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
                        <a href="viewtopromote.php"><i class="fa fa-bar-chart-o"></i>Promote Staff</a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>PROMOTE STAFFS</h2>   
                    </div>
                </div>           
              

                 <!-- /. ROW  -->
                  <hr />
            <div class="row">
                <div class="col-md-4">
                    <div class="jumbotron cert-jumb">
                      <a href='' class="badge badge-dark badge-pill"> LEVEL</a> : <?php
                    include_once 'details/getlevel.php';
                       echo $level;?>
                    </div>
                </div> <!-- First COlumn -->

                <div class="col-md-4">
                    <div class="jumbotron cert-jumb">
                    <?php include_once 'details/getcert.php';?>
                      <strong><?php echo $firstname;?></strong>  is currently a/an <strong><?php echo $certname;?></strong> Holder
                    <a href='<?php echo $cv;?>'  class="badge badge-dark badge-pill"> CHECK CV</a>
                    </div>
                </div> <!-- Second COlumn -->

                <div class="col-md-4">
                  <div class="jumbotron cert-jumb">
                      <a href='<?php echo $cert;?>'  class="badge badge-dark badge-pill">VIEW CERTIFICATE</a>
                  </div>
                </div> <!-- THIRD COLUMN -->

            </div>  <!-- ROW -->               
            <hr/ >

         
                                            
      <div class="container-fluid">
          <?php
             if (Input::exists()) {
                 if (Token::check(Input::get('token'))) {
                $userInsert = DB::getInstance()->insert('ranks', array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'letter' => input::get('letter'),
                'username' => $username,
                'staff_id' => $staff_id,
                'level' => input::get('level'),
                'promoted' => date('d F Y, h:i:s A')
            ));
            if($userInsert){
            ?>
            <script>
            Swal(
            'PROMOTED!',
            '',
            'success'
            );

            setTimeout(function(){

            window.location.href= "promotion.php?username=<?php echo $username?>";
            }, 700);
            </script>

            <?php
             } 
            }
             } 
        ?>
  
                <label>TO BE PROMOTED TO?</label>
                    <?php 
                          if ($certname == 'SSCE') {
                          $goto =  "II";
                            }elseif ($certname == 'OND') {
                              $goto = "IV";
                            }elseif ($certname == 'HND') {
                              # code...
                              $goto = "VI";

                            }elseif ($certname == 'B.SC') {
                              # code...
                              $goto = "VIII";

                            }elseif ($certname == 'M.SC') {
                              # code...
                              $goto = "X";

                            }

                       ?>
          
        <?php 
            if ($level == $goto) {
            echo $title .' '. $firstname . " HAS NOT UPLOADED A NEW CERTIFICATE IN RECENT TIME";
          }else{
              echo '
          <form class="form" method="POST" action="">
            <div class="form-group">
            <input class="form-control" type="text" name="level" value="'. $goto . '">
              </div>
            
            <input type="hidden" name="letter" value="We are very pleased to inform you that you are being promoted from the previous level to <b>
            
          '. $goto .'
            
           </b> with the effect from <b>
            
              
          '.   date('d F Y, h:i:s A') . '.
            
            </b><br /> Thank you for your sustained performance and commitment to the organisation over the years, and we believe you truly deserve this promotion. <br />The hardwork and skills you have shown over the years are remarkable. <br /> We are confident that you will take up this new responsibility with great enthusiasm and will keep contributing effectively and efficiently towards the objective of the organisation. 

            <br /> <br /> Best Wishes! 

            <br /><br />Signed <b>Management</b>">

              <input type="hidden" name="token" value="' . Token::generate() .'">
            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Promote">';
          }
        ?>

            </div>
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
    <script src="Admin/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="Admin/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="Admin/js/custom.js"></script>
    
   
</body>
</html>
