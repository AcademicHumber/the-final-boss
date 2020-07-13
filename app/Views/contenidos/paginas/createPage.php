<?php
echo view("common/basicheader", ["titulo" => "Crear página"])
?> 
<section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="table-responsive-sm">
        <div class="card-header">
          <div class="card-title">
          <h4>Crear Página</h4>
        </div>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
         </div>
        <div class="table-responsive-sm table-responsive-md table-responsive-lg">
        <div class="card-body">
<div>
    <?php
    echo view("common/formpages")
    ?>

            </div>  
        </div>
      </div>
    </div>
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

