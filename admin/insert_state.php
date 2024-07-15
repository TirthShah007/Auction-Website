<?php session_start()?>

<html>
	<body>
		<center>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$state_name=$_POST['state_name'];
			$country_id=$_POST['country_id'];
			$sql="insert into state(state_name,country_id)values('$state_name','$country_id')";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="state inserted";
			header("Location:state.php"); 
		?>
		</center>
	</body>
</html>