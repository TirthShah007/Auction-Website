<?php session_start() ?>
<?php require_once("inc/header.php");
?>
<?php require_once("inc/content.php");
?>

<html>
	
	<center>

		<table>
			<h1> Search By Name </h1>
	
			<form action="search_name.php" method="post"> 
			<tr>
				<td> Name: <br/> <br/> </td> 
				<td> <input type="text" required name="search_name" placeholder="Enter Product Name">
			<br> <br> </td>
		
			</tr>
			<tr>
			<td>
			<td colspan="2" align="center"> 
			<input type="submit" value="search" name="btn"></td>
			</tr>
					
			</form>
			</table>

			<?php 
				
				if(isset($_POST['search_name']))
				{
				$en= mysqli_connect("localhost","root","","main") or die (myslqi_error());
				$sql="select p.product_id,p.product_name,c.category_name,p.product_price,p.product_description,pi.image_path from product p,category c,product_image pi where p.category_id=c.category_id && p.product_id=pi.product_id && product_name like '%$_POST[search_name]%'";
				$result= mysqli_query($en,$sql);
				
				echo"<table bgcolor='#29a3a3' border='1' cellpadding='10' cellspacing='10' style='border-radius: 10px;width: 90%;text-align: center;'>";
				echo"<tr style='color: #29a3a3;font-weight: bold;background: #FFF;text-transform: capitalize;'>";
				echo"<tr>";
				echo"<td> Product id </td> ";
				echo"<td> Product name </td>";
				echo"<td> Category name </td>";
				echo"<td> Product price</td>";
				echo"<td> Product description </td>";
				echo "<td>image</td>";
				echo "<td> Add bid </td>";
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
					echo "<td> <a href='insert_bid.php?product_id=${row['product_id']}'><u><font color=white>add bid</u></a></td>";
					echo"</tr>";
				}

				}
				echo "</table>";

			?>
			
	<center/>

<html/>
<?php require_once("inc/footer.php");
?>