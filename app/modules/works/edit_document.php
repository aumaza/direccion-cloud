<?php	session_start();
		include "../../connection/connection.php";
		include "lib_works.php";


		if($conn){
            
            $oneWork = new Works();

            $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
            $document_id = mysqli_real_escape_string($conn,$_POST['document_id']);
            $document_text = mysqli_real_escape_string($conn,$_POST['editor1']);
                        
            if(($user_id == '') || ($document_id == '') || ($document_text == '')){
                echo 5; // hay campos sin completar
            }else{
                echo 9; // tengo datos
                //$oneWork->updateWork($oneWork,$user_id,$document_id,$document_text,$conn,$dbase);
            }
        
        }else{
            echo 13; // no hay conexion 
        }




?>