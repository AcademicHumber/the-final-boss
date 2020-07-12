<?php
echo view("common/basicheader", ["titulo" => $dato["titulo"]])
?>
<section class="container-fluid bg-white">
  <section class="content">
    <div class="d-flex justify-content-center">
      
     <div class="w-75">   
         <h1 class="d-flex justify-content-center"><?php echo $dato["encabezado"] ?></h1>
          <p class=""><?php echo $dato["cuerpo"] ?></p>    
     </div>

    </div> <br> <hr>
    <div class="d-flex d-flex justify-content-end">
        <div class="w-50">
<?php
echo '<h5>';
echo anchor("content/verpaginas", "Ver todas las paginas", ['class'=>'d-flex justify-content-center text-dark']);
echo view("common/basicfooter");
echo '</h5>';
?>  </div>
</div>
</section>
</section>