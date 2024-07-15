<?php
	session_start();
		$cn = mysqli_connect("localhost","root","","main") or die(mysqli_error());
                $user_name=$_SESSION['user_name'];
                $password=$_POST['password'];
                $password2=$_POST['password2'];

		$sql = "select user_id from user where user_name = '$user_name' and password = '$password'";
		$res = mysqli_query($cn,$sql) or die(mysqli_error());
		$arr = mysqli_fetch_array($res) or die(mysqli_error());
		$user_id = $arr[0];
		if($user_id>0)
                {
                    
                    $sql = "update user set password = '$password2' where user_name='$user_name'";
                    $res = mysqli_query($cn,$sql) or die(mysql_error());
                    $_SESSION['msg']="Password Is Updated....";
			header("Location: change_pass.php");
			die;
		}
		else		$msg = "Access deny";
		mysql_close() or die(mysql_error());

?>