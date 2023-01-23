<?php   include "../../connection/connection.php";
        include "../users/lib_users.php";
        
        if($conn){
            
            $oneUser = new Users();
            
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password_1 = mysqli_real_escape_string($conn,$_POST['pwd_1']);
            $password_2 = mysqli_real_escape_string($conn,$_POST['pwd_2']);
            
            if(($name == '') || ($email == '') || ($password_1 == '') || ($password_2 == '')){
                echo 5; // hay campos sin completar
            }else{
                $oneUser->addUser($oneUser,$name,$email,$password_1,$password_2,$conn,$dbase);
            }
        
        
        }else{
            echo 13; // no hay conexion
        }




?>