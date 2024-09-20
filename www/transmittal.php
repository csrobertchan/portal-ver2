<?php

include ('includes/main_pg/login_ver.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">t
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DSWD | Employee</title>

    <!-- Google Font: Source Sans Pro -->
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
        .upload{
            width: 125px;
            position: relative;
            margin: auto;
        }

        .upload img{
            border-radius: 50%;
            border: 8px solid #DCDCDC;
        }

        .upload .round{
            position: absolute;
            bottom: 0;
            right: 0;
            background: #00B4FF;
            width: 32px;
            height: 32px;
            line-height: 33px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;
        }

        .upload .round input[type = "file"]{
            position: absolute;
            transform: scale(2);
            opacity: 0;
        }

        input[type=file]::-webkit-file-upload-button{
            cursor: pointer;
        }

    </style>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <?php include('includes/main_pg/nav.php')?>
    <?php include('includes/main_pg/aside.php')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Admin - Create Transmittal Box</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Admin - Transmittal Box</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <?php ini_set('memory_limit','-1'); ?>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><i class="nav-icon fas fa-coins"></i> Transmittal Box List</h3>
                            </div>
                            <?php if($province=='MARINDUQUE' || $province=='ORIENTAL MINDORO' || $province=='OCCIDENTAL MINDORO' || $province=='ROMBLON' || $province=='PALAWAN') { ?>
                            <br />
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                            <?php
                                            $query=mysqli_query($conn,"select COUNT(`box_no`) as count from box_db where status IN ('ENCODING PROCESS') AND province='$province'")or die(mysqli_error($conn));
                                            $row=mysqli_fetch_array($query);
                                            $countbox=$row['count'];
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-home-tab2" data-toggle="pill" href="#out" role="tab" aria-selected="true">(<b><?php echo $countbox ?></b>BOX)  IN ENCODING PROCESS</a>
                                                </li>
                                            <?php
                                            $query=mysqli_query($conn,"select COUNT(`box_no`) as count from box_db where status IN ('IN TRANSIT') AND province='$province'")or die(mysqli_error($conn));
                                            $row=mysqli_fetch_array($query);
                                            $countbox=$row['count'];
                                            ?>
                                                 <li class="nav-item">
                                                    <a class="nav-link" id="pills-home-tab2" data-toggle="pill" href="#trans" role="tab" aria-selected="true">(<b><?php echo $countbox ?></b>BOX)  IN TRANSIT</a>
                                                </li>
                                            <?php
                                            $query=mysqli_query($conn,"select COUNT(`box_no`) as count from box_db where status <> 'IN TRANSIT' AND status <> 'ENCODING PROCESS' AND province='$province'")or die(mysqli_error($conn));
                                            $row=mysqli_fetch_array($query);
                                            $countbox1=$row['count'];
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#rcv" role="tab" aria-selected="false">(<b><?php echo $countbox1 ?></b>BOX) ALREADY RECEIVED BY RPMO</a>
                                                </li>
                                    </ul>
                                    <hr>
                                    <?php  
                                    $connect = mysqli_connect("db", "root", "hindikoalam", "portal");  
                                    $query = "SELECT * FROM box_db WHERE province = '$province' AND status IN ('ENCODING PROCESS') ORDER BY id ASC";  
                                    $result = mysqli_query($connect, $query);
                                    ?>                                    
                                    <div class="tab-content m-t-30" id="pills-tabContent2">
                                        <div class="tab-pane fade show active" id="out" role="tabpanel" aria-labelledby="pills-home-tab2">
                                            <table class="table table-striped table-bordered" id="POO1" style="width:100%"><br />
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                                                    Create Transmittal Box
                                                </button>
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>BOX ID</th>
                                                        <th>DATE CREATED</th>
                                                        <th>DATE SENT</th>
                                                        <th>DATE RECEIVED</th>
                                                        <th>COURIER</th>
                                                        <th>PROVINCE</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php  
                                                        while($row = mysqli_fetch_array($result))  
                                                        {  
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row["id"]; ?></td>
                                                        <td><?php echo $row["box_no"]; ?></td>
                                                        <td><?php echo $row["date_created"]; ?></td>
                                                        <td><?php echo $row["date_sent"]; ?></td>
                                                        <td><?php echo $row["date_rcv"]; ?></td>
                                                        <td><?php echo $row["courier"]; ?></td>
                                                        <td><?php echo $row["province"]; ?></td>
                                                        <td><?php echo $row["status"]; ?></td>
                                                        <td>
                                                        <?php if($row['status']=='IN TRANSIT'){ ?> 
                                                            <button type="button" id="view_list" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']?>"><i class="fas fa-list"></i>VIEW LIST</button>
                                                                        <form  method="post" action="print/print.php"><input type="submit" value="Print Transmittal"class="btn btn-app"><input type="hidden" class="btn btn-app" name="print_select" value="<?php echo $row['box_no']?>"></form>
                                                                        <?php } else {?>
                                                                        <a id="addrec" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']?>"><i class="fas fa-save"></i>ADD RECORDS</a>
                                                                        <a id="editbox" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']?>"><i class="fas fa-edit"></i>UPDATE BOX</a>
                                                                        <button type="button" id="view_list" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']?>"><i class="fas fa-list"></i>VIEW LIST</button>
                                                                        <?php } ?>
                                                                        
                                                        </td>   
                                                    <?php } ?>										
                                                    </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                        <?php  
                                        $connect = mysqli_connect("db", "root", "hindikoalam", "portal");  
                                        $query = "SELECT * FROM box_db WHERE province = '$province' AND status IN ('IN TRANSIT') ORDER BY id ASC";  
                                        $result = mysqli_query($connect, $query);
                                        ?>  
                                        <div class="tab-pane fade show" id="trans" role="tabpanel" aria-labelledby="pills-home-tab2">
                                            <table class="table table-striped table-bordered" id="POO2" style="width:100%"><br />
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>BOX ID</th>
                                                        <th>DATE CREATED</th>
                                                        <th>DATE SENT</th>
                                                        <th>DATE RECEIVED</th>
                                                        <th>COURIER</th>
                                                        <th>PROVINCE</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php  
                                                        while($row = mysqli_fetch_array($result))  
                                                        {  
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row["id"]; ?></td>
                                                        <td><?php echo $row["box_no"]; ?></td>
                                                        <td><?php echo $row["date_created"]; ?></td>
                                                        <td><?php echo $row["date_sent"]; ?></td>
                                                        <td><?php echo $row["date_rcv"]; ?></td>
                                                        <td><?php echo $row["courier"]; ?></td>
                                                        <td><?php echo $row["province"]; ?></td>
                                                        <td><?php echo $row["status"]; ?></td>
                                                        <td>
                                                        <?php if($row['status']=='IN TRANSIT'){ ?> 
                                                            <button type="button" id="view_list" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']?>"><i class="fas fa-list"></i>VIEW LIST</button>
                                                                        <form  method="post" action="print/print.php"><input type="submit" value="Print Transmittal"class="btn btn-app"><input type="hidden" class="btn btn-app" name="print_select" value="<?php echo $row['box_no']?>"></form>
                                                                        <?php } else {?>
                                                                        <a id="addrec" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']?>"><i class="fas fa-save"></i>ADD RECORDS</a>
                                                                        <a id="editbox" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']?>"><i class="fas fa-edit"></i>UPDATE BOX</a>
                                                                        <button type="button" id="view_list" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']?>"><i class="fas fa-list"></i>VIEW LIST</button>
                                                                        <?php } ?>
                                                                        
                                                        </td>   
                                                    <?php } ?>										
                                                    </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                        <?php  
                                        $query1 = "SELECT * FROM box_db WHERE province='$province' AND status <> 'IN TRANSIT' AND status <> 'ENCODING PROCESS' ORDER BY id DESC";  
                                        $result1 = mysqli_query($connect, $query1);
                                        ?>
                                        <div class="tab-pane fade" id="rcv" role="tabpanel" aria-labelledby="pills-profile-tab2">
                                            <table class="table table-striped table-bordered" id="POO" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>BOX ID</th>
                                                    <th>DATE CREATED</th>
                                                    <th>DATE SENT</th>
                                                    <th>DATE RECEIVED</th>
                                                    <th>COURIER</th>
                                                    <th>PROVINCE</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  
                                                    while($rows = mysqli_fetch_array($result1))  
                                                    {  
                                                ?>
                                                <tr>
                                                    <td><?php echo $rows["id"]; ?></td>
                                                    <td><?php echo $rows["box_no"]; ?></td>
                                                    <td><?php echo $rows["date_created"]; ?></td>
                                                    <td><?php echo $rows["date_sent"]; ?></td>
                                                    <td><?php echo $rows["date_rcv"]; ?></td>
                                                    <td><?php echo $rows["courier"]; ?></td>
                                                    <td><?php echo $rows["province"]; ?></td>
                                                    <td><?php echo $rows["status"]; ?></td>
                                                    <td>
                                                    <?php if($row['up_trans']==''){ ?> 
                                                        
                                                        <a id="view_trans" class="btn btn-app" data-target="#pdfModal" href="http://mimaropa.net/app/emp/pdf/<?php echo $rows['up_trans']?>"><i class="fas fa-file-pdf"></i>VIEW TRANSMITTAL</a>
                                                                    <button type="button" id="view_list" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $rows['id']?>"><i class="fas fa-list"></i>VIEW LIST</button>
                                                                    <?php } else {?>
                                                                        <span class="badge bg-danger">TRANSMITTAL NOT YET UPLOADED</span>
                                                                    <?php } ?>
                                                                    
                                                    </td>   
                                                <?php } ?>										
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($province=='REGIONAL OFFICE') { ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                            <?php
                                            $query=mysqli_query($conn,"select COUNT(`box_no`) as count from box_db where status IN ('IN TRANSIT')")or die(mysqli_error($conn));
                                            $row=mysqli_fetch_array($query);
                                            $countbox=$row['count'];
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-home-tab2" data-toggle="pill" href="#month" role="tab" aria-selected="true">(<b><?php echo $countbox ?></b>BOX)  FOR INCOMING</a>
                                                </li>
                                            <?php
                                            $query=mysqli_query($conn,"select COUNT(`box_no`) as count from box_db where status <> 'IN TRANSIT' AND status <> 'ENCODING PROCESS'")or die(mysqli_error($conn));
                                            $row=mysqli_fetch_array($query);
                                            $countbox1=$row['count'];
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#revenue" role="tab" aria-selected="false">(<b><?php echo $countbox1 ?></b>BOX) ARCHIVED</a>
                                                </li>
                                        </ul>
                                        <hr>
                                        <?php  
                                        $connect = mysqli_connect("db", "root", "hindikoalam", "portal");  
                                        $query = "select * from box_db WHERE status = 'IN TRANSIT' ORDER BY date_created DESC";  
                                        $result = mysqli_query($connect, $query);
                                        ?>  
                                        <div class="tab-content m-t-30" id="pills-tabContent2">
                                            <div class="tab-pane fade show active" id="month" role="tabpanel" aria-labelledby="pills-home-tab2">
                                            <table class="table table-striped table-bordered" id="example" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>BOX ID</th>
                                                    <th>DATE CREATED</th>
                                                    <th>DATE SENT</th>
                                                    <th>DATE RECEIVED</th>
                                                    <th>COURIER</th>
                                                    <th>PROVINCE</th>
                                                    <th>STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  
                                                    while($rows = mysqli_fetch_array($result))  
                                                    {  
                                                ?>
                                                <tr>
                                                    <td><?php echo $rows["id"]; ?></td>
                                                    <td><?php echo $rows["box_no"]; ?></td>
                                                    <td><?php echo $rows["date_created"]; ?></td>
                                                    <td><?php echo $rows["date_sent"]; ?></td>
                                                    <td><?php echo $rows["date_rcv"]; ?></td>
                                                    <td><?php echo $rows["courier"]; ?></td>
                                                    <td><?php echo $rows["province"]; ?></td>
                                                    <td><?php echo $rows["status"]; ?></td>
                                                    <td><a id="view_list" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $rows['id'];?>"><i class="fas fa-list"></i>VIEW LIST</a><a id="rcvbox" class="btn btn-app" data-toggle="modal" data-target="#myModal" data-id="<?php echo $rows['id'];?>"><i class="fas fa-folder-plus"></i>RECEIVE BOX</a></td>   
                                                <?php } ?>										
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                            <div class="tab-pane fade" id="revenue" role="tabpanel" aria-labelledby="pills-profile-tab2">
                                                <table class="table table-striped table-bordered" id="example" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>BOX ID</th>
                                                        <th>DATE CREATED</th>
                                                        <th>DATE SENT</th>
                                                        <th>DATE RECEIVED</th>
                                                        <th>COURIER</th>
                                                        <th>PROVINCE</th>
                                                        <th>STATUS</th>
                                                        <th>RECEIVED BY</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>BOX ID</th>
                                                        <th>DATE CREATED</th>
                                                        <th>DATE SENT</th>
                                                        <th>DATE RECEIVED</th>
                                                        <th>COURIER</th>
                                                        <th>PROVINCE</th>
                                                        <th>STATUS</th>
                                                        <th>RECEIVED BY</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        <div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
</div>
<!-- /.card -->
<div class="modal fade" id="modal-info">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Transmittal - Box</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Create Transmittal Box</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="insertbox.php" onsubmit="return confirm('Create Transmittal Box ?')">
                            <?php
                            function randomKey($length) {
                                $pool = array_merge(range(0,9));

                                for($i=0; $i < $length; $i++) {
                                    $key .= $pool[mt_rand(0, count($pool) - 1)];
                                }
                                return $key;
                            }

                            date_default_timezone_set('Asia/Manila');

                            ?>
                            <input type="text" class="form-control" name="created_by" value="<?php echo $fullname ?>" readonly>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>BOX ID</label>
                                        <input type="text" class="form-control" name="box_no" value="4PS-BOX-<?php echo randomKey(5);  ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>DATE CREATED</label>
                                        <input type="text" class="form-control" name="date_created" value="<?php echo date('F j, Y g:i:a  '); ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>COURIER</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="courier" placeholder="Enter Courier"  required/>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>PROVINCE</label>
                                        <input type="text" class="form-control" name="province" value="<?php echo $province; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="insert" class="btn btn-info">CREATE TRANSMITTAL BOX</button>
            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div data-dismiss="modal" class="modal fade bs-example" id="myModal" data-keyboard="false" data-focus-on="input:first" role="dialog" style="display: none;">
    <div class="modal-dialog modal-xl" role="document" style="max-width:1400px;">
 
        <div class="modal-content" id="content-data">

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="dataModal" class="modal" data-keyboard="false" data-focus-on="input:first">  
    <div class="modal-dialog modal-xl">  
       <div class="modal-content">  
        <div class="modal-header">  
           <button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal">&times;</button>  
        </div>  
        <div class="modal-body" id="document_detail">  
        </div>  
        <div class="modal-footer">  
           <button type="button" class="btn btn-default" onclick="javascript:window.location.reload()" data-dismiss="modal">Close</button>  
        </div>  
       </div>  
    </div>  
  </div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.5.0
    </div>
    <strong>Copyright &copy; February 2023 <a href="https://mimaropa.net">Pantawid Pamilyang Pilipino Program - MIMAROPA</a>.</strong> All rights reserved.
</footer>

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

</body>
<script>

    $(function () {
        $("#POO1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#POO2").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#POO').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
        $('#example').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        order: [[2, 'desc']],
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
        
        var per_id=$(this).data('id');
        $.ajax({
        url: 'viewlist.php',
        method: 'POST',
        dataType: 'text',
        data:'id='+per_id,
        success: function(data){
            $('#content-data').html(data);
        }
    })

    $(document).on('click','#editbox',function(e){
        e.preventDefault();
        var per_id=$(this).data('id');
        //alert(per_id);
        $('#content-data').html('');
        $.ajax({
            url:'editbox.php',
            type:'POST',
            data:'id='+per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data').html('');
            $('#content-data').html(data);
        });
    });


    $(document).on('click','#upload',function(e){
        e.preventDefault();
        var per_id=$(this).data('id');
        //alert(per_id);
        $('#content-data').html('');
        $.ajax({
            url:'uploadtrans.php',
            type:'POST',
            data:'id='+per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data').html('');
            $('#content-data').html(data);
        });
    });

    $(document).on('click','#rcvbox',function(e){
        e.preventDefault();
        var per_id=$(this).data('id');
        //alert(per_id);
        $('#content-data').html('');
        $.ajax({
            url:'rcvbox.php',
            type:'POST',
            data:'id='+per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data').html('');
            $('#content-data').html(data);
        });
    });

    $(document).on('click','#addrec',function(e){
        e.preventDefault();
        var per_id=$(this).data('id');
        //alert(per_id);
        $('#content-data').html('');
        $.ajax({
            url:'addrecords.php',
            type:'POST',
            data:'id='+per_id,
            dataType:'html'
        }).done(function(data){
            $('#content-data').html('');
            $('#content-data').html(data);
        });
    });


	$('a[data-toggle="tab"]').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
	});

	$('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
		var id = $(e.target).attr("href");
		localStorage.setItem('selectedTab', id)
	});

	var selectedTab = localStorage.getItem('selectedTab');
	if (selectedTab != null) {
		$('a[data-toggle="tab"][href="' + selectedTab + '"]').tab('show');
	}


    $(function () {
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

    })

    $(document).on("click", ".delete-confirm", function () {
        var deleteUrl = $(this).attr('href');
        $(".modal-body .delete-yes").attr('href', deleteUrl);
        return false;
    });

</script>
</body>
</html>