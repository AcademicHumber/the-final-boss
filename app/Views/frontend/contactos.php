
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/estilos_dos.css")?>">
</head>
<body>
    <?php
    echo anchor("blog", "Volver al FrontEnd");
    ?>

	<div class="warp">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method = "post">

			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php if (!$enviado && isset($nombre)) echo $nombre ?>">

			<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php if (!$enviado && isset($correo)) echo $correo ?>">

			<textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje"><?php if(!$enviado && isset($mensaje))echo $mensaje?></textarea>

			<?php if (!empty($errores)): ?>
				<div class="alert error">
					<?php echo $errores; ?>
				</div>
			<?php elseif($enviado=="enviado"): ?>
				<div class="alert succes">
					<p>Enviado correctamente</p>
				</div>
			<?php elseif($enviado == "no enviado"): ?>
				<div class="alert succes2">
					<p>Mensaje no enviado</p>
				</div>
			<?php endif ?>

			<input type="submit" name="submit" class="btn" value="Enviar Correo">
		</form>


	<div class = "social">
		<ul>

		<li><a href="https://api.whatsapp.com/send?phone=59160872177" target="_blank" class="fab fa-whatsapp"></a></li>
		<li><a href="https://m.me/100004344997589" target="_blank" class="fab fa-facebook-messenger"></a></li>

		</ul>
		
	</div>

	</div>


</body>
</html>
