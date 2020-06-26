<?php
echo view("common/formheader", ["titulo" => "Editar artículo"])
?> 

	<section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
         <div class="card-title">
          <h4>Editar Artículo</h4>
        </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">
        	
<div>
    <?php
    echo view("common/formcontent")
    ?>

			</div> 
    	</div>
    </div>
</section>   
<?php
echo view("common/formfooter")
?>
