<?php
echo view('frontend/frontendheader');
?>


<!-- start banner Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						<?php echo $dato["titulo"] ?>
					</h1>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start Sample Area -->
	<section class="sample-text-area">
		<div class="container">
			<h3 class="text-heading text-center"><?php echo $dato["encabezado"] ?></h3>
			<p class="sample-text">
                 <?php echo $dato["cuerpo"] ?>
			</p>
		</div>
	</section>
	<!-- End Sample Area -->

	<?php
echo view('frontend/frontendfooter');
?>