<?php session_start()?>
<html>
<body>
<?php
$cn=mysqli_connect("localhost","root","","main")or die("check connection");
$product_id=$_POST['product_id'];
$product_name=$_POST['product_name'];
$product_price=$_POST['product_price'];
$category_id=$_POST['category_id'];
$product_description=$_POST['product_description'];
$image_path=$_POST['image_path'];
$sql="update product set product_name='$product_name',product_price='$product_price',product_description='$product_description',category_id='$category_id' where product_id=$product_id";
$result=mysqli_query($cn,$sql);

$sql1="update product_image set image_path='$image_path' where product_id=$product_id";
$result1=mysqli_query($cn,$sql1);

$_SESSION['msg']="Product Updated ";
header("Location:view_product.php");
?>
</body>
</html>
