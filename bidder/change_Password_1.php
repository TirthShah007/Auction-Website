<?php
	    session_start();
		$cn = mysql_connect("localhost","root","") or die(mysql_error());
		$db = mysql_select_db("project1",$cn) or die(mysql_error());
                $Uname=$_SESSION['Uname'];
                $Password=$_POST['Password'];
                $Password2=$_POST['Password2'];

		$sql = "select User_Id from 01User where Uname = '$Uname' and Password = '$Password'";
		$res = mysql_query($sql) or die(mysql_error());
		$arr = mysql_fetch_array($res) or die(mysql_error());
		$User_Id = $arr[0];
		if($User_Id>0)
                {
                    
                    $sql = "update 01User set Password = '$Password2' where Uname='$Uname'";
                    $res = mysql_query($sql) or die(mysql_error());
                    $_SESSION['msg']="Password Is Updated....";
			header("Location: changepass.php");
			die;
		}
		else		$msg = "Access deny";
		mysql_close() or die(mysql_error());

?>