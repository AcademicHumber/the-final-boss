<?php
echo view('frontend/frontendheader');
?>
    <!-- End header Area -->

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

    <!-- Blog Area -->
    <section class="blog_area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_blog_details ">
                        <br>
                        <h4 class="text-center"><?php echo $dato["encabezado"] ?></h4>
                          <img class="img-thumbnail mx-auto d-block" src="<?php echo base_url($dato['img_principal']) ?>" alt="Imagen principal" width=500 height=300><br>
                        <div class="user_details">
                            <div class="float-left">
                                 <?php
                                // la variable opciones se volvera un arreglo que tiene el nombre y el slug de cada categoria
                                foreach ($categorias as $categoria){
                                   $opciones[$categoria["id"]]["nombre"] = $categoria["nombre"];
                                   $opciones[$categoria["id"]]["slug"] = $categoria["slug"];               
                                }
                                // Este if es por si borraron la categoria pero no la publicacion, para evitar bugs xd
                                if (!empty($opciones[$dato["categoria"]])){ 
                                    // En el texto va el nombre y en la url va el slug
                                    echo anchor("blog/categorias/".$opciones[$dato["categoria"]]["slug"],$opciones[$dato["categoria"]]["nombre"]);
                                }
                                else{
                                    echo anchor("blog/categorias/sin-categoria","Sin Categoría");
                                }
                                ?>
                                   </div>

                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                         
                                        <h5> <?php foreach ($dato_user as $data){
                                           $opciones[$data["nombre"]] = $data["nombre"];              
                                        }
                                         echo $data["nombre"]; 
                                         ?>
                                    </h5>
                                        <p><?php echo $dato["created_at"]?></p>
                                    </div>


                                </div>
                            </div>

                        </div>
                          <div class="col-12">
                             <?php echo $dato["cuerpo"]?>
                          </div>  
                    </div>
                    <div class="comments-area">
                        <h4>Comentarios</h4>
                        <div class="comment-list">
                            <?php
                             if(empty($comentarios)){
                                echo "No hay comentarios aún";
                         }
                            else{
                            foreach ($comentarios as $comentario):?>
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><?php echo $comentario["nombre_usuario"];?></h5>
                                        <p class="date"><?php echo $comentario["created_at"];?></p>
                                        <p class="comment">
                                           <?php echo $comentario["cuerpo"];?>
                                        </p>
                                        <?php
                                                // Condicion para que solo el usuario que creo el comentario pueda eliminarlo
                                                if ($_SESSION["id"] == $comentario["usuario"]) {
                                                    ?>
                                                    <div>
                                                    <?php echo anchor("blog/deleteComment/" . $comentario["id"]."/".$dato["id"], "Eliminar", ["class" => "btn btn-dark btn-sm"]); ?>
                                                    </div>
        <?php } ?>
                                            </div>
                                    
                                </div>
                            </div>                           
                                 <?php endforeach; } ?>
                        </div>
                    </div>
                    <?php if (!empty($_SESSION["id"])){?>
                    <div class="row">
                        <div class="col-lg-6">
                               <div class="comment-form">
                        <h4>Deja un comentario</h4>
                
                            <div class="form-group">
      
                            <div class="form-group">
                            <?php 
                                echo form_open(base_url("Blog/guardar_comment"));  
                                // un hidden que llevara el id del articulo
                                echo form_hidden("cont[articulo]",$dato["id"]);
                                // hidden que llevara el id del usuario
                                echo form_hidden("cont[usuario]", $_SESSION["id"]); 
                           ?>
                                <textarea class="form-control mb-10" rows="5" name="cont[cuerpo]"  placeholder="Comentario" required=""> </textarea>
                                      <?php
                                  echo "<br>";
                                  echo form_submit("","Enviar Comentario",["class"=>"primary-btn submit_btn text-uppercase"]);
                                  echo "<br>";
                                  echo "<br>";
                                  echo form_close();
                            ?>
                            </div>
                          </div>
                        </div>
                        
                    </div>
                 
                </div>
                    <?php }?>
            </div>
        </div>
    </section>
    <!-- Blog Area -->
<?php
echo view('frontend/frontendfooter');
?>