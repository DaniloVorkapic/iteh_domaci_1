<?php
        include '../dbbroker.php';
        
        include '../pocetna.php';

        if(isset($_POST['deletesend'])){
               $result= Telefon::deletePhone($_POST['deletesend'],$conn);
                
         }


?>