<?php
echo view("common/basicheader", ["titulo" => "Editar categoría"])
?>
<section class="container-fluid bg bg-white"> 
<section class="content-header">
<div class="col-md-10 card">
    <div class="table-responsive-sm">
    <div class="card-header">
      <h1>Editar categoría</h1>
      <h5>Nota: solo se puede editar la descripción</h5>
    </div>
   </div>
    <div class="table-responsive-sm table-responsive-md table-responsive-lg">
    <div class="card-body">
    <div class="form-group">
    <?php
    echo view("common/categoriesform")
    ?>
    </div>
    </div>
  </div>
    </div>
</div> 
</section>
</section>   
<?php
echo view("common/basicfooter");
