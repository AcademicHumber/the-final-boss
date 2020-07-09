<?php
echo view("frontend/frontendheader");
?>

<!-- start banner Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						Contáctanos
					</h1>

				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start contact-page Area -->
	<section class="contact-page-area pt-50 pb-40">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">

						<div class="contact-details">
							<h3><a href="https://api.whatsapp.com/send?phone=59160872177" target="_blank" class="fab fa-whatsapp"></a></h3>
	
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
			
						<div class="contact-details">
							<h3><a href="https://m.me/100004344997589" target="_blank" class="fab fa-facebook-messenger"></a>
						    </h3>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<form class="form-area contact-form text-right"   action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>' method = "post">
		     
						<div class="row">

							<div class="col-lg-6 form-group">

								<input type="text" class="common-input mb-20 form-control" id="nombre" name="nombre" required="" placeholder="Nombre" value="<?php if (!$enviado && isset($nombre)) echo $nombre ?>">

								<input type="email" class="common-input mb-20 form-control" id="correo" name="correo" placeholder="Correo" value="<?php if (!$enviado && isset($correo)) echo $correo ?>">

								<textarea name="mensaje" class="common-input mb-20 form-control" id="mensaje" placeholder="Mensaje"><?php if(!$enviado && isset($mensaje))echo $mensaje?></textarea>

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

							</div>
							<div class="col-lg-6 form-group">
								<div class="alert-msg" style="text-align: left;"></div>
								<button class="genric-btn primary circle text-uppercase" style="float: left;">Send Message</button>
							</div>
			
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End contact-page Area -->


<?php
echo view("frontend/frontendfooter");
?>