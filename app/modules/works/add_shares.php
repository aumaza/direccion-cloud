<?php	session_start();
		
		include "../../connection/connection.php";
		include "lib_works.php";

		

		if($conn){
			
			$oneWork = new Works();

			$document_id = mysqli_real_escape_string($conn,$_POST['document_id']);
			$share = mysqli_real_escape_string($conn,$_POST['share']);
			$type_share = mysqli_real_escape_string($conn,$_POST['type_share']);
			$share_user_id = mysqli_real_escape_string($conn,$_POST['share_user_id']);

			if(($document_id == '') || ($share == '') || ($type_share == '') || ($share_user_id == '')){
				echo 5; // hay campos sin completar
			}else{
				//echo 9; //hay datos
				$oneWork->shareWork($oneWork,$share_user_id,$share,$document_id,$type_share,$conn,$dbase);
			}
		

		}else{
			echo 13; // no connection
		}






?>