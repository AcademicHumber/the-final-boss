<!–FORMULARIO PARA AÑADIR USUARIO–>
<?php
echo view("common/basicheader", ["titulo" => "Registro"]);
echo form_open("");
?>
<section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">
          <h4>Registrar Usuario</h4>
        </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

                <div class="card-body">
                    <h5> <?php echo $exito;  ?></h5>
                  <div class="form-group">
                    <label>Nombre de Usuario</label>
                    <input type="text" class="form-control" name="user[nombre_usuario]" id="nombre_usuario" placeholder="Enter username" required="1" value="<?php set_value('nombre_usuario')?>">
                     <?php
                    if (isset($errores["nombre_usuario"])) {
                      echo $errores["nombre_usuario"];
                  }?>
                  </div>

                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="user[nombre]" id="nombre" placeholder="Enter name" required="1" value="<?php set_value('nombre') ?>">
                     <?php
                    if (isset($errores["nombre"])) {
                      echo $errores["nombre"];
                  }?>
                  </div>

                   <div class="form-group">
                    <label >Apellido</label>
                    <input type="text" class="form-control" name="user[apellido]" id="apellido" placeholder="Enter lastname" required="1" value="<?php set_value('apellido')?>" >
                      <?php
                    if (isset($errores["apellido"])) {
                      echo $errores["apellido"];
                  }?>
                  </div>

                   <div class="form-group">
                    <label>Correo electrónico</label>
                    <input type="email" class="form-control" name="user[correo]" id="correo" placeholder="Enter email" required="1" value="<?php set_value('correo')?>" >
                     <?php
                    if (isset($errores["correo"])) {
                      echo $errores["correo"];
                  }?>
                  </div>

                   <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="user[contrasena]" id="contrasena" placeholder="Enter password" required="1" value="<?php set_value('contrasena')?>" >
                      <?php
                    if (isset($errores["contrasena"])) {
                      echo $errores["contrasena"];
                  }?>
                  </div>

                   <div class="form-group">
                    <label>Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="user[contrasena_confir] " id="contrasena_confir" placeholder="Confirm password" required="1" value="<?php set_value('contrasena_confir')?>">
            
                   <?php
                    if (isset($errores["contrasena_confir"])) {
                      echo $errores["contrasena_confir"];
                  }?>
               
                 
                  </div>
                  <div class="form-group">
                    <label>Perfil</label>
                    <select name="user[perfil]" class="form-control">
                      <option value="administrador">Administrador</option>
                      <option value="editor">Editor</option>
                      <option value="autor">Autor</option>
                      <option value="contribuidor">Contribuidor</option>
                    </select>
                   
                  </div>                        
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-dark">Crear Cuenta</button>
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

