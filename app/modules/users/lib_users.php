<?php

class Users{

    private $name = '';
    private $username = '';
    private $password = '';
    private $email = '';
    private $role = '';
    
    function __construct(){
        $this->name = '';
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->role = '';    
    }
    
    // SETTERS
    private function setName($var){
        $this->name = $var;
    }
    
    private function setUserName($var){
        $this->username = $var;
    }

    private function setPassword($var){
        $this->password = $var;
    }
    
    private function setEmail($var){
        $this->email = $var;
    }
    
    private function setRole($var){
        $this->role = $var;
    }
    
    // GETTERS
    private function getName($var){
        return $this->name = $var;
    }
    
    private function getUserName($var){
        return $this->username = $var;
    }
    
    private function getPassword($var){
        return $this->password = $var;
    }
    
    private function getEmail($var){
        return $this->email = $var;
    }
    
    private function getRole($var){
        return $this->role = $var;
    }

    
    // METHODS
    
   public function listUsers($oneUser,$conn,$dbase){
        
        $enable = 'Habilitado';
        $disabled = 'Deshabilitado';
        
        if($conn)
        {
            $sql = "SELECT * FROM af_usuarios";
                mysqli_select_db($conn,$dbase);
                $resultado = mysqli_query($conn,$sql);
            //mostramos fila x fila
            $count = 0;
            echo '<div class="container-fluid" style="margin-top:70px">
                            <div class="jumbotron" >
                                <div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-user"></span> Listado de Usuarios</h2></div><hr>';
                
            
                    echo "<table class='table table-condensed table-hover' style='width:100%' id='usersTable'>";
                    echo "<thead>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>User</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th class='text-nowrap text-center'>Permisos</th>
                    <th>&nbsp;</th>
                    </thead>";


            while($fila = mysqli_fetch_array($resultado)){
                    // Listado normal
                    echo "<tr>";
                    echo "<td align=center>".$oneUser->getName($fila['nombre'])."</td>";
                    echo "<td align=center>".$oneUser->getUserName($fila['user'])."</td>";
                    echo "<td align=center>".$oneUser->getEmail($fila['email'])."</td>";
                    if($oneUser->getRole($fila['state']) == 1){
                        echo "<td align=center>".$enable."</td>";
                    }else if($oneUser->getRole($fila['state']) == 0){
                        echo "<td align=center>".$disabled."</td>";
                    }
                    echo "<td class='text-nowrap'>";
                    if($oneUser->getUserName($fila['user']) != 'root_mecon'){
                            echo '<a data-toggle="modal" data-target="#modalUserAllow" href="#" data-id="'.$fila['id'].'" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-flash"></span> Cambiar Permisos</a>';
                    }
                    echo "</td>";
                    $count++;
                }

                echo "</table>";
                echo "<hr>";
                echo '<footer class="container-fluid text-left"><span class="glyphicon glyphicon-option-vertical"></span> Cantidad de Usuarios:  '.$count.' </footer><hr>';
                echo '</div></div>';
                }else{
                echo 'Connection Failure...' .mysqli_error($conn);
                }

            mysqli_close($conn);

}
    
    
    
    
    public function changePassword($user_id){
            
            echo '<div class="container">
                            <div class="jumbotron">
                                
                                <div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-refresh"></span> Cambio de Password</h2><hr>
                                <p><span class="glyphicon glyphicon-exclamation-sign"></span> Preste atención a los datos que recibe cada campo. <strong>Los Campos que muestran (*) son obligatorios</strong></p></div><hr>
                               
                                 <form id="fr_update_password_ajax"  method="post">
                                 <input type="hidden" id="id" name="id" value="'.$user_id.'">

                                      <div class="form-group">
                                        <label for="pwd_1">Password: (*)</label>
                                        <input type="password" class="form-control" id="pwd_1" name="pwd_1">
                                      </div>
                                      <div class="form-group">
                                        <label for="pwd_2">Repita Password: (*)</label>
                                        <input type="password" class="form-control" id="pwd_2" name="pwd_2">
                                      </div>
                                      
                                      <button type="submit" class="btn btn-default bnt-block" id="update_password"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Actualizar</button>
                                    </form> <hr>

                                    <div id="messagePass"></div>                                 

                            </div>
                        </div>';
    }
    
    
    
    
    // PERSISTENCE
    public function addUser($oneUser,$name,$email,$password_1,$password_2,$conn,$dbase){
        
        if($conn){
        
            if((strlen($password_1) == 15) && (strlen($password_2) == 15)){
            
                if(strcmp($password_1,$password_2) == 0){
                
                    
                
                mysqli_select_db($conn,$dbase);
                $sql = "select * from af_usuarios where email = '$email' or name = '$name'";
                $query = mysqli_query($conn,$sql);
                $rows = mysqli_num_rows($query);
                
                if($rows == 0){
                
                    // se determina el dominio
                    $dominio = '_mecon';
                    
                    // se encripta el password
                    $passHash = password_hash($password_1, PASSWORD_BCRYPT);
                    
                    $user = substr($email,0,-13);
                    $username = $user.$dominio;
                    
                    $role = 1;
                    
                    $sql_2 = "INSERT INTO af_usuarios ".
                            "(name,
                                user,
                                email,
                                password,
                                state)".
                            "VALUES ".
                            "($oneUSer->setName('$name'),
                            $oneUSer->setUserName('$username'),
                            $oneUser->setEmail('$email'),
                            $oneUser->setPassword('$passHash'),
                            $oneUser->setRole('$role'))";
                    $query_2 = mysqli_query($conn,$sql_2);
            
            
            
                    if($query_2){
                        echo 1; // se realizó la inserción en la base 
                    }else{
                        echo -1; // no se realizó la inserción del dato en la base
                    }
                
                
                }if($rows > 0){
                    echo 4; // el usuario ya existe            
                }
            
            }else{
                echo 11; // los password no coinciden
            }
        }else{
            echo 9; // alguno de los password no tiene 15 caracteres
        }
    }else{
        echo 7;
    }
    
        
    
    } // END OF FUNCTION
    
    
    
    
    
    ///////////////////////////////// SECCION REGENERACION PASSWORD ///////////////////////////////////

