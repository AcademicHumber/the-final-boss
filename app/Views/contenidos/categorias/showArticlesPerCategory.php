<?php
echo view("common/basicheader", ["titulo"=> "Categoría: ".$datos[0]["nombre"]])
?> 

<section class="content-header"></section>
<section class="content">
<div class="card">
    <div class="card-header">
    <h1><?php echo "Categoría: ".$datos[0]["nombre"] ?></h1> 
    <h3>Articulos de la categoría</h3> 
    </div>
    <div class="card-body">
    <?php
    foreach ($datos as $dato) {
        ?>
            <h3><?php echo $dato["titulo"] ?></h3>
            <h4><?php echo $dato["encabezado"] ?></h4>
            <div>
                <?php
                // Condicionante para que se vea solo una
                // parte del cuerpo cuando este es muy largo

                if (strlen($dato["cuerpo"]) > 500) {                                      
                    echo substr($dato["cuerpo"], 0, 500) . "...";
                } else {
                    echo $dato["cuerpo"];
                    echo "";
                }
                ?>
            </div> 
                <?php
                echo '<h5>';
                echo anchor("content/articulo/" . $dato["id"], "Ver más", ['class' => 'card-link']);
                echo '</h5>';
            }
            //echo "post";
            //print_r($_POST);
            // print_r($datos);
            ?>
    </div>
</div>
</section>
<?php
echo view("common/basicfooter")
?>