<?php
    include '../dbbroker.php';
    include '../model/Telefon.php';
    



    if(isset($_POST['modelupdate']) && isset($_POST['descriptionupdate']) && isset($_POST['priceupdate'])){ //alko je korisnik kliknuo dugme update iz modala za update
        $phone = new Telefon($_POST['hiddenData'],$_POST['modelupdate'], $_POST['descriptionupdate'],$_POST['priceupdate'],null);

        $status = Telefon::updatePhone($phone,$conn);
                
        if($status){
          
            echo 'Success';
         }else{
             echo $status;
             echo 'Failed';
         }
    }

?>