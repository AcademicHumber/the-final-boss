<?php
echo form_open_multipart("");

// Comprobamos errores o exito en la consulta, luego de ejecutarla
print_r($exito);
?>  
<br>
<br>
<table>
    <tr>
        <td><label>Titulo de la página   </label> &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;</td>    
        <td>
                <?php
                //input hidden que mandara el id del articulo, estara vacio si es crear
                //si esta vacio no afecta al momento de guardar y se crea un registro nuevo en la BD
                echo form_hidden("cont[id]", $dato["id"]);
                // input de texto, sus atributos son (nombre, valor, [atributos del input])
                echo form_input("cont[titulo]", $dato["titulo"], ["class"=>"form-control col-12", "required" => 1]);
                ?>
            </td>
                </tr>
            </table>
                <?php
                // condicional para los errrores
                if (!empty($errores["titulo"])){
                echo "<td>";
                echo "<div class='formerror text-danger'>";                
                echo $errores["titulo"];            
                echo "</div>";
                echo "</td>";
                }
                ?> 
 <br>       
<table>
    <tr>
        <td><label>Encabezado de la página</label>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
                <?php
                echo form_input("cont[encabezado]", $dato["encabezado"], ["class"=>"form-control","required" => 1]); ?>
        </td>
        </tr> 
        </table>    
                <?php
                // condicional para los errrores
                if (!empty($errores["encabezado"])){
                echo "<td>";
                echo "<div class='formerror text-danger'>";                
                echo $errores["encabezado"];                
                echo "</div>";
                echo "</td>";
                }
                ?>
        <br>
<label>Cuerpo de la página</label>
                <textarea name="cont[cuerpo]" id="editor1"><?php echo $dato["cuerpo"]; ?></textarea>
                
                <?php
                
                // condicional para los errrores
                if (!empty($errores["cuerpo"])){
                echo "<td>";
                echo "<div class='formerror text-danger'>";                
                echo $errores["cuerpo"];                
                echo "</div>";
                echo "</td>";
                }        
                ?>
                <br>
                <?php
                if (!empty($dato["titulo"])){
                    echo form_submit("", "Actualizar", ['class'=> 'btn btn-dark']);
                }
                else{
                    echo form_submit("", "Publicar", ['class'=> 'btn btn-dark']);
                }
                ?><br>
                <br>
<?php
// Cerrar formulario
echo form_close();

echo anchor("Content/verpaginas", "Ir a las paginas");
/*echo "<pre>";
print_r($_POST);
print_r($dato);
echo "</pre>";*/
?>  
