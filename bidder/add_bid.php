<?php session_start()?>

<?php require_once("inc/header.php");
?>
<?php require_once("inc/content.php");
?>
<html>
	<center>
    <table>
			<h1> Product </h1>
	
			
<?php
				if(isset($_SESSION['msg']))
				{
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);	
				}
			?></td>
			</tr>		
			</form>
			</table>

			<?php 
				$en= mysqli_connect("localhost","root","","main") or die (myslqi_error());
				$sql="select p.product_id,max(bid_price),p.product_name,c.category_name,p.product_price,p.product_description,b.bid_price,pi.image_path,u.user_id from product p,category c,bid_details bd,bid b,product_image pi,user u where c.category_id=p.category_id && p.product_id=bd.product_id && bd.bid_id=b.bid_id && p.product_id=pi.product_id && u.user_id=b.user_id group by product_id";
				$result= mysqli_query($en,$sql);
				echo"<br>";

				$en=mysqli_num_rows($result)."records found";
				echo"<table bgcolor='#29a3a3' border='1' cellpadding='10' cellspacing='10' style='border-radius: 10px;width: 90%;text-align: center;'>";
				echo"<tr style='color: #29a3a3;font-weight: bold;background: #FFF;text-transform: capitalize;'>";
				echo"<td> Product id </td> ";
				echo"<td> Product name </td> ";
				echo"<td> Category name </td> ";
				echo"<td> Base Price </td>";
				echo"<td> Product description </td>";
				echo"<td> Current bid </td>";
				echo"<td> Product image</td>";
				echo"<td></td>";
				echo"</tr>";
				echo"<br>";

				while($row = mysqli_fetch_array($result))
				{
					echo"<tr>";
					echo"<td> ${row['product_id']}</td>";
					echo"<td> ${row['product_name']}</td>";
					echo"<td> ${row['category_name']} </td>";
					echo"<td> ${row['product_price']} </td>";
					echo"<td> ${row['product_description']} </td>";
					echo"<td> ${row['bid_price']} </td>";
					echo "<td><img src=images/$row[image_path] width=60 height=60 /></td>";
					echo"<td> <a href='insert_bid.php?product_id=${row['product_id']}'><u><font color=white>Bid</u></a>
						
					</a>
					</td>";
					echo"</tr>";
				}

				echo "</table>";
//				mysqli_close($en);
			?>
				
			
	<center/>

<html/>
<?php require_once("inc/footer.php");
?>
