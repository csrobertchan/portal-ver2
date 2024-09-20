<?php 
session_start();

include ('config/dbcon.php');
$id1= $_SESSION['id'];]
include('includes/main_pg/login_ver.php');
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<?php
  
$con=mysqli_connect('db','root','hindikoalam','portal');  // this one in error
if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    $sql="select * from box_db WHERE id=$id";
    $run_sql=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_sql)){
        $box_no=$row[1];
        $date_created=$row[2];
        $courier=$row[5];
        $province=$row[6];
        $status=$row[7];

    }//end while
    //var_dump($run_sql);
    ?>
    <form method="post" action="updatebox.php" onsubmit="return confirm('Submit this data ?')">
        <div class="modal-content">
				<div class="modal-header">
				   <div class="box-header">
						<h3 class="box-title">Update Transmittal Box No: <b><?php echo $box_no; ?></b></h3>
				   </div>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				  <div class="card-body">
					 <div class="card card-info">
					   <div class="card-header">
							Update - Form
					   </div>
					   <input type="hidden" name="id" value="<?php echo $id; ?>" />
						<div class="card-body">
							<div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>BOX ID</label>
                                        <input type="text" class="form-control" name="box_no" value="<?php echo $box_no; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>DATE CREATED</label>
                                        <input type="text" class="form-control" name="date_created" value="<?php echo $date_created; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>COURIER</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="courier" value="<?php echo $courier; ?>"  readonly />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>PROVINCE</label>
                                        <input type="text" class="form-control" name="province" value="<?php echo $province; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>DATE SENT</label>
                                        <input type="date" name="date_sent" class="form-control" placeholder="2024/01/01" value="" required />
                                    </div>
                                </div>							
							</div>
						</div>
					 </div>
				  </div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="insert" >Update Box <?php echo $box_no; ?></button>
					<a href=""><button type="button" class="btn btn-danger">Close</button></a>
					</div>
				 </div>
			</div>
		</form>

    <?php }//end if 

	date_default_timezone_set('Asia/Manila');
	$date = date('m/d/Y');
	$month=date("m",$time);
	$year=date("Y",$time);
	?>
	<input type="hidden" name="year" id="year" value="<?php echo $year; ?>" />
	<input type="hidden" name="month" id="month" value="<?php echo $month; ?>" />
	<input type="hidden" name="value" id="value" value="S" />
	<script src="assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
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
	<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<script src="assets/dist/js/adminlte.min.js"></script>
	<script src="assets/plugins/moment/moment.min.js"></script>
	<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<script src="assets/plugins/select2/js/select2.full.min.js"></script>
	<script type="text/javascript">
		$('.select2').each(function() { 
			$(this).select2({ dropdownParent: $(this).parent()});
		})
	</script>
	<script type="text/javascript">
	$('#category').change(function() {
				$.ajax({
					url: 'ajax.php',
					type: 'post',
					data: {'subject':'category', 'category':$(this).val()},
					success: function(php_script_response) {
						$('#subcategory').html(php_script_response);
					}
				});
			});
	$('#subcategory').change(function() {
				$.ajax({
					url: 'ajax.php',
					type: 'post',
					data: {'subject':'subcategory', 'subcategory':$(this).val()},
					success: function(php_script_response) {
						$('#risk_level').html(php_script_response);
					}
				});
			});

  $(document).on("click", ".delete-confirm", function () {
     var deleteUrl = $(this).attr('href');
     $(".modal-body .delete-yes").attr('href', deleteUrl);
     return false;
});

$(document).ready(function(){
    $('.combine').on('change', function(){
        var drn = $('#office_loc').val() + '-' + $('#particulars').val() + '-' + $('#year').val() + '-' + $('#month').val() + '-' + $('#randomKey').val() + '-' + $('#value').val();
        $('#drn_num').val(drn);
    });
});
	</script>
