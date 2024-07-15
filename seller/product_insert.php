<?php session_start()?>
<html>
	<body>
			<?php 
			$cn=mysqli_connect("localhost","root","","main") or die ("check connection");
			$product_name=$_POST['product_name'];
			$product_price=$_POST['product_price'];
			$description=$_POST['description'];
			
			$category_id=$_POST['category_id'];
			$quantity=$_POST['quantity'];
			
$Movie_image = $_FILES['file']['name'];


$target="images/".basename($_FILES['file']['name']);
        if ($_FILES['file']['name'] != "") {
            move_uploaded_file($_FILES['file']['tmp_name'], $target) or
                    die("Could not copy file!");
        } else {
            die("No file specified!");
        }
       
			$sql="insert into product (product_name,product_price,product_description,category_id)values ('$product_name','$product_price','$description','$category_id')";
			$result=mysqli_query($cn,$sql);
			
			$sql="select max(product_id) AS max from product";
			$result=mysqli_query($cn,$sql);
			$res = mysqli_fetch_array( $result);
			$highestValue = $res['max'];
			echo $highestValue;
			
			$sql="insert into product_image (product_id,image_path)values ('$highestValue','$Movie_image')";
			$result=mysqli_query($cn,$sql);
			
			$_SESSION['msg']="Your Product inserted";
			header("Location:product.php");
		?>
		</body>
	</html>