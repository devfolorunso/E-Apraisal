<?php 
  $getlevel = DB::getInstance()->query("SELECT level,letter,firstname,lastname ,promoted
   FROM ranks where username =? ORDER BY promoted DESC", array(

      'username' => $username
   ));
             
               if (!$getlevel->count()) {
             
                   echo "NO PROMOTION!";               
         
                         }else{
       $firstname = $getlevel->first()->firstname;
       $lastname = $getlevel->first()->lastname;
       $level = $getlevel->first()->level;
       $letter = $getlevel->first()->letter;
      $promoted = $getlevel->first()->promoted;
       
      

}
            ?>