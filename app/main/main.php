<?php   session_start();

                error_reporting(E_ALL ^ E_NOTICE);
                ini_set('display_errors', 1);
                
                include "../connection/connection.php";
                include "../../base_libs/lib_system.php";
                include "../modules/users/lib_users.php";
                include "../modules/directories/lib_directories.php";
                include "../modules/works/lib_works.php";
                include "lib_main.php";


                $varsession = $_SESSION['user'];
      
                if($conn){

                        $sql = "select id, name  from af_usuarios where user = '$varsession'";
                        mysqli_select_db($conn,$dbase);
                        $query = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($query)){
                            $nombre = $row['name'];
                            $user_id = $row['id'];
                        }
                      }else{
                        echo 'CONNECTION FAILURE';
                      }
  
   
    
  if($varsession == null || $varsession == ''){
        echo '<!DOCTYPE html>
                <html lang="es">
                <head>
                <title>Administrador de Archivos - Main</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">';
                skeleton();
                echo '</head><body style = "background: #839192;">';
                echo '<br><div class="container">
                        <div class="alert alert-danger" role="alert">';
                echo '<p align="center"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Su sesión ha caducado. Por favor, inicie sesión nuevamente</p>';
                echo '<a href="../../logout.php"><hr><button type="buton" class="btn btn-default btn-block"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Iniciar</button></a>';  
                echo "</div></div>";
                die();
                echo '</body></html>';
  }




?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Dirección Cloud  - Menú Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php skeleton(); ?>


  <style type="text/css">
  footer {
      background-color: #555;
      color: white;
      padding: 15px;
      border-radius: 5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    #head {
      background-color: #555;
      color: white;
      padding: 15px;
      border-radius: 5px;
      opacity: 0.6;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    textarea {
    overflow: scroll;
    resize: vertical;
    font-size: 2vw; 
    min-height:100px;   
  }
  .option-red {
        color: darkred;
        background-color: red;
    }

    .option-purple {
        color: darkmagenta;
        background-color: magenta;
    }

    .option-yellow {
        color: darkkhaki;
        background-color: yellow;
    }

    .option-aqua {
        color: mediumaquamarine;
        background-color: aqua;
    }

    .option-blue {
        color: lightblue;
        background-color: blue;
    }

    .option-green {
        color: lightgreen;
        background-color: green;
    }
</style>

</head>
<body style = "background: #839192;" onload="nobackbutton();">

<?php navBar($conn,$user_id,$nombre); ?>
  
<div class="container-fluid">
    
    <?php

        if($conn){
            // mensaje de home
            if (isset($_POST['home'])){
                greeter($nombre);
            }
            // salida del sistema
            if(isset($_POST['logout'])){
                logOut($nombre);
            }
            // ============================================================================================ //
            // MANTENIMIENTO DE USUARIOS
            // se crea el objeto usuario
              $oneUser = new Users();
              // formulario de cambio de password
            if(isset($_POST['change_pass'])){
              $oneUser->changePassword($user_id);
            }

            // listar usuarios
            if(isset($_POST['users'])){
              $oneUser->listUsers($oneUser,$conn,$dbase);
            }

            $oneUser->modalChangeAllow(); // modal de cambio de permisos


            // ============================================================================================ //
            // MANEJO DE DIRECTORIOS
            $oneDir = new Directories(); // se crea el objeto directorio

            // listar directorios 
            if(isset($_POST['directories'])){
                $oneDir->listDirectories($oneDir);
            }


            // ============================================================================================ //
            // MANEJO DE DOCUMENTOS
            $oneWork = new Works(); // se creao el objeto work

            if(isset($_POST['documents'])){
                $oneWork->listDocuments($oneWork,$conn,$dbase);
            }
            if(isset($_POST['new_work'])){
                $oneWork->formNewWork($user_id);
            }
            if(isset($_POST['share_work'])){
                $id = mysqli_real_escape_string($conn,$_POST['id']);
                $oneWork->formShareWork($id,$conn,$dbase);
            }


        }else{
            echo 'CONNECTION FAILURE';
        }





    ?>
  
  </div>

<script type="text/javascript" src="lib_main.js"></script>
<script type="text/javascript" src="../modules/users/lib_users.js"></script>
<script type="text/javascript" src="../modules/works/lib_works.js"></script>



</body>
</html>