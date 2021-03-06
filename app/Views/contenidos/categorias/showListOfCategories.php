<?php
echo view("common/basicheader", ["titulo"=> "Categorías"])
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
<section class="content">
    <div class="card">
    <div class="table-responsive-sm">
        <div class="card-header">
            <h1>Categorías</h1>
            <a href="crearCategoria" class="badge badge-light">Crear nueva categoria</a>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
    </div>
    <div class="table-responsive-sm table-responsive-md">
         <div class="card-body">
    <?php
    foreach ($datos as $dato){
        ?>
            <div class="card border border-primary">
            <div class="card-header"><p class="card-title"><strong>Nombre: </strong><?php echo $dato["nombre"] ?></p></div>
            <div class="card-body">
            <p class="card-title"><strong>Descripción:</strong></p>
            <p class="card-text"><?php echo $dato["descripcion"]?></p>
            <p class="card-link text-primary">
                
                <?php
                if ($dato["nombre"] != "Sin Categoría"){
                echo " <a class='badge badge-light' href='editCategory/".$dato["id"]."'>Editar</a> - ";
                echo " <a class='badge badge-light' href='deleteCategory/".$dato["id"]."'onclick=' return confirmar();''>Eliminar</a></p>";  
                }
                ?>
            </p> 
            <p class="card-text text-muted"><strong>Fecha de creación: </strong><?php echo $dato["created_at"] ?></p>
        </div>
        </div>
    <?php
    }
    ?>
    </div>
    </div>
    </div>
  </section>
<?php
echo view("common/basicfooter");