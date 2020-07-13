
                
                <div class="card-body"> 
                    <?php
                    echo anchor("", "ir a la pantalla principal", ["class" => ""]);
                    ?>

                    <div class="form-group row-fluid">
                    <!-- /.card-header -->


                    <?php if ($exito == "Usuario no válido") { ?>
                        <p class="alert alert-danger alert-dismissable" >
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
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
                 <div class="card-footer">
                     <div class="row">
                         <div class="col">
                            <button type="submit" class="btn btn-primary">Ingresar</button>                            
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
