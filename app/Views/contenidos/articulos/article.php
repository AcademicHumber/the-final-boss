<?php
echo view("common/formheader", ["titulo" => $dato["titulo"]])
?>

<div class="caja">  
    <h1><?php echo $dato["encabezado"] ?></h1>
    <div>
    <p><?php echo $dato["cuerpo"] ?></p>       
    </div>
</div>
<div>
    <h3>Comentarios</h3>
    <?php    
    foreach ($comentarios as $comentario):
    echo "<hr>";
    //Usuario
     echo "<h4>nombre de usuario</h4>";
    //Fecha
    echo "<p>".$comentario["created_at"]."<p>";
    //Cuerpo
    echo "<p>".$comentario["cuerpo"]."<p>";
    endforeach;
    echo "<hr>";
    ?>
</div>
<div>
    <h3>Deja tu comentario</h3>
    <?php
    echo form_open("");    
    echo form_textarea("cont[cuerpo]");
    // un hidden que llevara el id del articulo
    echo form_hidden("cont[articulo]",$dato["id"]);
    // hidden que llevara el id del usuario
    echo form_hidden("cont[usuario]","1");
    echo "<br>";
    echo form_submit("","Enviar Comentario");
    
    ?>
</div>

<?php
echo anchor("content/verarticulos", "Volver a todos los articulos");
echo view("common/formfooter");
?>