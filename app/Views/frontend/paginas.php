<?php
echo view("frontend/frontendheader");

         
  ?>       
<section class="container-fluid bg-white">
  <section class="content">
    <div class="d-flex justify-content-center">   

     <div class="">  
     <br><br><br><br>    
    
         <h1 class="d-flex justify-content-center"><?php echo $dato["encabezado"] ?></h1><br>
          <div class="">
          	<?php echo $dato["cuerpo"] ?>
          </div>
 <br> <br>
     </div>
    </div> 
 
</section>
</section>
<?php

echo view("frontend/frontendfooter");

?>

