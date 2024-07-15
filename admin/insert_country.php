<?php session_start()?>

<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$country_name=$_POST['country_name'];
			$sql="insert into country(country_name)values('$country_name')";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="country inserted";
			header("Location:country.php");
		?>
	</body>
	
</html>
