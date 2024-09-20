<?php
$con=mysqli_connect('db','root','hindikoalam','portal');
if(isset($_REQUEST['id'])){
  $id=intval($_REQUEST['id']);
  $sql="select * from box_db WHERE id=$id";
  $run_sql=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($run_sql)){
      $box_no=$row[1];
  }
?>
<input type="text" value="<?php echo $box_no; ?>" name="box_no"  />



<?php } ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<style>
td.details-control {
    background: url('assets/dist/js/pages/datatable/details_open.png') no-repeat center center;
    cursor: pointer;
}

tr.shown td.details-control {
    background: url('assets/dist/js/pages/datatable/details_close.png') no-repeat center center;
}
</style>

<?php
$output = '';  

      $query = "SELECT * FROM poo_encoding WHERE box_no = '$box_no'"; 
      $result = mysqli_query($con, $query);  
      $output .= '
      <div class="table-responsive m-t-15">  
      <div class="modal-header">
				   <div class="box-header">
						<h2 class="box-title">View Records in Transmittal Box No: '.$box_no.'</b></h2>
				   </div>
				</div>

           <table class="table table-striped table-bordered" id="example2">
        <thead>
                <tr>
                    <th>PROVINCE</th>
                    <th>ENCODED BY</th>
                    <th>NAME</th>
                    <th>PARTICULARS</th>
                    <th>TRACKER</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
				</thead>
				<tbody>';  
        while($rows = mysqli_fetch_array($result))  
        {  
           $output .= '
				        <tr>
                    <td>'.$rows["province"].'</td> 
                    <td>'.$rows["encoded_by"].'</td>
                    <td>'.$rows["staff_name"].'</td>
                    <td>'.$rows["particulars"].'</td>
                    <td>'.$rows["tracker"].'</td>
                    <td>'.$rows["status"].'</td>
                    <td><a id="viewdata" class="btn btn-app" data-toggle="modal" data-target="#dataModal" data-id="'.$rows["id"].'"><i class="fas fa-folder">&nbsp;</i>View Data</a></td>
				       </tr>';
			 	  }
		   $output .= '
				</tbody>
        <tfoot>
              <tr>
                  <th>PROVINCE</th>
                  <th>ENCODED BY</th>
                  <th>NAME</th>
                  <th>PARTICULARS</th>
                  <th>TRACKER</th>
                  <th>STATUS</th>
                  <th>ACTION</th>
              </tr>
        </tfoot>
          </table>
		</div>';  
      echo $output;  
 ?> 

<div id="dataModal" class="modal bs-example" data-toggle="modal">  
    <div class="modal-dialog modal-xl">  
       <div class="modal-content" id="document_detail">  
        <div class="modal-header">  
           <button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal">&times;</button>  
        </div>  
 
        <div class="modal-footer">  
           <button type="button" class="btn btn-default" onclick="javascript:window.location.reload()" data-dismiss="modal">Close</button>  
        </div>  
       </div>  
    </div>  
</div>

<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>

<script>

    $(function () {
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });


$(document).on('click','#viewdata',function(e){
        e.preventDefault();
        var per_id=$(this).data('id');
        //alert(per_id);
        $('#document_detail').html('');
        $.ajax({
            url:'viewdata.php',
            type:'POST',
            data:'id='+per_id,
            dataType:'html'
        }).done(function(data){
            $('#document_detail').html('');
            $('#document_detail').html(data);
        });
    });
</script>