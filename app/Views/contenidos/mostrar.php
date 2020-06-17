<html>
    <head>
        <title>Articulos</title>
    </head>
    <body>
        <h1>Lista de artículos</h1>
        <a href="crear">Crear nuevo</a>
        <?php
        foreach ($datos as $dato){
        ?>
        <hr>
        <h3><?php echo $dato["titulo"] ?></h3>
        <h4><?php echo $dato["encabezado"] ?></h4>
        <p><?php echo $dato["cuerpo"] ?></p>
           
        <pre> 
        <?php
        }
       //echo "post";
       //print_r($_POST);
       // print_r($datos);
         ?>
        </pre>
    </body>

</html>
