<?php

require 'dbbroker.php';
require 'model/User.php';

 
	if(isset($_POST["register"])){ 
		$email = $_POST["email"];
		$password = $_POST["password"];
		$firstname= $_POST["firstname"];
		$lastname= $_POST["lastname"];
		
		$user = new User(null,$firstname,$lastname,$email,$password);
		$result=User::register($user,$conn);
		if ($result){
			echo '<script>alert("Uspesno")</script>';
			 
			 header('Location: index.php');
			 
		}else{
			echo '<script>alert("Neuspesna registracija")</script>';
		}
	}


?>
