<?php session_start() ?>
<?php require_once("inc/header.php");
?>
<?php require_once("inc/content.php");
?>

<center>
<html>
<body>
<?php
$cn=mysqli_connect("Localhost","root","","main")or die ("check connection");
$product_id=$_GET['product_id'];
$sql="select p.product_id,max(bid_price),p.product_name,c.category_name,p.product_price,p.product_description,b.bid_price,pi.image_path from product p,category c,bid_details bd,bid b,product_image pi where p.category_id=c.category_id && p.product_id=bd.product_id && b.bid_id=bd.bid_id && p.product_id=pi.product_id && p.product_id='$product_id'";
$result=mysqli_query($cn,$sql);
$rec=mysqli_fetch_array($result);
mysqli_close($cn);
?>
<table>
			<h1>
			<header>
                	Product details
              </header></h1>
		
		<form action="insert_bid2.php" method="post">
	
		<tr>
			<td>Product_id:</td>
			<td><label value="<?php echo $rec['product_id']; ?>"
			name="product_id"/><?php echo $rec['product_id']; ?></label></td>
		</tr>
		
		<tr>
			<td>Product_name:</td>
			<td><label value="<?php echo $rec['product_name']; ?>"
			name="product_name"/><?php echo $rec['product_name']; ?></label></td>
		</tr>
		<tr>
			<td>Product image:</td>
	      
			<td><img src=images/$row['image_path'] width=60 height=60;
			name="image_path"/></td>
		</tr>
		<tr>
			<td>Category_name:</td>
			<td><label value="<?php echo $rec['category_name']; ?>"
			name="category_name"/><?php echo $rec['category_name']; ?></label></td>
		</tr>
		<tr>
			<td>Product_price:</td>
			<td><label value="<?php echo $rec['product_price']; ?>"
			name="product_price"/><?php echo $rec['product_price']; ?></label></td>
		</tr>
		<tr>
			<td>Product_description:</td>
			<td><label value="<?php echo $rec['product_description']; ?>"
			name="product_description"/><?php echo $rec['product_description']; ?></label></td>
		</tr>
		<tr>
			<td>Current bid:</td>
	  <td><label value="<?php echo $rec['bid_price']; ?>"
			name="bid_price"/><?php echo $rec['bid_price']; ?></label></td> 
		</tr>
		
		<tr>
			<td>Your bid</td>
	  <td><input type="text" required name="your_bid"/></td> 
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"  value="bid"/></td>
			
		</tr>
		<tr>
			<td></td>
			<td><a href="add_bid.php" ><u>Back</u></a></td>
		</tr>
		</table>
	</body>
		
		
</center>
</html>

<?php require_once("inc/footer.php");
?>
