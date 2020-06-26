
 <?php echo view('common/basicheader', ["titulo" => "Pantalla Principal"]);

?> 
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
    foreach ($datos as $dato) {

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
                echo anchor("content/articulo/" . $dato["id"], "Ver más",["class"=>"badge badge-secondary"]);
               echo "<hr>";
            }

            ?>

            </div>
        </div>
    </div>
</section>

<?php

echo view('common/basicfooter');
?>
