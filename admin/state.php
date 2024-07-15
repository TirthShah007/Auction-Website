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
			<h1> State list </h1>
	
			<form action="insert_state.php" method="post"> 
			<tr>
				<td> State <br/> <br/> </td>
				<td> <input type="text" required name="state_name" placeholder="Enter state Name">
			<br> <br> </td>
		
			</tr>
			<tr>
				<td>Country </td>
				<td><select name="country_id">
				<?php
				$en= mysqli_connect("localhost","root","","main") or die (myslqi_error());
				$sql="select * from country";
				$result= mysqli_query($en,$sql);
					while($arr = mysqli_fetch_array($result))
				{
					?>
					<option value="<?php echo $arr['country_id']?>">
					<?php echo $arr['country_name']?>
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
				$sql="select s.state_id,s.state_name,c.country_name from state s, country c where s.country_id=c.country_id";
				$result= mysqli_query($en,$sql);
				echo"<br>";

				echo mysqli_num_rows($result)."records found";
				echo"<table border ='1'>";
				echo"<tr>";
				echo"<td> state id </td> ";
				echo"<td> state Name </td> ";
				echo"<td> Country Name</td>";
				echo"<td> Add New </td>";
				echo"</tr>";
				echo"<br>";

				while($row = mysqli_fetch_array($result))
				{
					echo"<tr>";
					echo"<td> ${row['state_id']}</td>";
					echo"<td> ${row['state_name']} </td>";
					echo"<td> ${row['country_name']} </td>";
					echo"<td> <a href='edit_state.php?state_id=${row['state_id']}'><u>Edit</u></a>
						<a href='delete_state.php?state_id=${row['state_id']}'>
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