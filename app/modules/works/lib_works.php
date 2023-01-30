<?php

class Works {

// properties
	private $user_id = '';
	private $document_name = '';
	private $date_create = '';
	private $document = '';
	private $modified_user_id = '';
	private $date_modified = '';
	private $share = '';
	private $share_user_id = '';
	private $document_id = '';
	private $type_share = '';

// CONSTRUCTOR
	function __construct(){
		$this->user_id = '';
		$this->document_name = '';
		$this->date_create = '';
		$this->document = '';
		$this->modified_user_id = '';
		$this->date_modified = '';
		$this->share = '';
		$this->share_user_id = '';
		$this->document_id = '';
		$this->type_share = '';
	}

// SETTERS
	private function setUserId($_var){
		$this->user_id = $_var;
	}

	private function setDocumentName($_var){
		$this->document_name = $_var;
	}

	private function setDateCreate($_var){
		$this->date_create = $_var;
	}

	private function setDocument($_var){
		$this->document = $_var;
	}

	private function setModifiedUserId($_var){
		$this->modified_user_id = $_var;
	}

	private function setDateModified($_var){
		$this->date_modified = $_var;
	}

	private function setShare($_var){
		$this->share = $_var;
	}

	private function setShareUserId($_var){
		$this->share_user_id = $_var;
	}

	private function setDocumentId($_var){
		$this->document_id = $_var;
	}

	private function setTypeShare($_var){
		$this->type_share = $_var;
	}



// GETTERS
	private function getUserId($_var){
		return $this->user_id = $_var;
	}

	private function getDocumentName($_var){
		return $this->document_name = $_var;
	}

	private function getDateCreate($_var){
		return $this->date_create = $_var;
	}

	private function getDocument($_var){
		return $this->document = $_var;
	}

	private function getModifiedUserId($_var){
		return $this->modified_user_id = $_var;
	}

	private function getDateModified($_var){
		return $this->date_modified = $_var;
	}

	private function getShare($_var){
		return $this->share = $_var;
	}

	private function getShareUserId($_var){
		return $this->share_user_id = $_var;
	}

	private function getDocumentId($_var){
		return $this->document_id = $_var;
	}

	private function getTypeShare($_var){
		return $this->type_share = $_var;
	}

// ====================================================================================================================================================================== //
																	// METODOS // 
// ====================================================================================================================================================================== //



	/*
	** LISTAR TODOS LOS DOCUMENTOS CREADOS
	**	recibe como parametros el objeto '$oneWork', '$conn' y '$dbase'
	*/

	public function listDocuments($oneWork,$conn,$dbase){

		$share = 'Compartido';
		$unshare = 'No Compartido';

		if($conn){

            $sql = "SELECT * FROM af_works";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
            echo '<div class="container-fluid">
                            <div class="jumbotron" >
                                <div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-edit"></span> Listado de Documentos</h2></div><hr>
                            <form action="#" method="POST">
	                            <button type="submit" class="btn btn-default" name="new_work">
	                            	<span class="glyphicon glyphicon-file" aria-hidden="true"></span> Producir Documento
	                            </button>
                            </form><hr>';
                
            
                    echo "<table class='table table-condensed table-hover' style='width:100%' id='worksTable'>";
                    echo "<thead>
                    <th class='text-nowrap text-center'>Usuario Creador</th>
                    <th class='text-nowrap text-center'>Nombre del Documento</th>
                    <th class='text-nowrap text-center'>Fecha Creación</th>
                    <th class='text-nowrap text-center'>Modificado por</th>
                    <th class='text-nowrap text-center'>Fecha Modificación</th>
                    <th class='text-nowrap text-center'>Compartido</th>
                    <th class='text-nowrap text-center'>Acciones</th>
                    </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    $sql_1 = "select name from af_usuarios where id = $oneWork->getUserId($fila[user_id])";
                    $query_1 = mysqli_query($conn,$sql_1);
                    while($row_1 = mysqli_fetch_array($query_1)){
                    	echo "<td align=center>".$row_1['name']."</td>";	
                    }
                    echo "<td align=center>".$oneWork->getDocumentName($fila['document_name'])."</td>";
                    echo "<td align=center>".$oneWork->getDateCreate($fila['date_create'])."</td>";
                    echo "<td align=center>".$oneWork->getModifiedUserId($fila['modified_user_id'])."</td>";
                    echo "<td align=center>".$oneWork->getDateModified($fila['date_modified'])."</td>";
                    if($oneWork->getShare($fila['share']) == 1){
                        echo "<td align=center><span class='label label-success'>".$share."</span></td>";
                    }else if($oneWork->getShare($fila['share']) == 0){
                        echo "<td align=center><span class='label label-danger'>".$unshare."</span></td>";
                    }
                    
                    echo "<td class='text-nowrap' align=center>";
                    
                    if($oneWork->getShare($fila['share']) == 0){
                        
                        echo '<form action="#" method="POST">
                    			<input type="hidden" id="id" name="id" value="'.$fila['id'].'">
                    			<button type="submit" class="btn btn-warning" name="share_work"><span class="glyphicon glyphicon-random"></span> Compartir</button>
                    			<button type="submit" class="btn btn-primary" name="edit_work"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
                    		  </form>';
                    
                    }else if($oneWork->getShare($fila['share']) == 1){
                    	echo '<form action="#" method="POST">
                    			<input type="hidden" id="id" name="id" value="'.$fila['id'].'">
                    			<button type="submit" class="btn btn-warning" name="share_work"><span class="glyphicon glyphicon-random"></span> Compartir</button>
                    			<button type="submit" class="btn btn-primary" name="edit_work"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
                    		  </form>';
                    }

                    
                    echo "</td>";
                    $count++;
            }


                echo "</table>";
                echo "<hr>";
                echo '<footer class="container-fluid text-left"><span class="glyphicon glyphicon-option-vertical"></span> Cantidad de Documentos:  '.$count.' </footer><hr>';
                echo '</div></div>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);

	}

// ====================================================================================================================================================================== //
														// FORMULARIOS //
// ====================================================================================================================================================================== //

