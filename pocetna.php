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
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        .input-container {
        display: -ms-flexbox; 
        display: flex;
        width: 100%;
        margin-bottom: 15px;
        }

        .icon {
        padding: 10px;
        background: dodgerblue;
        color: white;
        min-width: 50px;
        text-align: center;
        }

        .input-field {
        
        padding: 10px;
        outline: none;
            width: 100%;
        }

        .input-field:focus {
        border: 2px solid dodgerblue;
        }

        /* Set a style for the submit button */
        .btn {
        background-color: dodgerblue;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        
        opacity: 0.9;
        }

        .btn:hover {
        opacity: 1;
        }
    </style>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body  style="   background-image: url('images/bg-03.jfif');    background-repeat: no-repeat;   background-attachment: fixed;  background-size: cover;">
    <div class="mainPart" style="background-color: 	rgb(208,208,208,0.9) ;   border-radius: 5px; padding:30px; margin:10%" >

        <h2><i class="fa fa-mobile" aria-hidden="true"></i> Mobile phones</h2> 
        <input type="text" id="myInput" onkeyup="search()" placeholder="Search for models.." title="Type in a model" style="float:right;font-size:25px;border:none;
            border-radius: 5px;">   <i class="fa fa-search" aria-hidden="true" style="float:right; font-size:30px;padding:4px"></i>



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
    <script>

        function search(){
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }
    </script>
</body>
</html>