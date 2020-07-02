<?php
echo view("common/basicheader", ["titulo"=> "Edicion"])
?>
<section class="content-header"></section>
<section class="content">
    <div class="card">
        <div class="card-header">
          <h1>Páginas</h1>
          <a href="crearPagina" class="badge badge-light">Crear nueva pagina</a>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
            <table class="table table-head-fixed text-nowrap table-md">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Fecha de creación</th>
                </tr>      
    <?php
    foreach ($datos as $dato){
    ?>  <tr>
        <td scope="row"><?php echo $dato["titulo"] ?></td>
        <td scope="row"><?php echo "<a class='badge badge-light' href='pagina/".$dato["id"]."'>Ver</a>" ?></td>
        <td scope="row"><?php echo "<a class='badge badge-light' href='editPagina/".$dato["id"]."'>Editar</a>" ?></td>
        <td scope="row"><?php echo "<a class='badge badge-light' href='deletePage/".$dato["id"]."'>Eliminar</a>" ?></td>
        <td scope="row" class="text-muted"><?php echo $dato["created_at"] ?></td>
        </tr>
    <?php
    }
    ?>
    </table>
    </div>
</div>
</section>
<?php
echo view("common/basicfooter")
?>

