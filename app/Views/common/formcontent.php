<?php
echo form_open_multipart("");

// Comprobamos errores o exito en la consulta, luego de ejecutarla

if ($exito=="Se guardó todo correctamente") { ?>
     <p class="alert alert-success alert-dismissable col-6" >
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
            echo $exito;
       }
       ?>
    </p>
<?php 
if ($exito=="Hubieron errores al guardar"){
    ?>
      <p class="alert alert-danger alert-dismissable col-6" >
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
            echo $exito;
       }
       ?>
    </p>

                      
<table style="line-height: 35px;">              
    <tbody>                    
        <tr>
            <td><label>Titulo de la publicación</label></td>
            <td>                            
                <?php                         
                
                //input hidden que mandara el id del articulo, estara vacio si es crear
                //si esta vacio no afecta al momento de guardar y se crea un registro nuevo en la BD
                echo form_hidden("cont[id]", $dato["id"]);

                // input de texto, sus atributos son (nombre, valor, [atributos del input])
                echo form_input("cont[titulo]", $dato["titulo"], ["required" => 1]);

                // condicional para los errrores
                if (!empty($errores["titulo"])){
                echo "<td>";
                echo "<div class='formerror'>";                
                echo $errores["titulo"];            
                echo "</div>";
                echo "</td>";
                
                }
                
                ?> 
            </td>                       
        </tr>
        <tr>
            <td><label>Encabezado de la publicación </label></td>
            <td>               
                <?php
                echo form_textarea("cont[encabezado]", $dato["encabezado"], ["style" => "height: 71px", "required" => 1]);
                
                // condicional para los errrores
                if (!empty($errores["encabezado"])){
                echo "<td>";
                echo "<div class='formerror'>";                
                echo $errores["encabezado"];                
                echo "</div>";
                echo "</td>";
                }
                ?> 
                
            </td>
        </tr>    
        <tr>
            <td><label>Imagen principal de la publicación </label> <br>
                <label>(Sugerido: 700x340)</label></td>
            <td>                
                <?php               
                echo form_upload("img_principal", "", ["accept"=>"image/png, image/jpeg"]);
                
                // condicional para los errrores
                if (!empty($errores["encabezado"])){
                echo "<td>";
                echo "<div class='formerror'>";                
                echo $errores["encabezado"];                
                echo "</div>";
                echo "</td>";
                }
                ?> 
                
            </td>
        </tr>
        <tr>
            <td><label>Categoría de la publicación </label></td>
            <td>                                
                <?php
                // crear el arreglo relacionando ids y nombres de categorias
                foreach ($categorias as $categoria){
                    $opciones[$categoria["id"]] = $categoria["nombre"];
                }                
                echo form_dropdown("cont[categoria]",$opciones, !empty($dato["categoria"])? $dato["categoria"] : "1");                  
                ?>
            </td>
        </tr>
        <tr>
            <td><label>Cuerpo de la publicación</label></td>

                 <td>
                <textarea name="cont[cuerpo]" id="editor1"><?php echo $dato["cuerpo"]; ?></textarea>
                
                <?php
                
                // condicional para los errrores
                if (!empty($errores["cuerpo"])){
                echo "<td>";
                echo "<div class='formerror'>";                
                echo $errores["cuerpo"];                
                echo "</div>";
                echo "</td>";
                }
                
                //Se almacena en un hidden la informacion del ultimo usuario que trabajo con el documento
                echo form_hidden("cont[usuario_creador]", $_SESSION["id"]);    
                ?>
            </td>
        </tr>         
        <tr>
            <td></td>
            <td>
                <br>
                <?php
                if (!empty($dato["titulo"])){
                    echo form_submit("", "Actualizar", ["class"=>"btn btn-dark"]);
                }
                else{
                    echo form_submit("", "Publicar", ["class"=>"btn btn-dark"]);
                }
                
                ?>
            </td>
        </tr>
    </tbody>
</table>
<?php
// Cerrar formulario
echo form_close();

echo anchor("content/verarticulos", "Ir a los articulos", ['class' => 'badge badge-dark']);

/*echo "<pre>";
print_r($_POST);
print_r($dato);
echo "</pre>";*/
?>  
