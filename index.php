<?php   session_start();

                error_reporting(E_ALL ^ E_NOTICE);
                ini_set('display_errors', 1);
                
                include "app/connection/connection.php";
                include "base_libs/lib_system.php";





?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dirección Cloud</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="app/static/img/preferences-system-services.png" />
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
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Dirección Cloud</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Acciones<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="app/modules/password/"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Olvidé mi Password</a></li>
          <li><a href="app/modules/regestry/"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> Registrarme</a></li>
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
  
         <?php

                  if($conn){
                    formLogIn();
                  }else{
                    flyerConnFailure();
                  }
        ?>

  </div>



<script type="text/javascript" src="login.js"></script>
</body>
</html>