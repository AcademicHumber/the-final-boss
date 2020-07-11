 <?php echo view('common/basicheader', ["titulo" => "Lista de Usuarios"]);?>

  <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">
          <h4>Usuarios</h4>
        </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">
           <?php
//echo anchor("UserController/Registro", "Registra un usuario");

if (!empty($lista)) {

?>
<table class="table table-head-fixed text-nowrap table-hover  table-md  ">
    <tr>
        <th>Nombre de Usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Perfil</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    foreach ($lista as $listar) {
        ?>
        <tbody>

        <td><?php echo $listar["nombre_usuario"] ?>
        </td>
        <td><?php echo $listar["nombre"] ?></td>
        <td><?php echo $listar["apellido"] ?></td>
        <td><?php echo $listar["correo"] ?></td>
        <td><?php echo $listar["perfil"] ?></td>
        <td>
   <?php 

   echo anchor("UserController/editar?id=" . $listar["id"], "Editar",["class"=>"badge badge-secondary"]); ?>
           </td>
           <td>
    <?php echo anchor("UserController/borrar/" . $listar["id"], "Eliminar",["class"=>"badge badge-secondary", "onclick" => "return confirmar();"]); ?>
        </td>

    </tbody>
    <?php
}
?>
</table>

<?php  
} else {
?>
<h3>No hay usuarios registrados</h3>
<?php
}
?>

  </div>

</div>

</section>
      <?php echo view('common/basicfooter');?>