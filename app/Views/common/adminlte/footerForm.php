
                
                <div class="card-body">                            

                    <div class="form-group row">
                    <!-- /.card-header -->


                    <?php if ($exito == "Usuario no válido") { ?>
                        <p class=" alert alert-danger text-white " style="text-align: center; ">
                            <?php
                            echo $exito;
                        }
                        ?>

                    </p>

                   </div>
                   <div class="input-group mb-3">
                       <input type="email" class="form-control" name="correo" required="" placeholder="Email">                        
                       <div class="input-group-append">
                           <div class="input-group-text">
                               <span class="fas fa-envelope"></span>
                           </div> 
                       </div>                      
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="contrasena" required="" placeholder="Password">                        
                       <div class="input-group-append">
                           <div class="input-group-text">
                               <span class="fas fa-lock"></span>
                           </div> 
                       </div>                                               
                    </div>
                    <?php
                    /*
                    <div class="row">
                        <div class="col-sm-10">                           
                                
                                echo "<br>";
                                echo anchor("UserController/recuperarContra", "¿Olvidaste tu contraseña?");
                                                          
                        </div>
                    </div>
                </div>                   
                     */
                ?>
                 <div class="card-footer">
                     <div class="row">
                         <div class="col">
                            <button type="submit" class="btn btn-info">Sign in</button>
                        </div>
                    </div>
                </div>
                <?php
                        echo form_close();
                ?>
               
         </div>
        </div>  
        
       
        <!-- jQuery -->
        <script src="<?php echo base_url('adminlte'); ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url('adminlte'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="<?php echo base_url('adminlte'); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                bsCustomFileInput.init();
            });
        </script>
    </body>
</html>
