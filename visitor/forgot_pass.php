<!DOCTYPE html>
<?php session_start() ?>
<html lang="en">

<center>
	<body>
		<table style="color: #29a3a3;" >
		<div class="header_1 wrap_3 color_3">
			<h1>Forgot Password</h1>
			<form action="forgot_pass2.php"method="post">
                        <tr>
                            <td> <td><b><font face='Arial, Helvetica, sans-serif' >Email id:</b></font></td>
                            <td>
                                <input type="text" name="email" size="20" required placeholder="Enter your Email Address">
                            </td>
                        </tr>

                        <tr>
                            <td><td><b><font face='Arial, Helvetica, sans-serif' >
                                Question:</font></b>
                            </td>
                            <td>
                           <select name="security_questions" required>

                <option value="Pet name">What is Your Pet Name?</option>
                <option value="Mother name">What is Your Mother Name?</option>
                <option value="Teacher name">What is Your Fav. Teacher Name?</option>
                <option value="Fav.food">What is Your Fav. Food?</option>

  </select>                            </td>
                       </tr>
 <tr>
                            <td><td><b><font face='Arial, Helvetica, sans-serif'required  >
                                Answer:</font></b>
                            </td>
                            <td>
                                <input type="text" name="security_answer"
                                       placeholder="Enter valid answer" required>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input class="btn_2" type="submit"name="suuser" value="submit">
                            </td>
                        </tr>
</table>
                </form>
<?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>

</center>
</html>