/*
** Funcion para generar archivo de password
*/


public function gentxt($username,$password){
  
  $fileName = "../users/gen_pass/$username.pass.txt"; 
  
  if (file_exists($fileName)){
  
    $file = fopen($fileName, 'w+');
    
    fwrite($file, $password);
    fclose($file);
    
    echo '<div class="container-fluid">
                    <div class="alert alert-info" role="alert">
                        Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente
                    </div><hr>
                        <a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>
                    </div>';
  
  }else{
  
      $file = fopen($fileName, 'w');
      fwrite($file, $password);
      fclose($file);
      
      echo '<div class="container-fluid">
                  <div class="alert alert-info" role="alert">
                        Se ha generado su archivo de password. Descargue el archivo generado. Recuerde modificar su Password cuando ingrese nuevamente
                     </div><hr>
                        <a href="download_pass.php?file_name='.$fileName.'" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-save"></span> Descargar</a>
                </div>';
      
  }
} // END OF FUNCTION


/*
** Funcion para generar password aleatorio
*/

public function genPass(){
    //Se define una cadena de caractares.
    //Os recomiendo desordenar las minúsculas, mayúsculas y números para mejorar la probabilidad.
    $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@";
    //Obtenemos la longitud de la cadena de caracteres
    $stringLong = strlen($string);
 
    //Definimos la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, puedes poner la longitud que necesites
    //Se debe tener en cuenta que cuanto más larga sea más segura será.
    $longPass=15;
 
    //Creamos la contraseña recorriendo la cadena tantas veces como hayamos indicado
    for($i=1 ; $i<=$longPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos = rand(0,$stringLong-1);
 
        //Vamos formando la contraseña con cada carácter aleatorio.
        $pass .= substr($string,$pos,1);
    }
    return $pass;
}


