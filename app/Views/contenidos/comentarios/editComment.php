<?php
echo view("common/basicheader", ["titulo" => "Editar Comentario"]);
?> 
<h1>Editar Comentario</h1>
<div>
    <?php
    // Comprobamos errores o exito en la consulta, luego de ejecutarla
    print_r($exito);
    echo "<br>";
    echo form_open("");
    echo "<br>";
    echo "<p> Cuerpo del comentario </p>";
    echo "<br>";
    echo form_textarea("cuerpo", $dato["cuerpo"], ["required" => 1]);
    echo "<br>";
    echo form_submit("", "Actualizar");
    echo "<br>";
    ?>
</div>    
<?php
echo anchor("content/vercomentarios", "Volver a los comentarios");
echo view("common/basicfooter");
?>