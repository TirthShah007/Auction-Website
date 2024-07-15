<?php session_start()?>
<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$category_id=$_POST['category_id'];
			$category_name=$_POST['category_name'];
			$sql="update category set category_name='$category_name' where category_id=$category_id";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="category updated";
			header("Location:category.php");
		?>
	</body>

	
</html>