<?php
echo view("frontend/frontendheader");
?>
<!-- Start banner Area -->
<section class="banner-area">
    <div class="container box_1170">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content text-center col-lg-8">
                <span class="display-1 titulo">
                    Set of Words
                </span>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start Post Silder Area -->
<section class="post-slider-area">
    <div class="container box_1170">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="owl-carousel active-post-carusel">
                    <?php
                    foreach ($articulos as $dato){
                       ?>
                    <div class="post-box mb-30">
                        <div class="d-flex">
                            <div>
                                <span class="lnr lnr-bookmark"></span>
                             </div>
                            <div class="post-meta">
                                <div class="meta-head">
                                    <a href="<?php echo base_url("blog/articulos/".$dato["id"])?>"><?php echo $dato["titulo"]?></a>
                                </div>                                
                                <div class="meta-details">
                                    <ul>
                                        <li>
                                            
                                                <span class="lnr lnr-user"></span>
                                                <?php echo $dato["nombre"] ?>
                                           
                                        </li>
                                        <li>
                                           
                                                <span class="lnr lnr-calendar-full"></span>
                                                <?php echo $dato["created_at"] ?>
                                          
                                        </li>                                        
                                        <li>
                                            
                                                <span class="lnr lnr-star"></span>
                                                <?php echo $dato["nombre_cat"] ?>
                                         
                                        </li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p><?php echo $dato["encabezado"] ?></p>
                        <div class="post-btn">
                            <a href="<?php echo base_url("blog/articulos/".$dato["id"])?>" class="primary-btn text-uppercase">Leer Más</a>
                        </div>
                    </div>
                    <?php
                            }
                    ?>
                    
                    </div>
                </div>
            </div>
        </div>   
</section>
<!-- End Post Silder Area -->

<!-- Start main body Area -->
<div class="main-body section-gap mt--30">
    <div class="container box_1170">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 post-list">
                <section class="post-area">
                    <?php
                    foreach ($articulos as $dato) {
                        ?>
                        <div class="single-post-item">
                            <figure>
                                <img class="post-img " src="<?php echo base_url($dato["img_principal"]) ?>" alt="Imagen principal" width=680 height=330 >
                            </figure>
                            <h3>
                                <a href="<?php echo base_url("blog/articulos/".$dato["id"])?>"><?php echo $dato["titulo"] ?></a>
                            </h3>
                            <p><?php echo $dato["encabezado"] ?></p>
                            <a href="<?php echo base_url("blog/articulos/".$dato["id"])?>" class="primary-btn text-uppercase mt-15">Seguir Leyendo</a>
                            <div class="post-box">
                                <div class="d-flex">
                                    <div>
                                        
                                            <img src="<?php echo base_url("profiles/".$dato["perfil"].".PNG") ?>" alt="Imagen autor">
                                        
                                    </div>
                                    <div class="post-meta">
                                        <div class="meta-head">
                                            <?php echo $dato["nombre"] ?>
                                        </div>
                                        <div class="meta-details">
                                            <ul>
                                                <li>
                                                    
                                                        <span class="lnr lnr-calendar-full"></span>
                                                        <?php echo $dato["created_at"] ?>
                                                    
                                                </li>                            
                                                <li>
                                                   
                                                        <span class="lnr lnr-star"></span>
                                                        <?php echo $dato["nombre_cat"] ?>
                                                   
                                                </li>                            
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </section>
            </div>
        </div>
    </div>
</div>
<?php
echo view("frontend/frontendfooter");
?>