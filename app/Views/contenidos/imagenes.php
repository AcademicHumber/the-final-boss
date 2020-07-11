<?php
echo view("common/basicheader", ["titulo" => "Imagenes"])
?>
<section class="content-header">
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h4>Administrador de Imagenes</h4>          
            </div>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body">
            <h5>Imagenes principales</h5>
            <hr>

            <?php
            if (!empty($topimgs)) {
                foreach ($topimgs as $img) {
                    if ($img != "." && $img != "..") {
                        ?>            
                        <div class="row">
                            <?php echo "<img class='col-lg-4 col-md-5 col-sm-12' src='" . base_url("topimgs/" . $img) . "' width = '200' />" ?>
                            <div class="col-lg-5 col-md-2 col-sm-12">
                                <?php echo "<a class='badge badge-light ' href='".base_url("content/deletetopimg/". $img)."' onclick=' return confirmar();''>Eliminar</a>" ?>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>
            <hr>
                <h5>Imagenes secundarias (dentro de los articulos)</h5>
    <hr>
                <?php
                foreach ($media_images as $img) {
                    if ($img != "." && $img != "..") {
                        ?>
                        <div class="row">
                            <?php echo "<img class='col-lg-4 col-md-6 col-sm-12' src='" . base_url("media_images/" . $img) . "' />" ?>      
                            <div class="col-lg-5 col-md-2 col-sm-12">                   
                                <?php echo "<a class='badge badge-light' href='".base_url("content/deletemediaimg/" . $img)."' onclick=' return confirmar();''>Eliminar</a>" ?>
                            </div> 
                        </div>
                        <?php
                    }
                }
                ?>

                <?php
            } else {
                
            }
            ?>

        </div>

    </div>

</section>
<?php
echo view("common/basicfooter")
?>

