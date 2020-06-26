<?php
echo view("common/basicheader", ["titulo"=> "Articulos"])
?>
<section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">
          <h4>Entradas</h4>
        </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">


<?php 
if (!empty($datos)) {

?>
<table class="table table-head-fixed text-nowrap table-md">
    <tr>
        <!-----PREG si habrá autor y categoria--->
        <th>Título</th>
        <th>Ver </th>
        <th>Editar</th>
        <th>Eliminar</th>
        <th>Fecha de creación</th>
    </tr>
    <?php
    foreach ($datos as $dato) {
        ?>
        <tbody>

        <td><?php echo $dato["titulo"] ?></td>
        <td><?php echo "<a class='badge badge-light' href='articulo/".$dato["id"]."'>Ver</a>"?></td>
        <td><?php echo "<a class='badge badge-light' href='editArticulo/".$dato["id"]."'>Editar</a>" ?></td>
        <td><?php echo " <a class='badge badge-light' href='deleteArticle/".$dato["id"]."'>Eliminar</a>" ?></td>
        <td><?php echo $dato["created_at"]?></td>

    </tbody>
       <?php
}
?>
  </table>
<?php  
} 
else 
{
?>
<h3>No hay usuarios registrados</h3>
<?php
}
?>

        </div>

    </div>

</section>
<?php
echo view("common/basicfooter")
?>

