<?php
echo view("common/basicheader", ["titulo" => "Crear página"])
?> 
<section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">
          <h4>Crear Artículo</h4>
        </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">
<div>
    <?php
    echo view("common/formpages")
    ?>

            </div>  
        </div>
    </div>
</section> 
<?php
echo view("common/basicfooter")
?>

