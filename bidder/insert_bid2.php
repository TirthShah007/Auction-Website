<html>
	<body>
		<?php
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			  $product_id=$_POST['product_id'];
			 //$product_name=$_POST['product_name'];
			 //$category_name=$_POST['category_name'];
			// $product_price=$_POST['product_price'];
			// $product_description=$_POST['product_description'];
			 $bid_price=$_POST['your_bid'];
			 //$sql="insert into product(product_name,category_id,product_price,product_description,bid_price) values ('$product_name','$category_id','$product_price','$product_description','$bid_price')";
			 $sql="insert into bid (bid_price,bid_date,user_id,bid_status) values ('$bid_price',now(),2,'active')";
			 $result= mysqli_query($en,$sql);
			 
			 $sql1="select max(bid_id)from bid";
			 $result= mysqli_query($en,$sql1);
			 
			 $_SESSION['msg']="Bid inserted";
			 header("Location:add_bid.php");
		?>
	</body>
	
</html>
