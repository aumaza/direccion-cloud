<?php   error_reporting(E_ALL ^ E_NOTICE);
                ini_set('display_errors', 1);
                
                include "../../connection/connection.php";
                include "../../../base_libs/lib_system.php";
                include "../users/lib_users.php";




?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dirección Cloud - Olvidé mi Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>

  <style type="text/css">
  footer {
      background-color: #555;
      color: white;
      padding: 15px;
      border-radius: 5px;
    }
    #head {
      background-color: #555;
      color: white;
      padding: 15px;
      border-radius: 5px;
      opacity: 0.6;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

</head>
<body style = "background: #839192;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../../../#"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Dirección Cloud</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Acciones<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../regestry/"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> Registrarme</a></li>
        </ul>
        <?php 
          if($conn){
              echo '<li class="active"><button class="btn btn-success navbar-btn"  data-toggle="tooltip" title="Conexion a la Base OK!"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Connection</button></li>';
          }else{
              echo  '<li class="active"><button class="btn btn-danger navbar-btn" data-toggle="tooltip" title="Sin Conexion a la Base!"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Connection</button></li>';
          }
        ?>
      </li>
      </ul>
    
  </div>
</nav>
  
<div class="container">
  
  <div class="jumbotron">
    <div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-refresh" aria-hidden="true"> </span> Cambiar Password</h2></div> <hr>

       <form action="#" method="POST">
          <div class="form-group">
            <label for="user">Usuario:</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="usuario_organismo">
          </div>
          
          <button type="submit" class="btn btn-default btn-block" name="update_password" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Blanquear</button>
        </form><hr>

        <?php

            if(isset($_POST['update_password'])){
            
            $oneUser = new Users();
            
            $username = mysqli_real_escape_string($conn,$_POST['user']);
            
            if($username == ''){
                echo '<div class="alert alert-danger alert-dismissible" >
                              <a href="#" class="close" data-dismiss="alert" aria-label="close" >&times;</a>
                                <p align=center><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Debe ingresar el usuario</p>
                            </div>';
                                              
            }else{
                $oneUser->resetPass($oneUser,$username,$conn,$dbase);
            }
          }
                   
      ?>
    
    <footer class="container-fluid text-center">
    <p align=center><img src="../../static/img/escudo32x32.png" class="img-circle" alt="folder" width="32" height="32"> </p>
    <p align=center>Ministerio de Economía de la Nación</p>     
    <p align=center>Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
  </footer><hr>

  </div>
  </div>

<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
</script>

</body>
</html>