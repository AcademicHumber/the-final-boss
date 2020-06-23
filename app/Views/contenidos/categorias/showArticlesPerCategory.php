<?php
echo view("common/basicheader", ["titulo"=> "Categoría: ".$datos[0]["nombre"]])
?> 
  
<div class="caja">

    <h1><?php echo "Categoría: ".$datos[0]["nombre"] ?></h1>    
    
      
    <h3>Articulos de la categoría</h3> 
    <?php
    foreach ($datos as $dato) {
        ?>
        
            <hr>
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
                echo anchor("content/articulo/" . $dato["id"], "Ver más");
           
            }
            //echo "post";
            //print_r($_POST);
            // print_r($datos);
            ?>
</div>
<?php
echo view("common/basicfooter")
?>