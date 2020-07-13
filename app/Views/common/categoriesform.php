<?php

// Comprobamos errores o exito en la consulta, luego de ejecutarla

echo form_open("");
if ($exito=="Actualizado correctamente") { ?>
     <p class="alert alert-success alert-dismissable col-6" >
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
            echo $exito;
       }
       ?>
    </p>
<?php 
if ($exito=="Hubieron errores al actualizar"){
    ?>
      <p class="alert alert-danger alert-dismissable col-6" >
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
            echo $exito;
       }
       ?>
    </p>   
 <?php  
 if ($exito=="Se guardó todo correctamente") { ?>
     <p class="alert alert-success alert-dismissable" >
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
            echo $exito;
       }
       ?>
    </p>
<?php 
if ($exito=="Hubieron errores al guardar"){
    ?>
      <p class="alert alert-danger alert-dismissable" >
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
            echo $exito;
       }
       ?>
    </p>
 <?php
echo form_hidden("cont[id]", $dato["id"]);

echo "<br>";
echo "<p><strong>Nombre de la categoría</strong></p>";
echo form_input("cont[nombre]", $dato["nombre"],['class'=> 'form-control', 'placeholder' => 'Category name']);
// condicional para los errrores
if (!empty($errores["nombre"])) {
    echo "<div class='formerror text-danger'>";

    echo $errores["nombre"];
    echo "</div>";
    
}

echo '<br>';
echo "<p><strong>Slug de la categoría:</strong></p>";
echo form_input("cont[slug]", $dato["slug"], ['class'=> 'form-control', 'placeholder' => 'Category slug']);

echo "<p class='text-muted'>El «slug» es la versión amigable de la URL para el nombre."; echo "<br>";
echo " Suele estar en minúsculas y contiene solo letras, números y guiones.</p>";

// condicional para los errrores
if (!empty($errores["slug"])) {   
    echo "<div class='formerror text-danger'>";
    echo $errores["slug"];
    echo "</div>";
}

echo "<br>";
echo "<p><strong>Descripción de la categoria </strong></p>";
echo form_textarea("cont[descripcion]", $dato["descripcion"],['class'=> 'form-control'], ["required" => 1]);

// condicional para los errrores

if (!empty($errores["descripcion"])) { echo "<div class='formerror text-danger'>";
    echo $errores["descripcion"];
    echo "</div>";
}
echo "<br><br>";
echo form_submit("", "Guardar", ['class'=> 'btn btn-dark']);
echo "<br>";
echo "<br>";
echo anchor("content/vercategorias", "Ver todas las categorias", ['class' => 'badge badge-dark']);

