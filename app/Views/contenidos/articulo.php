<?php
echo view("common/formheader", ["titulo" => $dato["titulo"]])
?>

<div class="caja">
    <?php
    if ($creador):
    ?>
    <nav>
        <ul>
            <li><?php echo anchor("content/edit/".$dato["id"], "Editar");?></li>
            <li><?php echo anchor("content/delete/".$dato["id"], "Eliminar");?></li>
        </ul>
    </nav>
    <?php
    endif;
    ?>
    <h1><?php echo $dato["encabezado"] ?></h1>
    <div>
    <p><?php echo $dato["cuerpo"] ?></p>       
    </div>
</div>    

<?php
echo anchor("content/articulos", "Volver a todos los articulos");
echo view("common/formfooter");
?>