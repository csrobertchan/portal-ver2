<?php
session_start(); 
if(!isset($_SESSION['emp_id'])) {
    header("Location: index.php");
    exit;
} elseif ($_SESSION['user_stat']=='1') {
    header("Location: update.php");
    exit;
}

include('config/dbcon.php');
$id1= $_SESSION['emp_id'];
$query = mysqli_query($conn,"SELECT * FROM users_gw LEFT JOIN users_info ON users_info.emp_id = users_gw.emp_id WHERE users_info.emp_id = '$id1'") or die(mysqli_error($conn));
$rows = mysqli_fetch_array($query);
$fname=$rows['first_name'];
$mname=$rows['mid_name'];
$lname=$rows['last_name'];
$mname=$rows['mid_name'];
$extname=$rows['ext_name'];
$user_stat=$rows['user_stat'];
$fullname = $fname. ' ' . $mname . ' ' . $lname . ' ' .$extname;
$province=$rows['province'];
$program_unit=$rows['program_unit'];
$position=$rows['position_title'];
$parenthetical=$rows['parenthetical_title'];
$email=$rows['email'];
$mobile_no=$rows['mobile_no'];

?>