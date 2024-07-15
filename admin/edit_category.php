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
		      $en=mysqli_connect("localhost","root","","main")or die("check connection");
			$category_id=$_GET['category_id'];
			$sql="select * from category where category_id='$category_id'";
			$result= mysqli_query($en,$sql);
			$rec=mysqli_fetch_array($result);
			mysqli_close($en);
		?>
		
				<table>
				<header> <h1> Edit category </h1> </header>
				
				<form action="edit_category2.php" method="post">
			
				<input type="hidden" name="category_id" value="<?php echo $rec['category_id'];?>"/>
				<tr>
					<td> category Name : </td>
					<td> <input type="text" required value="<?php echo $rec['category_name'];?>"
					name="category_name"/> </td>
				</tr>
				<tr>
						<td></td>
						<td> <input type="submit" value="save"/> </td> 
				</tr>
				
				<tr>
					<td> </td>
					<td> <a href="category.php"> <u> Back</u> </a></td>
				</tr>
				</table>
	</body>

	
</html>