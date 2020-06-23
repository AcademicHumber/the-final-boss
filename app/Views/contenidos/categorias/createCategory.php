<?php
echo view("common/basicheader", ["titulo" => "Crear categoría"]);
?> 
<h1>Crear categoría</h1>
<div>
    <?php
    echo view("common/categoriesform");
    ?>
</div>    
<?php
echo view("common/basicfooter")
?>
