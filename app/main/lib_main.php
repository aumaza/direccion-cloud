<?php

function navBar($conn,$user_id,$nombre){

	echo '<nav class="navbar navbar-inverse">
					  <div class="container-fluid">
					    <div class="navbar-header">
					    <form action="#" method="POST">
					      <button type="submit" class="btn btn-default navbar-btn" name="home"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Dirección Cloud</button>
					      <form>
					    </div>
					    <ul class="nav navbar-nav">
					    <li><button type="button" class="btn btn-warning navbar-btn" onclick="callExplorer();"><span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Directorios</button></li>
					      <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$nombre.'<span class="caret"></span></a>
					        <ul class="dropdown-menu">
					        <form action="#" method="POST">';
					        if($user_id == 1){
					        	echo '<li><button type="submit" class="btn btn-default btn-block"  name="users"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</button></li>';
					        }
					          echo '<li><button type="submit" class="btn btn-default btn-block"  name="change_pass"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Cambiar Password</button></li>
					          			  <li><button type="submit" class="btn btn-danger btn-block " name="logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</button></li>
					         
			   				<form>
					        </ul>';
					         
					          if($conn){
					              echo '<li class="active"><button class="btn btn-success navbar-btn"  data-toggle="tooltip" title="Conexion a la Base OK!"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Connection</button></li>';
					          }else{
					              echo  '<li class="active"><button class="btn btn-danger navbar-btn" data-toggle="tooltip" title="Sin Conexion a la Base!"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Connection</button></li>';
					          }
					        
			echo '</li>
					      </ul>
					    </div>
					</nav>';
}


function greeter($nombre){

	echo '<div class="jumbotron">
				    <footer class="container-fluid text-center">
				    <h1 align=center>Bienvenido  '.$nombre.' </h1> 
				  </footer><hr>

				    <p align=center><img src="../static/img/img-01.jpg" class="img-thumbnail" alt="folder" width="700" height="700"> </p><hr>
				    
				    <footer class="container-fluid text-center">
				    <p align=center><img src="../static/img/escudo32x32.png" class="img-circle" alt="folder" width="32" height="32"> </p>
				    <p align=center>Ministerio de Economía de la Nación</p>     
				    <p align=center>Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
				  </footer>

				  </div>';
}





?>