<?php session_start()?>

<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			 $product_name=$_POST['product_name'];
			 $category_id=$_POST['category_id'];
			 $product_price=$_POST['product_price'];
			 $product_description=$_POST['product_description'];
			 $sql="insert into product(product_name,category_id,product_price,product_description) values ('$product_name','$category_id','$product_price','$product_description')";
			 $result= mysqli_query($en,$sql);
			 $_SESSION['msg']="product inserted";
			 header("Location:product.php");
		?>
	</body>
	
</html>
