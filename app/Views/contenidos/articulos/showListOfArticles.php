<?php
echo view("common/basicheader", ["titulo"=> "Edicion"])
?>
<h1>Entradas</h1>
<a href="crearArticulo">Crear nuevo articulo</a><br>
<div>
    <?php
    foreach ($datos as $dato){
        echo "<hr>";
        echo "<div>";
        echo "<p>".$dato["titulo"]."</p>";
        echo "<p><a href='articulo/".$dato["id"]."'>Ver</a> -"
                . " <a href='editarArticulo/".$dato["id"]."'>Editar</a> -"
                . " <a href='deleteArticle/".$dato["id"]."'>Eliminar</a></p>";
        echo "<div style='float: rigth;'>Fecha de creación: ".$dato["created_at"]."</div>";
        echo "</div>";
    }
    ?>
    <hr>
</div>
<?php
echo view("common/basicfooter")
?>

