<?php
echo view("common/basicheader", ["titulo"=> "Categoría: ".$datos[0]["nombre"]])
?> 

  <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">
              <h3><?php echo "Categoría: ".$datos[0]["nombre"] ?></h3>    
              <h5>Articulos de la categoría</h5>


          </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body" style="line-height: 30px;">
   

    <?php
    foreach ($datos as $dato) {
        ?>
            <h3><?php echo $dato["titulo"] ?></h3>
            <h5><?php echo $dato["encabezado"] ?></h5>
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

                echo '<h5>';
                echo anchor("content/articulo/" . $dato["id"], "Ver más",["class"=>"badge badge-secondary"]);
                echo '</h5>';

            }
    
            ?>

    </div>
</div>

</section>
<?php
echo view("common/basicfooter")
?>