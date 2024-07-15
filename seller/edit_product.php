<?php session_start() ?>

<?php require_once("inc/header.php");
?>


<html>
<center>
<body>
<?php
$cn=mysqli_connect("Localhost","root","","main")or die ("check connection");
$product_id=$_GET['product_id'];
$sql="select p.product_id,p.product_name,p.product_price,p.product_description,c.category_name,pi.image_path from product p,category c,product_image pi where p.category_id=c.category_id && p.product_id=pi.product_id && p.product_id='$product_id'";
$result=mysqli_query($cn,$sql);
$rec=mysqli_fetch_array($result);
mysqli_close($cn);
		?>
		
<table>

			<h1>
			<header>
			
                	Edit product
              </header></h1>
			  <center>

		<form action="edit_product2.php" method="post">
		<input type="hidden" name="product_id" value="<?php echo $rec['product_id'];?>"/>
		<tr>
			<td>Product Name:</td>
			<td><input type="text" required value="<?php echo $rec['product_name']; ?>"
			name="product_name"/></td>
		</tr>
		<tr>
		<td>Category Name:</td>
			<td>
				<select name="category_id">
				<?php
					$cn = mysqli_connect("localhost","root","","main") or die(mysqli_error());
					$sql = "select * from category";
					$result = mysqli_query($cn,$sql);
					while($arr=mysqli_fetch_array($result))
					{
						?>
						<option value="<?php echo $arr['category_id']?>"><?php echo $arr['category_name']?></option>
						<?php
					}
						mysqli_close($cn);
						?>
				</select>
			</td>
		</tr>
		<tr>
			<td>product_price:</td>
			<td><input type="text" required value="<?php echo $rec['product_price']; ?>"
			name="product_price"/></td>
		</tr>
		
		<tr>
			<td>product_description:</td>
			<td><input type="text" required value="<?php echo $rec['product_description']; ?>"
			name="product_description"/></td>
		</tr>
		
		<tr>
			<td>image:</td>
			<td><input type="file" value="<?php echo $rec['image_path']; ?>"
			
			name="image_path"/></td>
		</tr>
		
		
		<tr>
			<td></td>
			<td><input type="submit"  value="save"/></td>
			
		</tr>
		<tr>
			<td></td>
			<td><a href="view_product.php" ><u>Back</u></a></td>
		</tr>
		
		</table>
		
	</body>
		

</center>
</html>
<?php require_once("inc/footer.php");
?>