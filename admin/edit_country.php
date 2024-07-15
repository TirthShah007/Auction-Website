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
$country_id=$_GET['country_id'];
$sql="select* from  country where country_id='$country_id'";
$result=mysqli_query($cn,$sql);
$rec=mysqli_fetch_array($result);
mysqli_close($cn);
		?>
<table>
			<h1>
			<header>
                	Edit Country
              </header></h1>

		<form action="edit_country2.php" method="post">
		<input type="hidden" name="country_id" value="<?php echo $rec['country_id'];?>"/>
		<tr>
			<td>Country Name:</td>
			<td><input type="text" required value="<?php echo $rec['country_name']; ?>"
			name="country_name"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"  value="save"/></td>
			
		</tr>
		<tr>
			<td></td>
			<td><a href="country.php" ><u>Back</u></a></td>
		</tr>
		</table>
	</body>
		

</center>
</html>


