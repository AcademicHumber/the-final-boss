<?php
echo view("common/basicheader", ["titulo"=> "Edicion"])
?>
<h1>Comentarios</h1>
<div>
    <?php
    foreach ($datos as $dato){
        echo "<hr>";
        echo "<div>";
        echo "<p><strong>Autor: </strong>".$dato["usuario"]."</p>";
        echo "<p><strong>Comentario: </strong></p>";
        echo "<p>".$dato["cuerpo"]."</p>";
        echo "<p><a href='articulo/".$dato["articulo"]."'>Ver</a> -"
                . " <a href='editComment/".$dato["id"]."'>Editar</a> -"
                . " <a href='deleteComment/".$dato["id"]."'>Eliminar</a></p>";
        echo "<p><strong>En respuesta a:</strong></p>";
        echo "<p>".$dato["titulo"]."</p>";
        echo "<div style='float: rigth;'><strong>Fecha de creación: </strong>".$dato["created_at"]."</div>";
        echo "</div>";
    }
    ?>
    <hr>
</div>
<?php
echo view("common/basicfooter")
?>

