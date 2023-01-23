<?php

/*
** Funcion que carga el skeleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/css/bootstrap.min.css" >
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/css/bootstrap-theme.css" >
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/css/bootstrap-theme.min.css" >
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/css/scrolling-nav.css" >
														
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/Chart.js/Chart.min.css" >
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/Chart.js/Chart.css" >
							
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/css/jquery.dataTables.min.css" >
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/dataTables/buttons.dataTables.min.css" >
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/css/buttons.dataTables.min.css" >
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/css/buttons.bootstrap.min.css" >
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/css/jquery.dataTables-1.11.5.min.css" >
							<link rel="stylesheet" href="/direccion-cloud/app/static/skeleton/dataTables/fixedColumns.dataTables.min.css" >
							
							<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
							<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
						    
						    <script src="/direccion-cloud/app/static/skeleton/js/jquery.min.js"></script>
						    <script src="/direccion-cloud/app/static/skeleton/js/jquery-3.5.1.min.js"></script>
						    <script src="/direccion-cloud/app/static/skeleton/js/jquery-3.4.1.min.js"></script>
							 <script src="/direccion-cloud/app/static/skeleton/js/bootstrap.min.js"></script>
							
							<script src="/direccion-cloud/app/static/skeleton/js/jquery.dataTables.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/dataTables/DataTables/js/jquery.dataTables1.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/dataTables/DataTables/js/dataTables.fixedColumns.min.js"></script>
							
							<script src="/direccion-cloud/app/static/skeleton/js/dataTables.editor.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/js/dataTables.select.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/js/dataTables.buttons.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/dataTables/DataTables/js/buttons.colVis.min.js"></script>
							
							<script src="/direccion-cloud/app/static/skeleton/js/jszip.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/js/pdfmake.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/js/vfs_fonts.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/js/buttons.html5.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/js/buttons.bootstrap.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/js/buttons.print.min.js"></script>
							
							<script src="/direccion-cloud/app/static/skeleton/Chart.js/Chart.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/Chart.js/Chart.bundle.min.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/Chart.js/Chart.bundle.js"></script>
							<script src="/direccion-cloud/app/static/skeleton/Chart.js/Chart.js"></script>';
}


function formLogIn(){

		echo '<div class="container">
					<div class="jumbotron">
					<div id="head" class="container-fluid text-center"><h2><span class="glyphicon glyphicon-cloud"></span>  Dirección Cloud</h2></div><hr>
  
				   <form id="fr_login_ajax" method="POST">
				    <div class="form-group">
				      <label for="email">Usuario:</label>
				      <input type="email" class="form-control" id="user" name="user" placeholder="usuario_organismo">
				    </div>
				    <div class="form-group">
				      <label for="pwd">Password:</label>
				      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Ingrese su password">
				    </div><br>
				    
				    <div class="alert alert-info">
					    <button type="submit" class="btn btn-default btn-block" id="login" name="login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Ingresar</button>
					    <button type="reset" class="btn btn-default btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Cambiar Usuario</button>
				    </div>
				  </form><hr>

				  <footer class="container-fluid text-center">
				    <p align=center><img src="app/static/img/escudo32x32.png" class="img-circle" alt="folder" width="32" height="32"> </p>
				    <p align=center>Ministerio de Economía de la Nación</p>     
				    <p align=center>Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
				  </footer>
				  
				  <div id="messageLogIn"></div>

				</div>
				</div>';

}

function flyerConnFailure(){

		echo '<div class="container">
								  <div class="jumbotron">
								    <h1><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Atención</h1><hr>
								    <div class="alert alert-danger">    
								    	<p>Sin Conexión a la Base de Datos. Contactese con el Administrador.</p>
								    </div><hr>
								  </div>';
}

function logOut($nombre){
    
    echo '<div class="container"> 
				    			<div class="jumbotron">
				    					<footer class="container-fluid text-center">
				                <h1 align=center>Hasta Luego '.$nombre.'</h1>
				                </footer><hr>

				                <p align=center><img src="../static/img/logout.gif"  class="img-reponsive img-rounded"></p><hr>
				                
				                <footer class="container-fluid text-center">
											    <p align=center><img src="../static/img/escudo32x32.png" class="img-circle" alt="folder" width="32" height="32"> </p>
											    <p align=center>Ministerio de Economía de la Nación</p>     
											    <p align=center>Dirección de Presupuesto y Evaluación de Gastos en Personal</p>
											  </footer>
				                <meta http-equiv="refresh" content="8;URL=../../logout.php "/>
				            </div>
				            </div>';
}

?>