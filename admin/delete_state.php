<?php session_start()?>
<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$state_id=$_GET['state_id'];
			$sql="delete from state where state_id='$state_id'";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="state deleted";
			header("Location:state.php");
		?>
	</body>

	
</html>