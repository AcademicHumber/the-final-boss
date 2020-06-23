<?php
echo view("common/basicheader", ["titulo"=> "Edicion"])
?>
<h1>Categorías</h1>
<a href="crearCategoria">Crear nueva categoria</a><br>
<div>
    <?php
    foreach ($datos as $dato){
        echo "<hr>";
        echo "<div>";
        echo "<p><strong>Nombre: </strong>".$dato["nombre"]."</p>";
        echo "<p><strong>Descripción: </strong></p>";
        echo "<p>".$dato["descripcion"]."</p>";
        echo " <a href='editCategory/".$dato["id"]."'>Editar</a> -"
                . " <a href='deleteCategory/".$dato["id"]."'>Eliminar</a></p>";        
        echo "<div style='float: rigth;'><strong>Fecha de creación: </strong>".$dato["created_at"]."</div>";
        echo "</div>";
    }
    ?>
    <hr>
</div>
<?php
echo view("common/basicfooter")
?>

