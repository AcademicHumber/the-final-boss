<?php
echo form_open_multipart("");

// Comprobamos errores o exito en la consulta, luego de ejecutarla
print_r($exito);
?>            
<table>              
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
            <td><label>Encabezado de la publicación</label></td>
            <td>
                <?php
                echo form_input("cont[encabezado]", $dato["encabezado"], ["required" => 1]);
                
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
            <td><label>Cuerpo de la publicación</label></td>
        </tr>    
        <tr>
            <td></td>
            <td>
                <textarea id="summernote" name="editordata" name="cont[cuerpo]"></textarea>

                <?php
                
                // condicional para los errrores
                if (!empty($errores["cuerpo"])){
                echo "<td>";
                echo "<div class='formerror'>";                
                echo $errores["cuerpo"];                
                echo "</div>";
                echo "</td>";
                }        
                ?>
            </td>
        </tr>     
        <tr>
            <td></td>
            <td>
                <?php
                if (!empty($dato["tituo"])){
                    echo form_submit("", "Actualizar");
                }
                else{
                    echo form_submit("", "Publicar");
                }
                
                ?>
            </td>
        </tr>
    </tbody>
</table>
<?php
// Cerrar formulario
echo form_close();
echo anchor("Content/articulos", "Ir a los articulos");
echo "<pre>";
print_r($dato);
echo "</pre>";
?>  
