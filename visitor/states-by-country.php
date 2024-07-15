<?php

$country_id = $_POST["country_id"];
$cn = mysqli_connect("localhost","root","","main") or die(mysqli_error());
$result = mysqli_query($cn,"SELECT * FROM state where country_id = $country_id");
?>
<option value="">Select State</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["state_id"];?>"><?php echo $row["state_name"];?></option>
<?php
}
?>