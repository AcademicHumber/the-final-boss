<?php
echo view("common/formheader", ["titulo" => "Crear página"])
?> 
<section class="container-fluid bg bg-white"> 
<section class="content-header">
<div class="col-md-10 card">
    <div class="card-header">
<h1>Crear páginas</h1>
    </div>
    <div class="card-body">
    <div class="form-group">
    <?php
    echo view("common/formpages")
    ?>
    </div>
    </div>
    </div>
</div> 
</section>
</section> 
<?php
echo view("common/formfooter")
?>

