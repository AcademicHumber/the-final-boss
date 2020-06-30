<?php
echo view("frontend/frontendheader");
?>
<!-- Start banner Area -->
<section class="banner-area">
    <div class="container box_1170">
        <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content text-center col-lg-8">
                <h1>
                    El blog más famoso del oeste :v
                </h1>
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
                                    <a href="#"><?php echo $dato["titulo"]?></a>
                                </div>
                                <div class="meta-head">
                                    <a href="#"><?php echo $dato["encabezado"] ?></a>
                                </div>
                                <div class="meta-details">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-user"></span>
                                                <?php echo $dato["nombre"] ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-calendar-full"></span>
                                                <?php echo $dato["created_at"] ?>
                                            </a>
                                        </li>                                        
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-star"></span>
                                                <?php echo $dato["nombre_cat"] ?>
                                            </a>
                                        </li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p><?php
                        // Condicionante para que se vea solo una
                        // parte del cuerpo cuando este es muy largo

                        if (strlen($dato["cuerpo"]) > 300) {
                            echo substr($dato["cuerpo"], 0, 300) . "...";
                        } else {
                            echo $dato["cuerpo"];                            
                        }
                        ?></p>
                        <div class="post-btn">
                            <a href="<?php echo base_url("content/articulo/".$dato["id"])?>" class="primary-btn text-uppercase">Read More</a>
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
<!-- Start Post Silder Area -->
<section class="content-header">
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Artículos</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body">

            <div class="caja" >

                <?php
                foreach ($articulos as $dato) {
                    ?>
                    <h3 style="line-height: 35px;"><?php echo $dato["titulo"] ?></h3>
                    <h5 style="line-height: 35px;"><?php echo $dato["encabezado"] ?></h5>
                    <div>
                        <?php
                        // Condicionante para que se vea solo una
                        // parte del cuerpo cuando este es muy largo

                        if (strlen($dato["cuerpo"]) > 500) {
                            echo substr($dato["cuerpo"], 0, 500) . "...";
                        } else {
                            echo $dato["cuerpo"];
                            echo "";
                        }
                        ?>
                    </div> 

                    <?php
                    echo anchor("content/articulo/" . $dato["id"], "Ver más", ["class" => "badge badge-secondary"]);
                    echo "<hr>";
                }
                ?>

            </div>
        </div>
    </div>
</section>

<?php
echo view("frontend/frontendfooter");
?>