<?php
    require_once 'core/init.php';
    
    $id = input::get('staff_id');
    
    $delete = DB::getInstance()->query("DELETE FROM  staff WHERE staff_id = '$id' ");
    
    if(!$delete){
    
    echo $error;
    
    }else{
?>
    <script>
    setTimeout(function(){

    window.location.href= "remove-staff.php";
    }, 10);
    </script>

<?php
    } 
?>
