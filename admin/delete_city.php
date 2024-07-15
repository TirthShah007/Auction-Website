<?php session_start()?>
<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$city_id=$_GET['city_id'];
			$sql="delete from city where city_id='$city_id'";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="city deleted";
			header("Location:city.php");
		?>
	</body>

	
</html>