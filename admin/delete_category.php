<?php session_start()?>
<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$category_id=$_GET['category_id'];
			$sql="delete from category where category_id='$category_id'";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="category deleted";
			header("Location:category.php");
		?>
	</body>

	
</html>