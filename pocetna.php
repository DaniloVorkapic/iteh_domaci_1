<?php 
    include 'dbbroker.php';
    include 'model/Telefon.php';
    include 'login.php';
  
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
    <script src="js/main.js"></script>
</head>

<body  style="   background-image: url('images/bg-03.jfif');    background-repeat: no-repeat;   background-attachment: fixed;  background-size: cover;">
    <div class="mainPart" style="background-color: 	rgb(208,208,208,0.9) ;   border-radius: 5px; padding:30px; margin:10%" >

        <h2><i class="fa fa-mobile" aria-hidden="true"></i> Mobile phones</h2> 
        <input type="text" id="myInput" onkeyup="search()" placeholder="Search for models.." title="Type in a model" style="float:right;font-size:25px;border:none;
            border-radius: 5px;">   <i class="fa fa-search" aria-hidden="true" style="float:right; font-size:30px;padding:4px"></i>

        <?php echo  $_SESSION["currentUser"]   ?> 

        <table class="table table-hover"  style=" color:black; "  id="myTable">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Model</th>
                <th scope="col">Description</th>
                <th scope="col"><i class="fas fa-euro-sign"></i>  Price</th>
                <th scope="col"><i class="fas fa-user"></i>  User</th>
                <th scope="col">Options</th>

                

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
                        <td>
                            <form  method="post">
                                    <button type="button" class="btn btn-danger"   onclick="deletePhone( <?php echo $row['phoneID']   ?>  )" ><i class="fas fa-trash"></i></button>  



                            </form>


                        </td>
                        
                        </tr>
                    
                
                <?php    endwhile  ?>


            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" id="sortTable"  onclick="sortTableD()"  ><i class="fa fa-sort" aria-hidden="true"></i>  Sort table by name descending</button>                    
        <button type="button" class="btn btn-secondary" id="sortTable"  onclick="sortTableA()"  ><i class="fa fa-sort" aria-hidden="true"></i>  Sort table by name ascending</button>                    
        <button type="button" class="btn btn-primary" id="btnAddNew" data-toggle="modal" data-target="#addNewModal" > <i class="fas fa-plus"></i> Add new mobile phone</button>   
        
    </div>



















    <!-- Modal za add new telefon -->
        <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="lblAddNewModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="titleAdd">Add new mobile phone</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                              
                        <form  id="addform" style="max-width:500px;margin:auto" method="POST" enctype="multipart/form-data">
 
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Model" name="model" id="model" required>
                            </div>

                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Description" name="description" id="description" required>
                            </div>
                            
                            <div class="input-container">
                            <i class="fa fa-tag icon"></i>
                                <input class="input-field" type="text" placeholder="Price" name="price" id="price" required>
                            </div>
                            
                       
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add" name="add"> <i class="fas fa-plus"></i> Add</button>
                        </div>                   
                    
                        </form>


                        </div>
                        
                       
                </div>
            </div>
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


        function sortTableD(){
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                console.log(rows);
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("td")[0];
                y = rows[i + 1].getElementsByTagName("td")[0];
            

                //check if the two rows should switch place:
                if (  x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
                }
                if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                }
                
            }



        }
        function sortTableA(){
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            /*Make a loop that will continue until
            no switching has been done:*/
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                console.log(rows);
                /*Loop through all table rows (except the
                first, which contains table headers):*/
                for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("td")[0];
                y = rows[i + 1].getElementsByTagName("td")[0];
            

                //check if the two rows should switch place:
                if (  x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
                }
                if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                }
                
            }



        }



        function deletePhone( deleteid){
            $.ajax({
                url: 'handler/delete.php',
                type: 'post',
                data: { deletesend: deleteid  },
               
                success: function(data, status){
                    location.reload(true);
                    alert("Uspesno obrisano!");
                     
                }
            });
        }





        $('#addform').submit(function () {
            
            event.preventDefault();  
            
            const $form = $(this);

            const $input = $form.find('input,select,button,textarea');

            const serijalizacija = $form.serialize();  
            console.log(serijalizacija); 

            $input.prop('disabled', true);   


            request = $.ajax({  
                url: 'handler/add.php',  
                type: 'post',
                data: serijalizacija
            });

            request.done(function (response, textStatus, jqXHR) {
                

                    alert("Telefon dodat ");
                    console.log("Uspesno dodavanje");
                    console.log(response)
                    console.log(textStatus)
                    alert("Telefon dodat ");
                    location.reload(true);
                
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
                console.error('Greska: ' + textStatus, errorThrown);
            });
            });
    </script>
   
</body>
</html>