
  <?php 
  $sql = DB::getInstance()->query("SELECT cert_name, cv, cert
   FROM cvsandcerts where username =? ORDER BY uploaded DESC", array(
   		'username' => $username

   ));
            if (!$sql->count()) {
                           
                echo ' <div class="alert alert-warning alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                              <strong> ' . $firstname .' '.  $lastname .'</strong> You are yet to upload a certificate!</div>';               
                                            
                       }else{

                    		 $certname = $sql->first()->cert_name;

                         			$cv = $sql->first()->cv;

                     				$cert = $sql->first()->cert;            

  }?>
