<?php session_start() ?>
<?php require_once("inc/header.php");
?>
<?php require_once("inc/content.php");
?>

<html>
 <center>

  <body>
    <div id="wrapper">


        <div class="container-fluid body-section">
            <div class="row">

              
                <div class="col-md-9">
                    <h1><b></i>PRODUCT LIST</h1><hr></b>
<form action="product_insert.php" method="post" enctype="multipart/form-data">
<table>
	
	<tr>
		<td> Product Name</td>
		<td> <input type="text" name="product_name" required></td>
	</tr>
	<tr>
		<td> Product Price  </td>
		<td> <input type="text" name="product_price" required></td>
	</tr>
	<tr>
		<td> Description </td>
		<td> <input type="textarea" name="description" required></td>
	</tr>
	
<tr>
			<td>Category</td>
			<td>
                            <select name="category_id">
                                <?php
                                $cn=mysqli_connect("localhost","root","","main") or die(mysqli_eroor());
                                $sql="select * from category";
                                $res=mysqli_query($cn,$sql);
                                while($arr=mysqli_fetch_array($res)){
                                    ?>
                                <option value="<?php echo $arr['category_id'] ?>"><?php echo $arr['category_name'] ?></option>
                                <?php
                                }
                                mysqli_close($cn);
                                ?>
                                </select>
                                
                                
                        </td>
		</tr>
		<tr>
		<td> Quantity </td>
		<td> <input type="text" name="quantity" required></td>
	</tr>
	<tr>
		<td> Image </td>
		<td> <input type="file" name="file" required></td>
	</tr>
	<tr>
		<td colspan ="2" align="center"> <input type="submit" value="submit" name="btnsubmit">
		</td>
	</tr>
	<tr><td>
				<?php
				if(isset($_SESSION['msg']))
				{
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);	
				}
			?>
			</td>
			</tr>
</table>
</form>
	
				

				</table>
		</center>
	
</center>		
</body>
</html>
 <?php require_once("inc/footer.php");
?>


