<?php require_once 'core/init.php'; ?>
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

        $id = input::get('staff_id');

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

                                      if(!$update){
                                        echo "succes";

                                        }else{
                                    
                                        echo "error";
                                    }?>
<div class="row">
    <div class="col-md-3"></div>

<div class="col-md-6">
        <?php 
        include 'toupdate.php';    
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
</body>
</html>
