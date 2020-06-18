<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/estilos.css")?>">
</head>
<body>

	<div class="warp">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method = "post">

			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php if (!$enviado && isset($nombre)) echo $nombre ?>">

			<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php if (!$enviado && isset($correo)) echo $correo ?>">

			<textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje"><?php if(!$enviado && isset($mensaje))echo $mensaje?></textarea>

			<?php if (!empty($errores)): ?>
				<div class="alert error">
					<?php echo $errores; ?>
				</div>
			<?php elseif($enviado): ?>
				<div class="alert succes">
					<p>Enviado correctamente</p>
				</div>
			<?php elseif(!$enviado): ?>
				<div class="alert succes2">
					<p>Mensaje no enviado</p>
				</div>
			<?php endif ?>

			<input type="submit" name="submit" class="btn" value="Enviar Correo">
		</form>

	</div>



</body>
</html>