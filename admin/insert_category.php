<?php session_start()?>

<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$category_name=$_POST['category_name'];
			$sql="insert into category(category_name)values('$category_name')";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="category inserted";
			header("Location:category.php");
		?>
	</body>

	
</html>