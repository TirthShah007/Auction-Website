<!DOCTYPE html>
<?php session_start() ?>
<?php require_once("inc/header.php");
?>
<?php require_once("inc/content.php");
?>
<html>
<head>
<script>
	function validatePassword(){
		var pass2=document.getElementById("password1").value;
		var pass1=document.getElementById("password").value;
		if(pass1!=pass2)
			document.getElementById("password1").setCustomValidity("Passwords Don't Match");
		else
			document.getElementById("password1").setCustomValidity('');
	}


  $(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$.ajax({
url: "states-by-country.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#state-dropdown").html(result);
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$.ajax({
url: "cities-by-state.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city-dropdown").html(result);
}
});
});
});


</script>
</head>
<center>
	<body>
	<?php
	if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset ($_SESSION['msg']);
	}
	?>
		<table style="color: #29a3a3;">
		<div class="header_1 wrap_3 color_3">
          
			<h1>Registration</h1>
		</div>
		<form action ="insert_user.php" method="post">
		
		<tr>
			<td><h3>User Name</h3></td>
			<td><input type="text" required name="user_name" placeholder="Enter Full Name"></td>
		</tr>
			
			<td><h3>Password</h3></td>
		
			 <td>
                                <input type="password" minlength="8" id="password" name="password"
                                       placeholder="Enter valid Password"
                                       required name="Password"
                                 />
             </td>                       
                                       
		</tr>
		<tr>
			
			<td><h3>Confirm Password</h3></td>
			
			<td>
                                <input type="password" minlength="8" id="password1" name="password1"
                                       placeholder="Enter Confirm Password"
                                       required name="Confirm Password"
                                       onkeyup="validatePassword();">

            </td>
		</tr>
	
		<tr>
			
			<td><h3>Country Name</h3></td>
			<td>
				<select name="country_id" id="country-dropdown">
				<option value="">Select Country</option>
				<?php
					$cn = mysqli_connect("localhost","root","","main") or die(mysqli_error());
					$sql = "select * from country";
					$result = mysqli_query($cn,$sql);
					while($arr=mysqli_fetch_array($result))
					{
						?>
						<option value="<?php echo $arr['country_id']?>"><?php echo $arr['country_name']?></option>
						<?php
					}
						mysqli_close($cn);
						?>
				</select>
			</td>	
		</tr>
		<tr>
			
			<td><h3>State Name</h3></td>
			<td>
				<select class="form-control" id="state-dropdown">
				</select>
				
			</td>	
		</tr>
		<tr>
			
			<td><h3>City Name</h3></td>
			<td>
				<select class="form-control" id="city-dropdown">
</select>
			</td>	
		</tr>
		<tr>
			<td><h3>Email Id</h3></td>
		<td><input type="email" required name="email" placeholder="Enter Email_Id"></td>
		</tr>
		<tr>
			
			<td><h3>Address</h3></td>
			<td><textarea cols=20 rows=5 required name="address" placeholder="Enter Address"></textarea></td>
		</tr>
		
			<td><h3>Mobile No</h3></td>
			<td><input type="number" min=10 required name="contact_number" placeholder="Enter Mobile No"></td>
		</tr>
		<tr>
			<td><h3>Gender</h3></td>
			<td><input type="radio" name="gender" checked>male
				<input type="radio" name="gender" >female
			</td>
		</tr>
		<tr>
			
			<td><h3>User Type</h3></td>
			<td><select required name="user_type">
			<option value=visitor>Visitor
			<option value=seller>Seller
			<option value=buyer>Buyer
			</select></td>
		</tr>
		<tr>
			
			<td><h3>Dob</h3></td>
			<td><input type="date" required name="dob" placeholder="Enter Date of Birth" ></td>
		</tr>
		
		<tr>
			<td><h3>Security Quetions</td></h3>
			<td><select required name="security_questions">
			<option value="Pet name">What is Your Pet Name?</option>
                <option value="Mother name">What is Your Mother Name?</option>
                <option value="Teacher name">What is Your Fav. Teacher Name?</option>
                <option value="Fav.food">What is Your Fav. Food?</option>
            </select></td>
			
			</tr>
		<tr>
			<td><h3>Security Answer</td></h3>
			
			<td><textarea  recols=20 rows=5 required name="security_answer" placeholder="Enter Answer"></textarea>
		</tr>
		<tr>
	         
			<td colspan="5" align="center"><input class="btn_2" type="submit" value="Submit" name="btn">
    
		</tr>
		</form>
	</table>
	</center>
	</body>
	</html>
	<?php require_once("inc/footer.php");
?>