	public function formNewWork($user_id){

		echo '<div class="container">
				  <div class="jumbotron">
				    
				    <div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-edit"></span> Producción de un Nuevo Documento</h2></div><hr>
				  		
				  		<form id="fr_save_work_ajax" >
				  			<input type="hidden" id="user_id" name="user_id" value="'.$user_id.'">

						    <div class="form-group">
						        <textarea class="form-control document-editor" name="editor1" id="editor1" rows="10" cols="80"></textarea>
						    </div><br>

						    <div class="form-group">
						      <label for="document_name">Nombre del Documento:</label>
						      <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Ingrese el nombre del Documento a generar">
						    </div>
						      
						    <button type="submit" class="btn btn-default" id="save_work"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
						  </form><hr>

						  <div id="messageDocument"></div>

				  </div>
			  </div>';

	}


// ====================================================================================================================================================================== //


public function formEditWork($document_id,$user_id,$conn,$dbase){

		mysqli_select_db($conn,$dbase);
		$sql = "select * from af_works W, af_shares S where W.id = '$document_id' and S.document_id = '$document_id' and W.user_id = '$user_id'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);

		echo '<div class="container">
				  <div class="jumbotron">
				    
				    <div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-pencil"></span> Editar Documento</h2></div><hr>
				  		
				  		<form id="fr_save_edit_work_ajax" >
				  			<input type="hidden" id="user_id" name="user_id" value="'.$user_id.'">
				  			<input type="hidden" id="document_id" name="document_id" value="'.$document_id.'">';

				  		if($row['owner'] != 1){
				  			if($row['type_share'] == 'r'){

							    echo '<div class="form-group">
									        <textarea class="form-control document-editor" name="editor1" id="editor1" rows="10" cols="80" readonly>'.$row['document'].'</textarea>
									  </div><br>';

							}
							if($row['type_share'] == 'rw'){

								echo '<div class="form-group">
									        <textarea class="form-control document-editor" name="editor1" id="editor1" rows="10" cols="80">'.$row['document'].'</textarea>
									  </div><br>';
							}
						}

						if($row['owner'] == 1){
				  			echo '<div class="form-group">
							        <textarea class="form-control document-editor" name="editor1" id="editor1" rows="10" cols="80">'.$row['document'].'</textarea>
								  </div><br>';
						}




						echo '<div class="form-group">
							      <label for="document_name">Nombre del Documento:</label>
							      <input type="text" class="form-control" id="document_name" name="document_name" value="'.$row['document_name'].'" readonly>
							  </div>

						    
						    <button type="submit" class="btn btn-default" id="save_edit_work"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
							
						  </form><hr>

						  <div id="messageDocumentUpdate"></div>
						    

				  </div>
			  </div>';

	}

// ====================================================================================================================================================================== //


