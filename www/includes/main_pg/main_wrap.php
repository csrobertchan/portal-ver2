  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Main Board</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Main</a></li>
              <li class="breadcrumb-item active">Board</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <!-- /.Personnel Officer Board -->
      <div class="container-fluid">
        <?php if ($program_unit == 'ADMINISTRATIVE OFFICER II') { ?>
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> Notice!</h5>
          Hi! Sir <b><?php echo $fname; ?></b> If you read this message means your access is above any of your admins.
        </div>
        <div class="row">
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='REGIONAL OFFICE' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>REGIONAL OFFICE</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='MARINDUQUE' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>MARINDUQUE</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='ORIENTAL MINDORO' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>ORIENTAL MINDORO</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='OCCIDENTAL MINDORO' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>OCCIDENTAL MINDORO</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='PALAWAN' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>PALAWAN</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-light">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='ROMBLON' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>ROMBLON</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>

      <!-- /.Admin Officer Board -->
      <div class="container-fluid">
        <?php if ($program_unit == 'PERSONNEL ADMINISTRATION SECTION') { ?>
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> Notice!</h5>
          Hi! Sir <b><?php echo $fname; ?></b> If you read this message means your access is above anyone else.
        </div>
        <div class="row">
          <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='REGIONAL OFFICE' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>REGIONAL OFFICE</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='MARINDUQUE' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>MARINDUQUE</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='ORIENTAL MINDORO' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>ORIENTAL MINDORO</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='OCCIDENTAL MINDORO' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>OCCIDENTAL MINDORO</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='PALAWAN' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>PALAWAN</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <div class="small-box bg-light">
              <div class="inner">
                <?php 
                $query = mysqli_query($conn,"SELECT COUNT(`province`) as 'COUNT' FROM users_info WHERE `province`='ROMBLON' AND `employment_stat`='FILLED'") or die(mysqli_error($conn)); 
                $row=mysqli_fetch_array($query);
                $count=$row['COUNT'];
                ?>
                <h3><?php echo number_format($count);?></h3>
                <p>ROMBLON</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </section>

  </div>
  <!-- /.content-wrapper -->
    <?php include('includes/main_pg/footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->