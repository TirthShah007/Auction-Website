<?php session_start()?>
<html>
<body>
<?php
$cn=mysqli_connect("localhost","root","","main")or die("check connection");
$country_id=$_POST['country_id'];
$country_name=$_POST['country_name'];
$sql="update country set country_name='$country_name' where country_id=$country_id ";
$result=mysqli_query($cn,$sql);
$_SESSION['msg']="Country Updated ";
header("Location:country.php");
?>
</body>
</html>
