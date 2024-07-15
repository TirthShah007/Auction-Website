<?php session_start()?>
<?php require_once("inc/header.php");
?>
<?php require_once("inc/content.php");
?>
<center>
<div class="body">
    <div class="body_resize">
      <div class="left">

    <html>
       <head>
            <link rel="stylesheet" href="css11/style.css" media="screen" type="text/css" />
<script>
	function validatePassword(){
		var pass2=document.getElementById("password2").value;
		var pass1=document.getElementById("password1").value;
		if(pass1!=pass2)
			document.getElementById("password2").setCustomValidity("Passwords Don't Match");
		else
			document.getElementById("password2").setCustomValidity('');
	}
</script>
</head>
        <body>
             <table><tr><td><h2>WELCOME</h2>
             </td>
        </tr>
           </table>

<h2><span>Change Password</span></h2>


                <form action="change_pass2.php" method="post">
                <table border="1">

                        <tr>
                            <td>
                                Old Password
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter Old Password" size="20">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                New Password
                            </td>
                            <td>
                                <input type="password" id="password1" name="password1"
                                       placeholder="Enter valid Password"
                                       required name="Password"
                                       title="Maximum Five & Minimum Ten " />
                                      <!-- pattern="[a-z,A-Z,0-9]{5,10}"-->
                                       

                            </td>
                        </tr>
 <tr>
                            <td>
                                Confirm Password
                            </td>
                            <td>
                                <input type="password" id="password2" name="password2"
                                       placeholder="Enter Confirm Password"
                                       required name="Confirm Password"
                                       onkeyup="validatePassword();">

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="submit" value="submit">
                
			                    <a href="index.php" ><u>Back</u></a>
		                </tr>
						</td>
</table>
                </form>
<?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
?>

        <div class="clr"></div>
         </div>
      <div class="right">
<?php require_once("inc/footer.php");
?>
</center>