	public function formShareWork($id,$conn,$dbase){

		mysqli_select_db($conn,$dbase);
		$sql = "select * from af_shares where document_id = '$id'";
		$query = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($query);

		$sql_3 = "select U.name, U.id, W.share from af_usuarios U, af_works W  where U.id = W.user_id and W.id = '$id'";
		$query_3 = mysqli_query($conn,$sql_3);
		while($row_3 = mysqli_fetch_array($query_3)){
			$nombre = $row_3['name'];
			$share = $row_3['share'];
			$user_id = $row_3['id'];
		}


		echo '<div class="container">
				  <div class="jumbotron">
				    
				    <div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-random"></span> Compartir Documento</h2></div><hr>';

				    if($rows == 0){
				    	echo '<div class="alert alert-warning">
								  <span class="glyphicon glyphicon-info-sign"></span>
								  El propiertario de este documento es el usuario <strong> '.$nombre.' </strong> y aún no está compartido con otros usuarios
							  </div>';

				    }else if($rows > 0){
				    	echo '<div class="alert alert-success">
								  <span class="glyphicon glyphicon-info-sign"></span> Este documento está compartido con los siguientes usuarios 
							  </div><hr>';

							  		$sql_4 = "select * from af_shares where document_id = '$id'";
							  		$query_4 = mysqli_query($conn,$sql_4);

								  echo "<table class='display compact' style='width:100%' id='userShareTable'>";
							      echo "<thead>
									    <th class='text-nowrap text-center'>Usuario</th>
									    <th class='text-nowrap text-center'>Permisos</th>
							            </thead>";


								while($fila = mysqli_fetch_array($query_4)){
										  // Listado normal
										 echo "<tr>";
										 $sql_2 = "select af_usuarios.name from af_usuarios inner join af_shares on af_usuarios.id = af_shares.user_id where af_shares.document_id = '$id'";
										 $query_2 = mysqli_query($conn,$sql_2);
										 while($row_2 = mysqli_fetch_array($query_2)){
											 echo "<td align=center>".$row_2['name']."</td>";
										}
											 echo "<td align=center>".$fila['type_share']."</td>";
											 echo "<td class='text-nowrap'>";
											 echo '</td>';
											 $count++;
										}

									echo "</table>";
									echo "<hr>";
									
					}
					

				    
				     echo '<form id="fr_share_work_ajax" method="POST">
				     		<input type="hidden" id="document_id" name="document_id" value="'.$id.'">
				     		 	 
							 	 <div class="form-group">
								  <label for="share">Estado:</label>
								  <select class="form-control" id="share" name="share">
								    <option value="" disabled selected>Seleccionar</option>
								    <option value="0" '.(($share == 0) ? "Selected" : "" ).'>No Compartido</option>
								    <option value="1" '.(($share == 1) ? "Selected" : "" ).'>Compartido</option>
								  </select>
								</div>

								<div class="form-group">
								  <label for="type_share">Permisos:</label>
								  <select class="form-control" id="type_share" name="type_share">
								    <option value="" disabled selected>Seleccionar</option>
								    <option value="r">Lectura</option>
								    <option value="rw">Lectura / Escritura</option>
								  </select>
								</div>

							 
				                <div class="form-group">
				                <label for="users">Usuarios</label>
				                <select class="form-control" id="share_user_id" name="share_user_id">
				                <option value="" disabled selected>Seleccionar</option>';
				                    
				                    $sql_1 = "SELECT name, id FROM af_usuarios order by name ASC";
				                    mysqli_select_db($conn,$dbase);
				                    $query_1 = mysqli_query($conn,$sql_1);

				                    if($query_1){
				                        while ($valores = mysqli_fetch_array($query_1)){
				                        	if((strcmp($valores['name'], 'Administrador') > 0) && (strcmp($valores['name'],$nombre) > 0)){
				                        		echo '<option value="'.$valores[id].'">'.$valores[name].'</option>';
				                        	}
				                        }
				                     }

				                    

				                    mysqli_close($conn);
				                
				                echo '</select></div>
				                
							  
							  <button type="submit" class="btn btn-default" id="share_work"><span class="glyphicon glyphicon-ok"></span> Aceptar</button>
							
							</form><hr>
				  
				  <div id="messageDocumentShare"></div>

				  </div>
			  </div>';
	}


// ====================================================================================================================================================================== //
														// PERSISTENCIA //
// ====================================================================================================================================================================== //



	public function addWork($oneWork,$user_id,$document_name,$document_text,$conn,$dbase){

		$actual_date = date('Y-m-d');
		$share = 0;
		mysqli_select_db($conn,$dbase);
		$sql = "select * from af_works where document_name = '$document_name'";
		$query = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($query);

		if($rows == 0){

			$sql_2 = "INSERT INTO af_works ".
                     "(user_id,
                       document_name,
                       date_create,
                       document,
                       share)".
                     "VALUES ".
                     "($oneWork->setUserId('$user_id'),
                       $oneWork->setDocumentName('$document_name'),
                       $oneWork->setDateCreate('$actual_date'),
                       $oneWork->setDocument('$document_text'),
                       $oneWork->setShare('$share'))";
                    
