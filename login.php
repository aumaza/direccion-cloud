<?php	session_start();

		include "app/connection/connection.php";
		include "lib_login.php";


		if($conn){

			$user = mysqli_real_escape_string($conn,$_POST['user']);
			$pass = mysqli_real_escape_string($conn,$_POST['pwd']);

				if(($user == '') ||
						($pass == '')){
					echo 5; // THE FIELDS MUST BE FILL 
				}else{
					logIn($user,$pass,$conn,$db_basename);
				}

		}else{
			echo 7; // CONNECTION FAILURE
		}



?>