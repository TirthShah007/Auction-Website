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
			<h1> Country list </h1>
	
			<form action="insert_country.php" method="post"> 
			<tr>
				<td> Country: <br/> <br/> </td>
				<td> <input type="text" required name="country_name" placeholder="Enter Country Name">
			<br> <br> </td>
		
			</tr>
			<tr>
			<td>
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
				$sql="select * from country";
				$result= mysqli_query($en,$sql);
				echo"<br>";

				$en=mysqli_num_rows($result)."records found";
				echo"<table border ='1'>";
				echo"<tr>";
				echo"<td> Country id </td> ";
				echo"<td> Country Name </td> ";
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