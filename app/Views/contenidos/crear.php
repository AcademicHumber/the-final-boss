<html>
    <head>
        <title>Crear Articulo</title>
    </head>
    <body>
        <h1>Crear artículo</h1>
        <div>
            <?php
            //Documentacion:
            // https://codeigniter.com/user_guide/helpers/form_helper.html?highlight=form#loading-this-helper
            //
            // Codigo de apertura de fomulario, equivalente a
            // <form action="Content/mostrar" method="POST" enctype="multipart/form-data">            
            echo form_open_multipart("Content/crear");
            
            // Comprobamos errores o exito en la consulta, luego de ejecutarla
            print_r($exito);
            ?>            
            <table>              
                <tbody>                    
                    <tr>
                        <td><label>Titulo de la pàgina</label></td>
                        <td>                            
                            <?php
                            // input de texto, sus atributos son (nombre, valor, [atributos del input])
                            echo form_input("cont[titulo]", "", ["required" => 1]);

                            
                            // equivalente a <input type="text" name="cont[titulo]" value="" required="1">
                            ?> 
                        </td>                       
                    </tr>
                    <tr>
                        <td><label>Encabezado de la pàgina</label></td>
                        <td>
                            <?php
                            echo form_input("cont[encabezado]", "", ["required" => 1]);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Cuerpo de la pàgina</label></td>
                        <td>
                           <?php
                           echo form_textarea("cont[cuerpo]", "", ["required" => 1]);
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                           <?php
                           echo form_submit("", "Crear Artículo");
                           ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
           // Cerrar formulario
            echo form_close();            
            
            // Generar un enlace hacia la lista con la funcion anchor(url, texto, [atributos])
                        
            echo anchor("Content/mostrar", "Ir a los articulos", ["class" => "boton"]);
            
            // La funcion anchor crea un enlace a una pagina determinada, en este caso es equivalente a: 
            // <a href="Content/mostrar" class="boton">Ir a los articulos</a>
            ?>
            
        </div>    

        
    </body>
</html>

