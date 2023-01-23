<?php

/*
** Funcion de validación de ingreso
*/
function logIn($user,$pass,$conn,$db_basename){

    mysqli_select_db($conn,$db_basename);
    
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass;
	
	$sql_1 = "select password from af_usuarios where user = '$user'";
	$query_1 = mysqli_query($conn,$sql_1);
	while($row = mysqli_fetch_array($query_1)){
        $hash = $row['password'];
	}
	
    
    
	$sql = "SELECT * FROM af_usuarios where user = '$user' and state = 1";
	$q = mysqli_query($conn,$sql);
	
	$query = "SELECT * FROM af_usuarios where user = '$user' and state = 0";
	$retval = mysqli_query($conn,$query);
	
	
	
	if(!$q && !$retval){	
			echo 7; // CONNECTION FAILURE
			
			}
		
			if(($user = mysqli_fetch_assoc($retval)) && (password_verify($pass,$hash))){
				

				echo -1; // USER BLOCK
			}

			else if(($user = mysqli_fetch_assoc($q)) && (password_verify($pass,$hash))){

				if(strcmp($_SESSION["user"], 'root_mecon') == 0){

					echo 1; // LOGIN SUCCESSFULLY
				
				
			}else{
				echo 1; // LOGIN SUCESSFULLY
				
			}
			}else{
				echo 2; // USER OR PASSWORD INCORRECT
				}
}

?>