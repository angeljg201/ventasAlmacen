<?php 
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
	<script src="librerias/alertifyjs/alertify.min.js"></script>
	<link rel="stylesheet" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="librerias/alertifyjs/css/themes/default.css">
</head>
<body style="background-color: gray">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Sistema de ventas y almacen</div>
					<div class="panel panel-body">
						<p>
							<img src="img/ventas.jpg"  height="190">
						</p>
						<form id="frmLogin">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control input-sm">
							<p></p>
							<span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
							<?php  if(!$validar): ?>
							<a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

			// Validar si los campos están vacíos
			vacios = validarFormVacio('frmLogin');

			if(vacios > 0){
				// Usar Alertify.js para mostrar un mensaje de error si hay campos vacíos
				alertify.alert('Error', 'Debes llenar todos los campos!!');
				return false;
			}

			// Recoger los datos del formulario
			datos = $('#frmLogin').serialize();

			// Enviar los datos via AJAX
			$.ajax({
				type: "POST",
				data: datos,
				url: "procesos/regLogin/login.php",
				success: function(r){
					if(r == 1){
						// Redirigir a la página de inicio si el login es exitoso
						window.location = "vistas/inicio.php";
					}else{
						// Usar Alertify.js para mostrar un mensaje de error si el login falla
						alertify.error('No se pudo acceder :(');
					}
				}
			});
		});
	});
</script>
