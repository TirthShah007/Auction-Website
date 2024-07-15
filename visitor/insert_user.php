<?php session_start()?>

<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$user_name=$_POST['user_name'];			
			$password=$_POST['password'];
			$city_id=$_POST['city_id'];
			$state_id=$_POST['state_id'];
			$country_id=$_POST['country_id'];
			$email=$_POST['email'];
			$address=$_POST['address'];
			$contact_number=$_POST['contact_number'];
			$gender=$_POST['gender'];
			$user_type=$_POST['user_type'];
			$dob=$_POST['dob'];
			$security_quetions=$_POST['security_questions'];
			$security_answer=$_POST['security_answer'];
			$sql="insert into user(user_name,password,city_id,state_id,country_id,email,address,contact_number,gender,user_type,dob,security_questions,security_answer)values('$user_name','$password','$city_id','$state_id','$country_id','$email','$address','$contact_number','$gender','$user_type','$dob','$security_quetions','$security_answer')";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="Registration Successful";
			header("Location:user.php");
		?>
	</body>
	
</html>
