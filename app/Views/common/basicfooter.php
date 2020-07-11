 </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('adminlte'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('adminlte'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('adminlte'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('adminlte'); ?>/dist/js/demo.js"></script>
<script>

   CKEDITOR.replace( 'editor1' ,{           
       filebrowserUploadUrl: '<?php echo base_url("content/procesar_imagen")?>',
       filebrowserWindowWidth: '1000',
       filebrowserWindowHeight: '700'
   });    

</script>

      <script type="text/javascript">
        function confirmar(){
          if (confirm("¿Está seguro que desea eliminar?")) {
            alert("Eliminado")
            return true;
          }
          else
          {
            alert("No se eliminó")
            return false;
          }
        }
      </script>
</body>
</html>