                    $query_2 = mysqli_query($conn,$sql_2);
            
            
            
                    if($query_2){
                    	echo 1; // se realizó la inserción en la base 
                    	$success = $sql_2;
                    	$oneWork->mysqlSuccessLogs($success);
                    }else{
                    	echo -1; // no se realizó la inserción del dato en la base
                    	$error = mysqli_error($conn);
                    	$oneWork->mysqlErrorLogs($error);
                    }
		}else if($rows == 1){
			echo 7; // documento existente
		}

	} //END OF FUNCTION


// ====================================================================================================================================================================== //


	public function updateWork($oneWork,$user_id,$document_id,$document_text,$conn,$dbase){

		$actual_date = date('Y-m-d');

		mysqli_select_db($conn,$dbase);
		$sql = "update af_works set 
				document = $oneWork->setDocument('$document_text'), 
				modified_user_id = $oneWork->setModifiedUserId('$user_id'), 
				date_modified = $oneWork->setDateModified('$actual_date')
				where id = $oneWork->getDocumentId('$document_id')";
		$query = mysqli_query($conn,$sql);

		if($query){
			echo 1; // actualizacion exitosa
			$success = $sql;
            $oneWork->mysqlSuccessLogs($success);
		}else{
			echo -1; // hubo un problema al intentar actualizar el registro
			$error = mysqli_error($conn);
            $oneWork->mysqlErrorLogs($error);
		}

	} // END OF FUNCTION

// ====================================================================================================================================================================== //


	public function shareWork($oneWork,$share_user_id,$share,$document_id,$type_share,$conn,$dbase){

		mysqli_select_db($conn,$dbase);
		$sql = "select * from af_shares where user_id = '$share_user_id' and document_id = '$document_id'";
		$query = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($query);

		if($rows == 0){

			// actualizamos el estado de comparticion del documento
			$sql_1 = "update af_works set share = $oneWork->setShare('$share') where id = $oneWork->getDocumentId('$document_id')";
			$query_1 = mysqli_query($conn,$sql_1);


            if($query_1){

            	// se agregan usuarios con los que se comparte el documento
				$sql_2 = "INSERT INTO af_shares ".
            			 "(user_id,
              				document_id,
              		   		type_share)".
            			"VALUES ".
            			"($oneWork->setUserId('$share_user_id'),
              				$oneWork->setDocumentId('$document_id'),
              				$oneWork->setTypeShare('$type_share'))";

            	$query_2 = mysqli_query($conn,$sql_2);

            	if($query_2){
            		echo 1; // se ha actualizado en insertado correctamente el permiso
            		$success = $sql_1;
                    $oneWork->mysqlSuccessLogs($success);
                    $success = $sql_2;
                    $oneWork->mysqlSuccessLogs($success);
            	}else{
            		echo -1; // no se ha podido insertar el registro de comparticion de documento
            		$error = mysqli_error($conn);
                    $oneWork->mysqlErrorLogs($error);
            	}
           	
           	}else{
           		echo -1; // no se pudo actualizar el permiso
           		$error = mysqli_error($conn);
                $oneWork->mysqlErrorLogs($error);
           	}



		}

		if($rows != 0){
			echo 7; // este usuario ya está asignado a este documento
		}

	} // END OF FUNCTION

	
// ====================================================================================================================================================================== //
														// LOGS //
// ====================================================================================================================================================================== //


	public function mysqlErrorLogs($error){
    
      $fileName = "../../documentos/mysql_error.log.txt"; 
      $date = date("d-m-Y H:i:s");
      $message = 'Error: '.$error.' - '.$date.'';
       
        if (file_exists($fileName)){
        
        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$date);
        fclose($file);
        chmod($file, 0777);
        
        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            chmod($file, 0777);
            }

}


/*
** GUARDAR LOS SUCCESS DE MYSQL
*/
	public function mysqlSuccessLogs($success){
    
      $fileName = "../../documentos/mysql_success.log.txt"; 
      $date = date("d-m-Y H:i:s");
      $message = 'Success: '.$success.' - '.$date.'';
       
        if (file_exists($fileName)){
        
        $file = fopen($fileName, 'a');
        fwrite($file, "\n".$message);
        fclose($file);
        chmod($file, 0777);
        
        }else{
            $file = fopen($fileName, 'w');
            fwrite($file, $message);
            fclose($file);
            chmod($file, 0777);
            }

}




} // END OF CLASS





?>