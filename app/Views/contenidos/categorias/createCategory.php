<?php
echo view("common/basicheader", ["titulo" => "Crear categoría"],['class' => 'bg-ligth']);
?>
<section class="container-fluid bg-white">  
<section class="content-header">
<div class="col-md-6 card">
<div class="card-header">
<h1>Crear categoría</h1>
</div>
    <div class="card-body">
        <div class="form-group">
    <?php
    echo view("common/categoriesform");
    ?>
        </div>
    </div>
</div> 
</section>
</section>
<?php
echo view("common/basicfooter");
