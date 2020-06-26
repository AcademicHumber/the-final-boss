<?php

// Comprobamos errores o exito en la consulta, luego de ejecutarla
print_r($exito);
echo form_open("");
echo form_hidden("cont[id]", $dato["id"]);
echo "<p>Nombre de la categoría:</p>";
echo form_input("cont[nombre]", $dato["nombre"]);
echo "<br>";
// condicional para los errrores
if (!empty($errores["nombre"])) {
    echo "<div class='formerror'>";
    echo $errores["nombre"];
    echo "</div>";
}
echo "<p>Slug de la categoría:</p>";
echo form_input("cont[slug]", $dato["slug"]);
echo "<br>";
echo "El «slug» es la versión amigable de la URL para el nombre."
 . " Suele estar en minúsculas y contiene solo letras, números y guiones.";
echo "<br>";
// condicional para los errrores
if (!empty($errores["slug"])) {   
    echo "<div class='formerror'>";
    echo $errores["slug"];
    echo "</div>";
}
echo "<p> Descripción de la categoria </p>";
echo form_textarea("cont[descripcion]", $dato["descripcion"], ["required" => 1]);
echo "<br>";
// condicional para los errrores
if (!empty($errores["descripcion"])) {   
    echo "<div class='formerror'>";
    echo $errores["descripcion"];
    echo "</div>";
}
echo "<br><br>";
echo form_submit("", "Actualizar");
echo "<br>";
echo "<br>";
echo anchor("content/vercategorias", "Ver todas las categorias");
?>
