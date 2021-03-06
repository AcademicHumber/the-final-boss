<?php
echo view("common/basicheader", ["titulo" => "Editar Usuario"]);
   echo form_open_multipart('');
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
          <h4>Editar Usuario</h4>
        </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
      </div>
           <div class="table-responsive-sm table-responsive-md table-responsive-lg">
                <div class="card-body col-6">
                  <?php
                     if ($exito=="El usuario se modificó correctamente") { ?>
                         <p class="alert alert-success alert-dismissable" >
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <?php
                                  echo $exito;
                             }
                             ?>
                          </p>
                      <?php 
                      if ($exito=="Hubo problemas para registrar al usuario"){
                          ?>
                            <p class="alert alert-danger alert-dismissable" >
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <?php
                                  echo $exito;
                             }
                             ?>
                          </p>
               
                  <div class="form-group">
                    <label>Nombre de Usuario</label>
                    <input type="text" class="form-control" name="user[nombre_usuario]" placeholder="Enter username" required="1" disabled="1" value="<?php echo $modificar["nombre_usuario"] ?>">
                     <?php

                    if (isset($errores["nombre_usuario"])) {
                      echo $errores["nombre_usuario"];
                  }?>
                  </div>

                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="user[nombre]" placeholder="Enter name" required="1" value="<?php echo $modificar["nombre"] ?>">
                     <?php
                    if (isset($errores["nombre"])) {
                      echo $errores["nombre"];
                  }?>
                  </div>

                   <div class="form-group">
                    <label >Apellido</label>
                    <input type="text" class="form-control" name="user[apellido]" placeholder="Enter lastname" required="1" value="<?php echo $modificar["apellido"] ?>">

                      <?php
                    if (isset($errores["apellido"])) {
                      echo $errores["apellido"];
                  }?>
                  </div>

                   <div class="form-group">
                    <label>Correo electrónico</label>
                    <input type="email" class="form-control" name="user[correo]" placeholder="Enter email" required="1" disabled="1" value="<?php echo $modificar["correo"] ?>">
                     <?php
                    if (isset($errores["correo"])) {
                      echo $errores["correo"];
                  }?>
                  </div>

                   
                  <div class="form-group">
                    <label>Perfil</label>
                    <?php
                        echo form_dropdown("user[perfil]", [
                            "administrador" => "Administrador",
                            "editor" => "Editor",
                            "autor" => "Autor",
                            "contribuidor" => "Contribuidor",
                            "suscriptor" => "Suscriptor"
                            ], $modificar["perfil"], ["required" => 1, "class"=> "form-control"]);
                        ?>
                   
                  </div>
                <div class="form-group">
                              <button type="submit" class="btn btn-dark">Editar</button>
                  </div>
                  </div>
                </div>
          </div>

</section>
                    <?php
                        echo form_close();
                    ?>




<?php
echo view("common/basicfooter");
?>


