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
                     <h2>Register STAFFS</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
      <?php 

      if(Input::exists()){
          if (Token::check(Input::get('token'))) {

            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'username' => array(
                  'required' => true,
                  'min'=>2,
                  'max'=>50,
                  'unique' => 'staff' 
                ),


                'password' =>array(
                  'required' => true,
                  'min' =>6 
                ),




          'firstname' =>array(
            'required' => true,
            'min'=>2,
            'max'=>50
          ),


          'lastname' =>array(
            'required' => true,
            'min'=>2,
            'max'=>50,
          )

      ));
            if ($validation->passed()) {
          $user = new User();
          $salt = Hash::salt(32);

          try{

            $user->Create(array(
              'username' => Input::get('username'),
              
              'password' => Hash::make(Input::get('password'), $salt),
              
              'salt' => $salt,
              
              'title' => Input::get('title'),
              
              'firstname' => Input::get('firstname'),
              
              'lastname' => Input::get('lastname'),

              'email' => Input::get('email'),
              
              'phone' => Input::get('phone'),
              
              'dob' => Input::get('dob'),
              
              'sog' => Input::get('sog'),
              
              'street' => Input::get('street'),
              
              'city' => Input::get('city'),

              'state' => Input::get('state'),

              'department' => Input::get('dept'),
              
              'joined' => date('Y-m-d H:i:s'),
              
              'group' => 1

            ));?>
            <script>
              Swal(
                  'Staff Successfully Registered!!',
                  '',
                  'success'
                )
              </script>
          
          <?php }catch(Exception $e){
            die($e->getMessage());
          }
          // Session::flash('Success', 'You registered sucessfully!');
          // header('Location:index.php'); 

        }else{
          
          foreach ($validation->errors() as $error) {?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  <?php echo $error;?>
   </div><?php
          }
        }
    }
}
?>

        <form method="POST" action="" role="form">
                        
                      <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Title</label>
                            <div class="col-lg-9">
                                <!-- <input class="form-control" type="text" value="Jane"> -->

                       <select class="form-control" name="title" id="title">
              <option value="Master">Master</option>
              <option value="Miss">Miss</option>
              <option value="Mrs">Mrs</option>
              <option value="Mr">Mr</option>
            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                <input type="text" name="firstname" class="form-control" id="firstname">

                                <!-- <input class="form-control" type="text" value="Jane"> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
          <input type="text" name="lastname" class="form-control" id="lastname">

                                <!-- <input class="form-control" type="text" value="Bishop"> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
          <input type="email" name="email" class="form-control" id="email">
                                <!-- <input class="form-control" type="email" value="email@gmail.com"> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Phone Number</label>
                            <div class="col-lg-9">
                                <!-- <input class="form-control" type="text" value=""> -->

                                          <input type="tel" name="phone" class="form-control"  id="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">DOB</label>
                            <div class="col-lg-9">
          <input type="Date" name="dob" class="form-control" id="dob">

                                <!-- <input class="form-control" type="url" value=""> -->
                            </div>
                        </div>

                                                <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">State Of Origin</label>
                            <div class="col-lg-9">
              <input type="text" name="sog" class="form-control" id="sog">
                              
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="street" type="text" placeholder="Street">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" name="city"  placeholder="City">
                    



                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" name="state" placeholder="State">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Department</label>
                            <div class="col-lg-9">
                                <!-- <input class="form-control" type="text" value="janeuser"> -->
              <input type="text" class="form-control" name="dept" id="dept">

                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Enter E-mail Again</label>
                            <div class="col-lg-9">
          <input type="text" name="username" class="form-control"  id="username">

                            </div>
                        </div>

                          <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
              <input type="password" name="password" class="form-control" id="password">

                            </div>
                        </div>
                        
                          <input type="hidden" name="token" value="<?php echo Token::generate();?>">

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                    </form>
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
