<?php session_start()?>
<html>
<body>
<?php
$cn=mysqli_connect("localhost","root","","main")or die ("check connection");
$state_id=$_POST['state_id'];
$state_name=$_POST['state_name'];
$sql="update state set state_name='$state_name' where state_id=$state_id ";
$result=mysqli_query($cn,$sql);
$_SESSION['msg']="state Updated ";
header("Location:state.php");
?>
</body>
</html>
