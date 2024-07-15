<?php
	session_start();
		$cn = mysqli_connect("localhost","root","","main") or die(mysql_error());
	
                $email=$_POST['email'];
                $security_questions=$_POST['security_questions'];
                $security_answer=$_POST['security_answer'];

		$sql = "select password from user where email = '$email' and security_questions = '$security_questions and security_answer=$security_answer'";
		$res = mysqli_query($cn,$sql);
		    $_SESSION['msg']="you recieve password shortly in your gmail account..!! ";
			header("Location:forgot_pass.php");
			die;
		//mysqli_close() ;

?>