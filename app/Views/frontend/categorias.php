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
                       <?php
                          foreach ($dato as $datos) {
                                  ?>
                      <?php echo $datos["nombre"] ?>
                    </h1>   
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Blog Area -->
    <section class="blog_area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_blog_details ">
                        <br>
                            <h1><?php echo $datos["titulo"] ?></h1><br>
                            <h5><?php echo $datos["encabezado"] ?></h5><br>
                            <div>
                              <?php
                              if (strlen($datos["cuerpo"]) > 500) {                                      
                                  echo substr($datos["cuerpo"], 0, 500) . "...";
                              } else {
                                  echo $datos["cuerpo"];
                                  echo "";
                              }
                              ?>
                          </div> 
                        <div class="user_details">
    
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                              <?php
                                            echo anchor("blog/articulos/" . $datos["id"], "Ver más",["class"=>"genric-btn primary circle"]);
                                            ?>
                                    </div>


                                </div>
                            </div>

                        </div>

                <?php
                 }
                ?>
            </div>
        </div>
    </section>
    <!-- Blog Area -->


<?php
echo view("frontend/frontendfooter");
?>