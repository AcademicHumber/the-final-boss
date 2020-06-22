<?php
echo view("common/formheader", ["titulo" => $dato["titulo"]])
?>

<div class="caja">
    <h1><?php echo $dato["encabezado"] ?></h1>
    <div>
    <p><?php echo $dato["cuerpo"] ?></p>       
    </div>
</div>    

<?php
echo anchor("content/verpaginas", "Ver todas las paginas");
echo view("common/formfooter");
?>