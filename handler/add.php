<?php
    include '../dbbroker.php';

    include '../pocetna.php';
 
    
    if(  isset($_POST["description"]) && isset($_POST["model"]) && isset($_POST["price"])   ){
        
        
        $phone = new Telefon(null,$_POST["model"],$_POST["description"],$_POST["price"],$_SESSION['currentUser'] );
        
        $status= Telefon::addPhone($phone,$conn);
         
          if($status){
             echo 'Success';
             
          }else{
              echo $status;
              echo 'Failed';
          }
    }

  

?>