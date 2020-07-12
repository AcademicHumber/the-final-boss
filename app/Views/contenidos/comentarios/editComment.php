<?php
echo view("common/basicheader", ["titulo" => "Editar Comentario"]);
?> 
<section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="table-responsive-sm">
        <div class="card-header">
          <div class="card-title">
          <h4>Editar Comentario</h4>
        </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
      </div>
      <div class="table-responsive-sm table-responsive-md table-responsive-lg">
        <div class="card-body">

    <?php
    // Comprobamos errores o exito en la consulta, luego de ejecutarla
    echo form_open("");
    echo "<h5> Cuerpo del comentario </h5>";
    echo "<br>";
    echo form_textarea("cuerpo", $dato["cuerpo"], ["required" => 1]);
    echo "<br>";
    echo "<h6>".$exito."</h6>";
    echo form_submit("", "Actualizar",["class"=>"btn btn-dark"]);
    echo "<br>";
    echo "<br>";
    echo anchor("content/vercomentarios", "Volver a los comentarios",["class"=>"badge badge-secondary"]);
    ?>


        </div>
     </div>
    </div>

</section>  
<?php

echo view("common/basicfooter");
?>