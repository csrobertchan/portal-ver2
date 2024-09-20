<?php 
session_start();  
if(!isset($_SESSION['emp_id'])) {
    header("Location: index.php");
    exit;
} elseif ($_SESSION['user_stat']=='2') {
    header("Location: index.php");
    exit;
}

include('config/dbcon.php');
$id1= $_SESSION['emp_id'];
$query = mysqli_query($conn, "SELECT * FROM users_gw WHERE emp_id = '$id1'") or die (mysqli_error());
$rows = mysqli_fetch_array($query);
$fname=$rows['first_name'];
$mname=$rows['mid_name'];
$lname=$rows['last_name'];
$mname=$rows['mid_name'];
$extname=$rows['ext_name'];
$user_stat=$rows['user_access'];
$password=$rows['password'];
$fullname = $fname. ' ' . $mname . ' ' . $lname . ' ' .$extname;
$query1= mysqli_query($conn, "SELECT * FROM users_info WHERE emp_id = '$id1'") or die (mysqli_error());
$row = mysqli_fetch_array($query1);
$position=$row['position_title'];
$parenthetical=$row['parenthetical_title'];
$email=$row['email'];
$mobile_no=$row['mobile_no'];
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Pantawid – Employee Gateway">
    <meta name="author" content="Robert Mallari Chan">
    <meta name="keywords" content="gateway, portal, pantawid, employee, payslip, 4ps, dswd, mimaropa">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico">

    <!-- TITLE -->
    <title>Pantawid – Update Info</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    
    <!-- STYLE CSS -->
     <link href="assets/css/style.css" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="assets/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="assets/switcher/demo.css" rel="stylesheet">

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="update.php">
                            <img src="assets/images/brand/logo-white.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="assets/images/brand/logo-dark.png" class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.php">
                            <img src="assets/images/logo-icon.png" class="header-brand-img light-logo1" alt="logo"></a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Main</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="update.php"><i
                                        class="side-menu__icon fe fe-edit"></i><span
                                        class="side-menu__label">Update Info</span></a>
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </div>
            </div>
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Update Info</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Welcome</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Info</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Update Password</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center chat-image mb-5">
                                            <div class="avatar avatar-xxl chat-profile mb-3 brround">
                                                <a class="" href="profile.html"><img alt="avatar" src="assets/images/users/7.jpg" class="brround"></a>
                                            </div>
                                            <div class="main-chat-msg-name">
                                                <a href="profile.html">
                                                    <h5 class="mb-1 text-dark fw-semibold"><?php echo $fullname; ?></h5>
                                                </a>
                                                <p class="text-muted mt-0 mb-0 pt-0 fs-13"><?php echo $position; ?><br /><?php echo $parenthetical; ?></p>
                                            </div>
                                        </div>
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="form-label">Current Password</label>
                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 form-control" name="op" type="old_password" placeholder="Current Password" autocomplete="current-password" tabindex="1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">New Password</label>
                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 form-control" type="password" name="np" placeholder="New Password" autocomplete="new-password" tabindex="2">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Confirm Password</label>
                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                                                    <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 form-control" type="password" name="c_np" placeholder="Confirm Password" autocomplete="new-password" tabindex="3" >
                                                </div>
                                            </div>
                                        </div>
                                            <div class="card-footer text-end">
                                            <?php if ($password !== "mimaropa") {?>
                                                <button class="btn btn-primary" type="submit" name="upd_pass">Update Password</button>
                                            <?php } ?>
                                            </div>
                                        </form>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="card">
                                    <form method="post">
                                        <div class="card-header">
                                            <h3 class="card-title">Update Info</h3>
                                        </div>
                                        <?php if ($email==NULL || $mobile_no==NULL) {?>
                                        <div class="alert alert-danger" role="alert">
                                            <center><strong>Please update your active email address and contact number.</strong></center>
                                        </div>
                                        <?php } ?>
                                            <div class="card-body">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4 mb-2">
                                                            <label for="exampleInputname">First Name</label>
                                                            <input type="text" class="form-control" name="first_name" placeholder="<?php echo $fname; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <label for="exampleInputname1">Middle Name</label>
                                                            <input type="text" class="form-control" name="mid_name" placeholder="<?php echo $mname; ?>" readonly>    
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <label for="exampleInputname1">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" placeholder="<?php echo $lname; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($email==NULL || $mobile_no==NULL) {?>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email address">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputnumber">Contact Number</label>
                                                <input type="number" class="form-control" name="mobile_no" placeholder="Contact number">
                                            </div>
                                            <?php } else { ?>
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <strong><input type="email" class="form-control" placeholder="<?php echo $email; ?>" readonly></strong>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputnumber">Contact Number</label>
                                                <strong><input type="number" class="form-control" placeholder="<?php echo $mobile_no; ?>" readonly></strong>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php if ($email==NULL || $mobile_no==NULL) {?>
                                        <div class="card-footer text-end">
                                        <button class="btn btn-primary" type="submit" name="upd_info">Save</button>
                                        </div>
                                        <?php } ?>
                                    </form>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Pantawid Gateway Account Activation</div>
                                    </div>
                                    <form method="post">
                                        <div class="card-body">
                                            <p>Its Advisable for you to activate your Pantawid Gateway account.</p>
                                            <label class="custom-control custom-checkbox mb-0">
                                                <input type="checkbox" class="custom-control-input" name="user_stat" value="Activated" required>
                                                <span class="custom-control-label">Yes, Activate my Pantawid Gateway Account.</span>
                                            </label>
                                        </div>
                                        <?php if ($user_stat=="1") {?>
                                        <div class="card-footer text-end">
                                            <button class="btn btn-primary" type="submit" name="upd_actv">Activate</button>
                                        <?php } ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 CLOSED -->

                    </div>
                    <!--CONTAINER CLOSED -->

                </div>
            </div>
            <!--app-content open-->
        </div>
        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <span id="year"></span> <a href="javascript:void(0)">Pantawid Employee Gateway System</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> Pantawid ICT </a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER CLOSED -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>
    <!-- BOOTSTRAP JS -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- INPUT MASK JS-->
    <script src="assets/plugins/input-mask/jquery.mask.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="assets/js/show-password.min.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <script src="assets/js/select2.js"></script>

    <!-- SIDEBAR JS -->
    <script src="assets/plugins/sidebar/sidebar.js"></script>

    <!-- Color Theme js -->
    <script src="assets/js/themeColors.js"></script>

    <!-- Sticky js -->
    <script src="assets/js/sticky.js"></script>

    <!-- CUSTOM JS -->
    <script src="assets/js/custom.js"></script>

    <!-- Custom-switcher -->
    <script src="assets/js/custom-swicher.js"></script>

    <!-- Switcher js -->
    <script src="assets/switcher/js/switcher.js"></script>
<?php
if (isset($_POST['upd_pass'])){
    if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {

        function validate($data){
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }
    
        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);;
        
        if(empty($op)){ ?>
        <script>
            swal({
                type: "error",
                title: "Oops...",
                text: "Old Password is Required",
            });
        </script>
        <?php   exit();
        }else if(empty($np)){ ?>
        <script>
            swal({
                type: "error",
                title: "Oops...",
                text: "New Password is required",
            });
        </script>
         <?php exit();
        }else if($np !== $c_np){ ?>
        <script>
            swal({
                type: "error",
                title: "Oops...",
                text: "The confirmation password does not match",
            });
        </script>
        <?php exit();
        }else if($np == "mimaropa" || $c_np == "mimaropa"){ ?>
        <script>
            swal({
                type: "error",
                title: "Oops...",
                text: "The password you used is the default password!",
            });
        </script>
        <?php exit();      
            }else {
            // hashing the password
            $op = md5($op);
            $np = md5($np);
            $stat = '1';
            $id1 = $_SESSION['emp_id'];
    
            $sql = "SELECT password FROM users_gw WHERE emp_id='$id1' AND password='$op'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                
                $sql_2 = "UPDATE users_gw SET password='$np' WHERE emp_id='$id1'";
                mysqli_query($conn, $sql_2); ?>
                <script type='text/javascript'>
                        swal({
                            type: "success",
                            title: "Success!!...",
                            text: "Your password has been changed successfully",
                        });
                </script>
                <?php
    
            } else { ?>
                <script>
                    swal({
                        type: "error",
                        title: "Try again!...",
                        text: "Your old password is invalid",
                    });
                </script>
            <?php  exit();
            }
        }        
    }
}

