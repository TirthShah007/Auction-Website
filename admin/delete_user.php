<?php session_start()?>
<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$user_id=$_GET['user_id'];
			$sql="delete from user where user_id='$user_id'";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="user deleted";
			header("Location:view_user.php");
		?>
	</body>

	
</html>