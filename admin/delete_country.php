<?php session_start()?>
<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$country_id=$_GET['country_id'];
			$sql="delete from country where country_id='$country_id'";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="country deleted";
			header("Location:country.php");
		?>
	</body>

	
</html>