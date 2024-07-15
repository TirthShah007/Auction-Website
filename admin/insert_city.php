<?php session_start()?>

<html>
	<body>
		<center>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$city_name=$_POST['city_name'];
			$state_id=$_POST['state_id'];
			$sql="insert into city(city_name,state_id)values('$city_name','$state_id')";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="city inserted";
			header("Location:city.php");
		?>
		</center>
	</body>

	
</html>