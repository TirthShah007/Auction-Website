<?php

$state_id = $_POST["state_id"];
$cn = mysqli_connect("localhost","root","","main") or die(mysqli_error());
$result = mysqli_query($cn,"SELECT * FROM city where state_id = $state_id");
?>
<option value="">Select City</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["city_id"];?>"><?php echo $row["city_name"];?></option>
<?php
}
?>