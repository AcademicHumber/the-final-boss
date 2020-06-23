<?php
echo view("common/basicheader", ["titulo" => $dato["titulo"]])
?>

<div class="caja">  
    <h1><?php echo $dato["encabezado"] ?></h1>
    <h3><?php
    // la variable opciones se volvera un arreglo que tiene el nombre y el slug de cada categoria
    foreach ($categorias as $categoria){
       $opciones[$categoria["id"]]["nombre"] = $categoria["nombre"];
       $opciones[$categoria["id"]]["slug"] = $categoria["slug"];               
    }
    // Este if es por si borraron la categoria pero no la publicacion, para evitar bugs xd
    if (!empty($opciones[$dato["categoria"]])){ 
        // En el texto va el nombre y en la url va el slug
        echo anchor("content/categoria/".$opciones[$dato["categoria"]]["slug"],$opciones[$dato["categoria"]]["nombre"]);
    }
    else{
        echo anchor("content/categoria/sin-categoria","Sin CAtegoría");
    }
    ?></h3>
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
     echo anchor("content/deleteComment/".$comentario["id"], "Eliminar");
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
echo "<pre>";
print_r($_POST);
echo "</pre>";
        
echo view("common/basicfooter");
?>