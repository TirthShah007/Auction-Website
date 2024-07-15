<?php session_start() ?>

<?php require_once("inc/header.php");
?>

<html lang="en">

<!DOCTYPE html>
<center>
<?php
	$msg = "";
	extract($_POST);
	if(isset($submit)) {
		 $cn=mysqli_connect("localhost","root","","main");
		$sql = "select count(*) from user where user_name = '$user_name' and password = '$password'";
		$res = mysqli_query($cn,$sql) ;
		$arr = mysqli_fetch_array($res);
		$user_id = $arr[0];

$sql1 = "select user_type from user where user_name = '$user_name' and password = '$password'";
		$res1 = mysqli_query($cn,$sql1) ;
		$arr1 = mysqli_fetch_array($res1);
		if($arr1!=null)
		$user_type = $arr1[0];
        
		$count = mysqli_num_rows($res1);
		
		if($count>0 && $user_type=="admin")
		{
			
			$_SESSION['user_id'] = $user_id;
			$_SESSION['email_id'] = $email_id;
			         
			header("Location:http://localhost/project/admin/view_user.php");
			
			
		}
		
		else if($count>0 && $user_type=="bidder")
		{
			
			$_SESSION['user_id'] = $user_id;
			$_SESSION['email_id'] = $email_id;
			         
			header("Location:http://localhost/project/bidder/search_name.php");
			
		}
		else if($count>0 && $user_type=="seller")
		{
			
			$_SESSION['user_id'] = $user_id;
			$_SESSION['email_id'] = $email_id;
			         
			header("Location:http://localhost/project/seller/insert_product.php");
			
		}
		else	
			{	
		    echo "Invalid username or password.";
			}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<center>
	<body>

		<table>
		<div>
          
			<h1>Login</h1>
		</div>
	<form method="post"   bordercolor="black"  action="<?php echo $_SERVER["PHP_SELF"]; ?>">
	<tr>
		<td><b>User name: </b></td>
		<td><input type="text" required 	placeHolder="Enter user name"
			title="Enter correct Username"
			value=""
			name="user_name" />
		</td>
	</tr>
	<tr>
		<td><b>Password: </b></td>
		<td><input 	type="Password" 
			required
			
			placeHolder="EnterPassword"
			name="password" />
		<br /></td>
	</tr>
    <tr>
	<td></td><td>
            <input  type="submit"
			name="submit"
			value="Login" />

            </td>
        </tr>
	
        <tr><td></td><td><a href=forgotpass.php><b><u>Forgot Password</b></u></a></td></tr>
        </table>

		
	</form>
</center>
<br><br><br>
<?php require_once("inc/footer.php");
?>
