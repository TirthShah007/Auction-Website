<?php session_start()?>
<?php require_once("inc/header.php");
?>

<?php require_once("inc/sidebar.php");
?>

<?php require_once("inc/content.php");
?>
<html>
	<center>
    <table>
			<h1> Product </h1>
	
			<form action="insert_product.php" method="post"> 
			<tr>
				<td> product: <br/> <br/> </td>
				<td> <input type="text" required name="product_name" placeholder="Enter product Name">
			<br> <br> </td>
		    </tr>
			<td><h3>Category Name:</h3></td>
			<td>
				<select name="category_name">
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
			
			<td><h3>product price:</h3></td>
			<td><input type="number" required name="product_price" placeholder="Enter product price"></td>
			<tr>
			<td>
			
			<tr>
			
			<td><h3>product description</h3></td>
			<td><textarea cols=20 rows=5 name="description" placeholder="Enter product description"></textarea></td>
		</tr>
			
			<td colspan="2" align="center"> 
			<input type="submit" value="submit" name="btn"></td>
			</tr>
			<tr>
			<td>
			
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
				$sql="select * from product";
				$result= mysqli_query($en,$sql);
				echo"<br>";

				$en=mysqli_num_rows($result)."records found";
				echo"<table border ='1'>";
				echo"<tr>";
				
				echo"<td> product name </td> ";
				echo"<td> Add New </td>";
				echo"</tr>";
				echo"<br>";

				while($row = mysqli_fetch_array($result))
				{
					echo"<tr>";
					echo"<td> ${row['country_id']}</td>";
					echo"<td> ${row['country_name']} </td>";
					echo"<td> <a href='edit_country.php?country_id=${row['country_id']}'><u>Edit</u></a>
						<a href='delete_country.php?country_id=${row['country_id']}'>
					<u>delete</u>
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