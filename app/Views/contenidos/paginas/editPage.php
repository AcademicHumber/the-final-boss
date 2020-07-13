<?php
echo view("common/basicheader", ["titulo" => "Editar página"])
?> 
<section class="container-fluid bg bg-white"> 
<section class="content-header">
<div class="col-md-10 card">
     <div class="table-responsive-sm">
    <div class="card-header">
    <h1>Editar página</h1>
    </div>
     </div>
     <div class="table-responsive-sm table-responsive-md table-responsive-lg">
    <div class="card-body">
    <div class="form-group">
    <?php
    echo view("common/formpages")
    ?>
    </div>
    </div>
</div>
    </div>
</div> 
</section>
</section> 
<script>

   CKEDITOR.replace( 'editor1' ,{           
       filebrowserUploadUrl: '<?php echo base_url("content/procesar_imagen")?>',
       filebrowserWindowWidth: '1000',
       filebrowserWindowHeight: '700'
   });    

</script>
<?php
echo view("common/basicfooter")
?>