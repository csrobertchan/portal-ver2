<?php 
include('config/dbcon.php');
 if(isset($_POST['signin'])) {
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	$sql ="SELECT * FROM users_gw where user_gw ='$username' AND password ='$password'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count==1)
	{
		while ($row = mysqli_fetch_array($query)) {
			if ($row['user_access'] == '1') {
					$_SESSION['emp_id']=$row['emp_id']; 
					$_SESSION['first_name']=$row['first_name'];
					$_SESSION['last_name']=$row['last_name'];
					$_SESSION['mid_name']=$row['mid_name'];
					$_SESSION['ext_name']=$row['ext_name'];
					$_SESSION['user_stat']=$row['user_stat'];
			echo "<script type='text/javascript'> document.location = 'update.php'; </script>";
			}
			elseif ($row['user_access'] == '2') {
					$_SESSION['emp_id']=$row['emp_id']; 
					$_SESSION['first_name']=$row['first_name'];
					$_SESSION['last_name']=$row['last_name'];
					$_SESSION['mid_name']=$row['mid_name'];
					$_SESSION['ext_name']=$row['ext_name'];
					$_SESSION['user_stat']=$row['user_stat'];
			echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
			} 
  		}
	} 
	else { echo "<script>alert('Invalid Username or Password'); window.location = './index.php';</script>"; }
}
?>