if (isset($_POST['upd_info'])) {
    if (isset($_POST['email']) && isset($_POST['mobile_no'])){

        function validate($data){
            $data = trim($data);
            return $data;
         }

         $email = $_POST['email'];
         $mobile_no = $_POST['mobile_no'];

         if(empty($email)){ ?>
        <script>
            swal({
                type: "error",
                title: "Oops...",
                text: "Email Address is Required",
            });
        </script>
        <?php   exit();
        }else if(empty($mobile_no)){ ?>
        <script>
        swal({
            type: "error",
            title: "Oops...",
            text: "Mobile Number is Required",
        });
        </script>
        <?php exit();      
        }else {
        $id1 = $_SESSION['emp_id'];
        $sql = "UPDATE users_info SET email='$email', mobile_no='$mobile_no' WHERE emp_id='$id1'";
        $insert = mysqli_query($conn, $sql);
        if($insert) { ?>
            <script type='text/javascript'> 
            swal({
                type: "success",
                title: "Success!!...",
                text: "Your Info has been updated successfully",
            });
            </script> 
            <?php
            } else { ?>
                <script>
                    swal({
                        type: "error",
                        title: "Try again!...",
                        text: "Updating Failed!",
                    });
                </script>
            <?php  exit();

            }
        }
    }
}

if (isset($_POST['upd_actv'])) {
    if (isset($_POST['user_stat'])) {

        function validate($data){
            $data = trim($data);
            return $data;
         }

         $user_stat = $_POST['user_stat'];
    
         if(empty($user_stat)){ ?>
        <script>
            swal({
                type: "error",
                title: "Oops...",
                text: "Please check the box if you want to proceed!",
            });
        </script>
        <?php  exit();
        }else {
                $id1 = $_SESSION['emp_id'];
                $sql = "UPDATE users_gw SET user_stat='$user_stat', user_access='2' WHERE emp_id='$id1'";
                $insert = mysqli_query($conn, $sql);
                if($insert) { ?>
                    <script type='text/javascript'> 
                    swal({
                        type: "success",
                        title: "Success!!...",
                        text: "Your Account has been Activated successfully",
                        timer: 2000,
                        showConfirmButton: false
                    }, function(){
                window.location.href = "index.php";
                });
                    </script> 
                    <?php
                    header("Location: signout.php");
                    } else { ?>
                        <script>
                            swal({
                                type: "error",
                                title: "Try again!...",
                                text: "Updating Failed!",
                            });
                        </script>
                    <?php  exit();
                }
        }
    }
}
?>
</body>

</html>