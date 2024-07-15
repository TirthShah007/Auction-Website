<?php session_start()?>
<?php require_once("inc/header.php");
?>

<?php require_once("inc/sidebar.php");
?>

<?php require_once("inc/content.php");
?>
<html>
<body>
<center>
<?php
$cn=mysqli_connect("Localhost","root","","main")or die ("check connection");
$state_id=$_GET['state_id'];
$sql="select* from  state where state_id='$state_id'";
$result=mysqli_query($cn,$sql);
$rec=mysqli_fetch_array($result);
mysqli_close($cn);
		?>
<table>
			<h1>
			<header>
                	Edit State
              </header></h1>

		<form action="edit_state2.php" method="post"> 
		<input type="hidden" name="state_id" value="<?php echo $rec['state_id'];?>"/>
		<tr>
			<td>State Name:</td>
			<td><input type="text" required value="<?php echo $rec['state_name']; ?>"
			name="state_name"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"  value="save"/></td>
			
		</tr>
		<tr>
			<td></td>
			<td><a href="state.php" ><u>Back</u></a></td>
		</tr>
		</table>
		</center>
	</body>
		

</center>
</html>


