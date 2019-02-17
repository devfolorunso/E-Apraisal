<?php 


    $sql = DB::getInstance()->get('staff', array('username', '=', $username));

    if (!$sql->count()) {

    echo "ERROR!";               

    }else{?>

    <?php

    $lastname = $sql->first()->lastname;
    $firstname = $sql->first()->firstname;
    $username = $sql->first()->username;
    $lastname = $sql->first()->lastname;
    $email = $sql->first()->email;
    $dob = $sql->first()->dob;
    $sog = $sql->first()->sog;
    $street = $sql->first()->street;
    $city = $sql->first()->city;
    $department = $sql->first()->department;
    $state =   $sql->first()->state;
    $title = $sql->first()->title; 
    $level = $sql->first()->level; 
    $staff_id =  $sql->first()->staff_id;
    $userimg =  $sql->first()->image;
    $bio =   $sql->first()->bio;
    $phone =   $sql->first()->phone;
  }
    ?>
              