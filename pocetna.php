<?php 
    include 'dbbroker.php';
    include 'model/Telefon.php';
  
  
    $result = Telefon::getAllPhones($conn);  
 

     



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="mainPart" style="background-color: 	rgb(208,208,208,0.9) ;   border-radius: 5px; padding:30px; margin:10%" >

<h2><i class="fa fa-mobile" aria-hidden="true"></i> Mobile phones</h2> 
 


<table class="table table-hover"  style=" color:black; "  id="myTable">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Model</th>
        <th scope="col">Description</th>
        <th scope="col"><i class="fas fa-euro-sign"></i>  Price</th>
        <th scope="col"><i class="fas fa-user"></i>  User</th>
        
        

        </tr>
    </thead>
    <tbody>
        <?php    while($row = $result->fetch_array()):  ?>
            
   
                <tr>
                <th scope="row">  <?php echo $row["phoneID"]   ?>    </th>
                <td> <?php echo $row["model"]   ?> </td>
                <td>  <?php echo $row["description"]   ?> </td>
                <td> <?php echo $row["price"]   ?> </td>
                <td> <?php echo $row["firstname"]." ".$row["lastname"]    ?> </td>
                
                   
                 </tr>
               
         
        <?php    endwhile  ?>


    </tbody>
</table>
 
</div>
</body>
</html>