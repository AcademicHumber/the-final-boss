<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
        
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="anonimo">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Blog</title>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700|Roboto:400,500" rel="stylesheet">
	<!--
			CSS
			============================================= -->
        <link rel="stylesheet" href="<?php echo base_url("css/linearicons.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("css/font-awesome.min.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("css/bootstrap.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("css/magnific-popup.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("css/nice-select.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("css/animate.min.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("css/owl.carousel.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("css/main.css");?>">
</head>

<body>
    <!-- Start header Area -->
	<header id="header">
		<div class="container box_1170 main-menu">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="index.html"><img src="" alt=" Hacer un logo :v" title="" /></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="<?php echo base_url("blog");?>">Home</a></li>
						<li class="menu-has-children"><a href="">Categorías</a>
							<ul>
								<li><a href="">Categoría 1</a></li>
								<li><a href="">Categoría 2</a></li>
								<li><a href="">Categoría 3</a></li>
							</ul>
						</li>					
						<li class="menu-has-children"><a href="">Páginas</a>
							<ul>
								<?php
                                                                foreach ($paginas as $pagina){
                                                                    echo "<li><a href=''>".$pagina["titulo"]."</a></li>";
                                                                }
                                                                ?>
							</ul>
						</li>						
						<li><a href="">Contacto</a> ||</li>
                                                <?php
                                                if (empty($_SESSION["username"])){
                                                    echo "<li><a href='".base_url("UserController/ingresar")."'>Iniciar Sesion</a></li>";
                                                }
                                                else{
                                                    ?>
                                                  <li class="menu-has-children"><a href=""><?php echo $_SESSION["username"]?></a>
							<ul>
                                                            <li><a href="<?php echo base_url("UserController/ingresar")?>">Salir</a></li>								
							</ul>
                                                    </li>  
                                                <?php
                                                }
                                                ?>
                                                
                                                
					</ul>
                                    
				</nav>
			</div>
		</div>
	</header>
	<!-- End header Area -->