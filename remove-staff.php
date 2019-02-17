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
                     <h2> DELETE STAFF</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                    <!-- Table -->
                        <h5>STAFFS</h5>

           <table class="table table-striped table-responsive table-bordered table-hover">
            <thead>
              <tr>
                <th>S/N</th>-
                <th>Icon</th>
                <th>Title</th>-
                <th>Firstname</th>
                <th>Lastname</th>
                <th>View</th>
              </tr>
          </thead>
        <?php 
      $sql = DB::getInstance()->query("SELECT * FROM staff");

      if ($sql->count($sql)) 
      {
        foreach ($sql->results() as $sql) {?>
      <tbody>
       <tr>
        <td>
            <?php echo $sql->staff_id;?>
          </td>
            

          <td>
            <div class="media">
            <div class="media-left">
              <?php 

                echo "<a href=".$sql->image."><img class='media-object' src='".$sql->image."' alt='avatar'></a>";
                ?>
           </div>
          </div>
         </td>
  
          <td>
            <?php echo $sql->title;?>
          </td>

            <td>
            <?php echo $sql->firstname;?>
            </td>

            <td>
            <?php echo $sql->lastname;?>
            </td>

            <td>
            <a href="remove.php?staff_id=<?php echo $sql->staff_id; ?>"><button type="button" class="btn btn-default "><i class="fa fa-trash-o"></i></button></a>  

            </td>


          </tr>

        </tbody>

          <?php
          }
          }else {
            # code..
            echo "error";
          }

          ?>
        </table>
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
