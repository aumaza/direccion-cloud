<?php

class Directories {

// properties
private $dir_name = '';
private $dir_size = '';
private $file_name = '';
private $file_size = '';
private $user_id = '';
private $date_up = '';
private $date_del  = '';

// constructor
function __construct(){
	$this->dir_name = '';
	$this->dir_size = '';
	$this->file_name = '';
	$this->file_size ='';
	$this->user_id = '';
	$this->date_up ='';
	$this->date_del ='';
}

// SETTERS
private function setDirName($var){
	$this->dir_name = $var;
}

private function setDirSize($var){
	$this->dir_size = $var;
}

private function setFileName($var){
	$this->file_name = $var;
}

private function setFileSize($var){
	$this->file_size = $var;
}

private function setUserId($var){
	$this->user_id = $var;
}

private function setDateUp($var){
	$this->date_up = $var;
}

private function setDateDel($var){
	$this->date_del = $var;
}

// GETTERS
private function getDirName($var){
	return $this->dir_name = $var;
}

private function getDirSize($var){
	return $this->dir_size = $var;
}

private function getFileName($var){
	return $this->file_name = $var;
}

private function getFileSize($var){
	return $this->file_size = $var;
}

private function getUserId($var){
	return $this->user_id = $var;
}

private function getDateUp($var){
	return $this->date_up = $var;
}

private function getDateDel($var){
	return $this->date_del = $var;
}


// METODOS

public function listDirectories($oneDir){

		$path = '../documentos/';

		echo '<div class="container">
					  <div class="jumbotron">
					    <div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-folder-close"></span> Directorio Principal</h2></div><hr>';
					 
					$oneDir->getDir($path,$oneDir);
			
			echo '</div>
					</div>';
}

public function getDir($path,$oneDir){
					    // Se comprueba que realmente sea la ruta de un directorio
					    if (is_dir($path)){
					        // Abre un gestor de directorios para la ruta indicada
					        $gestor = opendir($path);
					        echo "<ul>";

					        // Recorre todos los elementos del directorio
					        while (($file = readdir($gestor)) !== false)  {
					                
					            $complete_path = $path . "/" . $file;

					            // Se muestran todos los archivos y carpetas excepto "." y ".."
					            if ($file != "." && $file != "..") {
					                // Si es un directorio se recorre recursivamente
					                if (is_dir($complete_path)) {
					                    echo "<li>" . $file . "</li>";
					                    $oneDir->getDir($complete_path,$oneDir);
					                } else {
					                    echo "<li>" . $file . "</li>";
					                }
					            }
					        }
					        
					        // Cierra el gestor de directorios
					        closedir($gestor);
					        echo "</ul>";
					    } else {
					        echo "No es una ruta de directorio valida<br/>";
					    }
					}





} // END OF CLASS





?>