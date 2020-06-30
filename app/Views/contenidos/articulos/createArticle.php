<?php
echo view("common/formheader", ["titulo" => "Crear artículo"])
?> 
<section class="container-fluid bg bg-white"> 
    <section class="content-header">
    <div class="col-md-12 card">
    <div class="card-header">
<h1>Crear artículo</h1>
 </div>
    <div class="card-body">
        <div class="form-group">
    <?php
    echo view("common/formcontent")
    ?>
    </div>
    </div>
</section>
</section> 
</div>    
<?php
echo view("common/formfooter");
