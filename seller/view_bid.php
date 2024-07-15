<?php session_start() ?>
<?php require_once("inc/header.php");
?>

<?php require_once("inc/content.php");
?>
<html>
    <center>
		<body>
		 <div id="wrapper">


        <div class="container-fluid body-section">
            <div class="row">

              
                <div class="col-md-9">
		
			<br>
				<h1> Product Bid Details</h1>
		
				<table>
				
					<form action="delete_product.php" method="post"> 
						<?php 
				$en= mysqli_connect("localhost","root","","main") or die (myslqi_error());
				$sql="select p.product_id,p.product_name,c.category_name,p.product_price,p.product_description,b.bid_price,u.user_name,b.bid_status,pi.image_path from product p,category c,bid_details bd,bid b,user u,product_image pi where p.category_id=c.category_id && p.product_id=pi.product_id &&  p.product_id=bd.product_id && bd.bid_id=b.bid_id && b.user_id=u.user_id ";
				$result= mysqli_query($en,$sql);
				echo"<br>";

				echo"<table bgcolor='#29a3a3' border='1' cellpadding='10' cellspacing='10' style='border-radius: 10px;width: 90%;text-align: center;'>";
				echo"<tr style='color: #29a3a3;font-weight: bold;background: #FFF;text-transform: capitalize;'>";
				echo"<td> Product id </td> ";
				echo"<td> Product name </td>";
				echo"<td> Category name </td>";
				echo"<td> Product price</td>";
				echo"<td> Product description </td>";
				echo "<td>image</td>";
				echo "<td>bid status</td>";
				echo "<td>bid price</td>";
				
								//echo"<td> Bid status </td>";
				//echo"<td> Delete</td>";
				
				echo"</tr>";
				echo"<br>";

				while($row = mysqli_fetch_array($result))
				{
					echo"<tr>";
					echo"<td> ${row['product_id']}</td>";
					echo"<td> ${row['product_name']}</td>";
					echo"<td> ${row['category_name']}</td>";
					echo"<td> ${row['product_price']}</td>";
					echo"<td> ${row['product_description']} </td>";
					echo "<td><img src=images/$row[image_path] width=60 height=60 /></td>";
					echo "<td>${row['bid_status']}</td>";
					echo "<td>${row['bid_price']}</td>";
					//echo"<td> <a href='delete_product.php?product_id=${row['product_id']}'><u><font color=white>Delete</u></a></td>";
					
					echo"</tr>";
				}

				
				//mysqli_close($en);
			?>
				

				</table>
		</center>
		</body>
</html>
<?php require_once("inc/footer.php");
?>


