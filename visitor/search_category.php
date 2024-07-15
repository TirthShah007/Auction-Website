<?php session_start() ?>
<?php require_once("inc/header.php");
?>
<?php require_once("inc/content.php");
?>
<html>

		<body>
		 <div id="wrapper">


        <div class="container-fluid body-section">
            <div class="row">

              
                <div class="col-md-9">
		<center>
			<br>
				<h1>search by category</h1>
				<table>
				
					<form action="search_category.php" method="post">
						<tr>
							<td>category name</td>
					
						<td><select name="category_id">
				<?php
				$en= mysqli_connect("localhost","root","","main") or die (myslqi_error());
				$sql="select * from category";
				$result= mysqli_query($en,$sql);
					while($arr = mysqli_fetch_array($result))
				{
					?>
					<option value="<?php echo $arr['category_id']?>">
					<?php echo $arr['category_name']?>
					</option>
					<?php
				}
				?>
				</select></td>
						</tr>
						<tr>
							<td><input type="submit" name="submit" value="search"></td>
						</tr>
						</form>
				</table>
				
						<?php 
			
				if(isset($_POST['search_category']))
				
				$en= mysqli_connect("localhost","root","","main") or die (myslqi_error());
				$sql="select p.product_id,p.product_name,p.product_price,p.product_description,c.category_id,c.category_name,pi.image_path from product p,category c,product_image pi where p.product_id=c.category_id && p.product_id=pi.product_id && c.category_id='$_POST[category_id]'";
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
					//echo"<td> ${row['category_id']}</td>";
					echo "<td><img src=images/$row[image_path] width=60 height=60 /></td>";
					echo "<td> <a href='insert_bid.php?product_id=${row['product_id']}'><u><font color=white>add bid</u></a></td>";
					echo"</tr>";
				 }

				
				echo "</table>";

			?>
				
				
		<center/>
		
<html/>
<?php require_once("inc/footer.php");
?>
