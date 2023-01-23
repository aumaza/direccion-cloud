<?php   error_reporting(E_ALL ^ E_NOTICE);
                ini_set('display_errors', 1);
                
                include "../../connection/connection.php";
                include "../../../base_libs/lib_system.php";
                include "../users/lib_users.php";




?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dirección Cloud - Registro de Usuario</title>
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
          <li><a href="../password/"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Olvidé mi Password</a></li>
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
    <div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Registro de Usuario</h2></div><hr>
    
       <form id="fr_add_new_user_ajax" method="POST">

          <div class="form-group">
            <label for="name">Nombre y Apellido:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre completo respetando las mayúsculas al comienzo">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su Email laboral">
          </div>
          <div class="form-group">
            <label for="pwd_1">Password:</label>
            <input type="password" class="form-control" id="pwd_1"  name="pwd_1" placeholder="Ingrese el password que va a utilizar">
          </div>
          <div class="form-group">
            <label for="pwd_2">Password:</label>
            <input type="password" class="form-control" id="pwd_2"  name="pwd_2"  placeholder="Repita el password ingresado anteriormente">
          </div>
          
          <button type="submit" class="btn btn-default btn-block" id="add_user"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registrarme</button>
        
        </form> <hr>

    <footer class="container-fluid text-center">
    <p align=center><img src="../../static/img/escudo32x32.png" class="img-circle" alt="folder" width="32" height="32"> </p>
    <p align=center>Ministerio de Economía de la Nación</p>     
    <p align=center>Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
  </footer>

  </div>
  </div>

<script src="regestry.js"></script>

</body>
</html>