/*
** Funcion para blanquear password
*/

public function resetPass($oneUser,$username,$conn,$dbase){

    mysqli_select_db($conn,$dbase);
    $sql = "select * from af_usuarios where user = '$username'";
    $query = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($query);
    
    if($rows > 0){

        $password = $oneUser->genPass();
        $passHash = password_hash($password, PASSWORD_BCRYPT);
        
        $sql_1 = "UPDATE af_usuarios SET password = $oneUser->setPassword('$passHash') where user = '$username'";
        
        $query_2 = mysqli_query($conn,$sql_1);
        
        
        if($query_2){
        
            echo '<div class="container-fluid">
                            <div class="alert alert-success" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <span class="glyphicon glyphicon-ok"></span> Su Password fue blanqueada con Exito!
                            </div>
                        </div>';
                 $oneUser->gentxt($username,$password);
            
        }else{
            
            echo '<div class="container-fluid">
                            <div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <span class="glyphicon glyphicon-remove"></span> Error al Blanquear Password
                            </div>
                         </div>';
            
        }
   
    }if($rows == 0){
        echo '<div class="container-fluid">
                            <div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <span class="glyphicon glyphicon-ban-circle"></span> Usuario Inexistente. Primero Registrese!!!
                            </div>
                    </div>';
    }
} // END OF FUNCTION

public function updatePassword($oneUser,$user_id,$password_1,$password_2,$conn,$dbase){

    if($conn){
        
            if((strlen($password_1) == 15) && (strlen($password_2) == 15)){
            
                if(strcmp($password_1,$password_2) == 0){
                    
                    mysqli_select_db($conn,$dbase);
                    // se encrypta la contraseña
                    $passHash = password_hash($password_1, PASSWORD_BCRYPT);
                    $sql = "update af_usuarios set
                            password = $oneUser->setPassword('$passHash')
                            where id = '$user_id'";
                    
                    $query = mysqli_query($conn,$sql);
                    
                    if($query){
                        echo 1; // registro actualizado correctamente
                    }else{
                        echo -1; // hubo un problema al actualizar el registro
                    }
                    

                }else{
                    echo 11; // los password no coinciden
                }    
            }else{
                echo 17; // los password deben tener 15 caracteres
            }
    }else{
        echo 7;
    }
} // END OF FUNCTION


public function changeAllow($oneUser,$id,$role,$conn,$dbase){
    
    if($conn){
    
    mysqli_select_db($conn,$dbase);
    $sql = "update af_usuarios set
            state = $oneUser->setRole('$role')
            where id = '$id'";
    $query = mysqli_query($conn,$sql);
    
    if($query){
        echo 1;
    }else{
        echo -1;
    }
    }else{
        echo 7;
    }

} // END OF FUNCTION


public function modalChangeAllow(){
    

    echo '<div id="modalUserAllow" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <span class="glyphicon glyphicon-refresh"></span> Cambiar Permisos de Usuario</h4>
                </div>
                <div class="modal-body">
                    
                    <form id="frm_user_allow" method="POST">
                    <input type="hidden" class="form-control" name="bookId" id="bookId" value="bookId">
                        <div class="form-group">
                            <label for="permisos">Permisos:</label>
                            <select class="form-control" id="permisos" name="permisos">
                                <option value="" selected disabled>Seleccionar</option>
                                <option value="0">Deshabilitar</option>
                                <option value="1">Habilitar</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" id="cambiar_permiso">
                            <span class="glyphicon glyphicon-ok"></span> Aceptar</button>
                    </form>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove-circle"></span> Cerrar</button>
                </div>
                </div>

            </div>
            </div>';

}


} // FIN DE LA CLASE


?>
