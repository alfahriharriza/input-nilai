<!-- jQuery -->
<script src="<?= base_url('vendor/adminlte/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('vendor/adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('vendor/adminlte/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('vendor/adminlte/'); ?>dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url('vendor/adminlte/'); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('vendor/adminlte/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function(){
      $('#table1').DataTable()
    })
</script>

<script>
	base_url = '<?= base_url(); ?>';

    $("#alert_act").fadeOut(5000);

	$("#kelas").change(function () {
    id_kelas = $("#kelas").val();
    $.ajax({
     url: base_url+'nilai/get_siswa',
     type: 'POST', 
     dataType: 'json', 
     data: {id_kelas: id_kelas}, 
     success : function (data) {
      option = "<option value=''>Pilih Siswa</option>";
      $.each(data, function(i, item) {
          option += '<option value="'+item.id_siswa+'">'+item.nama+'</option>';
      });
      $("#data_siswa").html(option);
     }
    })
  })
</script>

</body>
</html>