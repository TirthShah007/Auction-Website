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
			<h1> city list </h1>
	
			<form action="insert_city.php" method="post"> 
			<tr>
				<td> City <br/> <br/> </td>
				<td> <input type="text" required name="city_name" placeholder="Enter city Name">
			<br> <br> </td>
		
			</tr>
			<tr>
				<td>State</td>
				<td><select name="state_id">
				<?php
				$en= mysqli_connect("localhost","root","","main") or die (myslqi_error());
				$sql="select * from state";
				$result= mysqli_query($en,$sql);
					while($arr = mysqli_fetch_array($result))
				{
					?>
					<option value="<?php echo $arr['state_id']?>">
					<?php echo$arr['state_name']?>
					</option>
					<?php
				}
				?>
				</select></td>
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
				$sql="select c.city_id,c.city_name,s.state_name from city c, state s where c.state_id=s.state_id";;
				$result= mysqli_query($en,$sql);
				echo"<br>";

				echo mysqli_num_rows($result)."records found";
				echo"<table border ='1'>";
				echo"<tr>";
				echo"<td> city id </td> ";
				echo"<td> city Name </td> ";
				echo"<td> state Name</td>";
				echo"<td> Add New </td>";
				echo"</tr>";
				echo"<br>";

				while($row = mysqli_fetch_array($result))
				{
					echo"<tr>";
					echo"<td> ${row['city_id']}</td>";
					echo"<td> ${row['city_name']} </td>";
					echo"<td> ${row['state_name']} </td>";
					echo"<td> <a href='edit_city.php?city_id=${row['city_id']}'><u>Edit</u></a>
						<a href='delete_city.php?city_id=${row['city_id']}'>
					<u>delete</u>
					</a>
					</td>";
					echo"</tr>";
				}

				echo "</table>";
				//mysqli_close($en);
			?>
				

			
	<center/>

<html/>