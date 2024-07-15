<?php session_start()?>
<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$product_id=$_GET['product_id'];
			$sql="delete from product where product_id='$product_id'";
			$result= mysqli_query($en,$sql);
			$_SESSION['msg']="product deleted";
			header("Location:view_product.php");
		?>
	</body>

	
</html>