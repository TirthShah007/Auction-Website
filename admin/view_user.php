<?php session_start() ?>
<?php require_once("inc/header.php");
?>

<?php require_once("inc/sidebar.php");
?>

<?php require_once("inc/content.php");
?>
<html>
		<body>
		<center>
			<br>
				<h1> User information </h1>
		
				<table>
				
					<form action="delete_user.php" method="post"> 
						<?php 
				$en= mysqli_connect("localhost","root","","main") or die (myslqi_error());
				$sql="select u.user_id,u.user_name,u.email,c.city_name,u.address,u.contact_number, u.gender, u.user_type,u.dob from user u, city c where u.city_id=c.city_id";
				$result= mysqli_query($en,$sql);
				echo"<br>";

				echo"<table border ='1'>";
				echo"<tr>";
				echo"<td> User id </td> ";
				echo"<td> User name </td>";
				echo"<td> City name </td>";
				echo"<td> E-mail</td>";
				echo"<td> Address </td>";
				echo"<td> Contact number  </td> ";
				echo"<td> Gender </td>";
				echo"<td> User_type </td>";
				echo"<td> DOB </td> ";
				echo"<td> Delete</td>";
				
				echo"</tr>";
				echo"<br>";

				while($row = mysqli_fetch_array($result))
				{
					echo"<tr>";
					echo"<td> ${row['user_id']} </td>";
					echo"<td> ${row['user_name']}</td>";
					echo"<td> ${row['city_name']}</td>";
					echo"<td> ${row['email']}</td>";
					echo"<td> ${row['address']} </td>";
					echo"<td> ${row['contact_number']}</td>";
					echo"<td> ${row['gender']} </td>";
					echo"<td> ${row['user_type']}</td>";
					echo"<td> ${row['dob']} </td>";
					echo"<td> <a href='delete_user.php?user_id=${row['user_id']}'><u>Delete</u></a></td>";
					
					echo"</tr>";
				}

				
				mysqli_close($en);
			?>
				

				</table>
		</center>
		</body>
</html>

