<?php
echo view("common/basicheader", ["titulo"=> "Edicion de Comentarios"])
?>
<section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">
          <h4>Comentarios</h4>
        </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>



<?php if (!empty($datos)) {
 ?>

 <table class="table table-head-fixed text-nowrap table-md">
    <tr>        
        <th>Autor</th>
        <th>Comentario</th>
        <th>Acciones</th>
        <th>En respuesta a</th>
        <th>Fecha de creación</th>
    </tr>
     <?php
    foreach ($datos as $dato){
        ?>
       <tbody>
            <td><?php  echo $dato["nombre"] ?></td>
            <td><?php  echo "<p>".$dato["cuerpo"]."</p>"; ?></td>
            <td><?php  echo "<p><a class='badge badge-light' href='articulo/".$dato["articulo"]."'>Ver</a> "
                    . " <a class='badge badge-light' href='editComment/".$dato["id"]."'>Editar</a> "
                    . " <a class='badge badge-light' href='deleteComment/".$dato["id"]."'>Eliminar</a></p>"; ?></td>
            <td><?php echo "<p>".$dato["titulo"]."</p>"; ?></td>
            <td><?php echo $dato["created_at"] ?></td>
         <tbody>
              <?php
}
?>
    </table>
<?php  
} 
else 
{
?>
<h3>No hay comentarios</h3>
<?php
}
?>

        </div>

    </div>

</section>
<?php
echo view("common/basicfooter")
?>

