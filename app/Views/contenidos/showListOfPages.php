<?php
echo view("common/basicheader", ["titulo"=> "Edicion"])
?>
<h1>Páginas</h1>
<a href="crearPagina">Crear nueva pagina</a><br>
<div>
    <?php
    foreach ($datos as $dato){
        echo "<hr>";
        echo "<div>";
        echo "<p>".$dato["titulo"]."</p>";
        echo "<p><a href='pagina/".$dato["id"]."'>Ver</a> - "
                . "<a href='editarPagina/".$dato["id"]."'>Editar</a> - "
                . "<a href='deletePage/".$dato["id"]."'>Eliminar</a></p>";
        echo "<div style='float: rigth;'>Fecha de creación: ".$dato["created_at"]."</div>";
        echo "</div>";
    }
    ?>
    <hr>
</div>
<?php
echo view("common/basicfooter")
?>

