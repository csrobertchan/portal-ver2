<?php 
session_start();
include ('includes/main_pg/login_ver.php');
include ('includes/main_pg/header.php');
$page="payslip";
?>
<!DOCTYPE html>
<html lang="en">

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include('includes/main_pg/aside.php')?>
<?php include('includes/main_pg/nav.php')?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payslip</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="main.php">Main</a></li>
              <li class="breadcrumb-item active">Payslip List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="card">
        <?php 
          $query = "SELECT * FROM opis WHERE first_name like '%$fname%' AND last_name like '%$lname%'";
          $result = mysqli_query($conn, $query);
        ?>
        <div class="card-header">
          <h3 class="card-title">List of your Payslip</h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Payslip Period</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php  
                    while($row = mysqli_fetch_array($result))  
                    {  
                ?>
                <tr>
                  <td><?php echo $row["id"]; ?></td>
                  <td><?php echo $row["show_stat"]; ?></td>
                  <td><a href="includes/payslip/payslip1.php?id=<?php echo $row['id']?>" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                  <?php } ?>                
                </tr>
                </tbody> 
            </table>
        </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
          <div class="modal-content" id="content-data">

          </div>
          <!-- /.modal-content -->
      </div>
      <div class="modal-footer">     
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>                
      <!-- /.modal-dialog -->
  </div>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include('includes/main_pg/footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel"],
      order: [[0, 'desc']]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(document).on('click','#getPayslip',function(e){
      e.preventDefault();
      var per_id=$(this).data('id');
      //alert(per_id);
      $('#content-data').html('');
      $.ajax({
          url:'includes/payslip/payslip1.php',
          type:'POST',
          data:'id='+per_id,
          dataType:'html'
      }).done(function(data){
          $('#content-data').html('');
          $('#content-data').html(data);
      });
  });
  
</script>
</body>
</html>
