<?php
echo view("frontend/frontendheader");       
?> 

<section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">

        <div class="card-body">
<br><br><br>
<div class="caja" >  
    <h2 class=" text-center"><?php echo $dato["encabezado"] ?></h2>
    <h4 >Categoría: <?php
    // la variable opciones se volvera un arreglo que tiene el nombre y el slug de cada categoria
    foreach ($categorias as $categoria){
       $opciones[$categoria["id"]]["nombre"] = $categoria["nombre"];
       $opciones[$categoria["id"]]["slug"] = $categoria["slug"];               
    }
    // Este if es por si borraron la categoria pero no la publicacion, para evitar bugs xd
    if (!empty($opciones[$dato["categoria"]])){ 
        // En el texto va el nombre y en la url va el slug
        echo anchor("content/categoria/".$opciones[$dato["categoria"]]["slug"],$opciones[$dato["categoria"]]["nombre"],["class"=> "badge badge-light"]);
    }
    else{
        echo anchor("content/categoria/sin-categoria","Sin CAtegoría");
    }
    ?></h4>
    <div>
    <p><?php echo $dato["cuerpo"] ?></p>       
    </div>
</div>


 <h3>Comentarios</h3>
<div style="line-height:35px" >
   <div>

     <?php foreach ($comentarios as $comentario):?>
   
         <table >
         <hr>
        <tr>
            <td><h5><?php echo $comentario["nombre_usuario"];?></h5></td>
        </tr>
        <td><?php echo $comentario["created_at"];?></td>
        <tr>
            <td ><?php echo $comentario["cuerpo"];?></td> 
        </tr>
     

     <?php endforeach;?>
        </table>
    </div>
</div>
<br>

<div>
    <h3>Deja tu comentario</h3>
    <?php
  echo form_open("");    
    echo form_textarea("cont[cuerpo]");
    // un hidden que llevara el id del articulo
    echo form_hidden("cont[articulo]",$dato["id"]);
    // hidden que llevara el id del usuario
    echo form_hidden("cont[usuario]", $_SESSION["id"]);
    echo "<br>";
    echo form_submit("","Enviar Comentario",["class"=>"btn btn-dark"]);
   echo form_close();
    ?>
            </div>
        </div>
    </div>
    <br><br>
</section>



<?php
echo view("frontend/frontendfooter");
?>

