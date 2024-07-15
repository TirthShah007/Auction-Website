<?php session_start()?>
<?php require_once("inc/header.php");
?>

<?php require_once("inc/sidebar.php");
?>

<?php require_once("inc/content.php");
?>
<html>
<body>
<?php
$cn=mysqli_connect("Localhost","root","","main")or die ("check connection");
$city_id=$_GET['city_id'];
$sql="select* from  city where city_id='$city_id'";
$result=mysqli_query($cn,$sql);
$rec=mysqli_fetch_array($result);
mysqli_close($cn);
		?>
<table>
	<center>
			<h1>
			<header>
                	Edit city
              </header></h1>

		<form action="edit_city2.php" method="post">
		<input type="hidden" name="city_id" value="<?php echo $rec['city_id'];?>"/>
		<tr>
			<td>city Name:</td>
			<td><input type="text" required value="<?php echo $rec['city_name']; ?>"
			name="city_name"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"  value="save"/></td>
			
		</tr>
		<tr>
			<td></td>
			<td><a href="city2.php" ><u>Back</u></a></td>
		</tr>
		</center>
		</table>
	</body>
		

</center>
</html>


