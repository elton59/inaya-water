<?php
 $servername = "localhost";
$username = "root";
$password = "";
$db = "inaya";
$mysqli = new  mysqli($servername, $username, $password,$db) or die($mysqli->error);
if(isset($_POST['update_request']))
{   
    $id=$_POST['pid'];
    $pritem=$_POST['pritem'];
	$sid=$_POST['sid'];

	$result=$mysqli->query("update products SET cost_per_item = '$pritem',vendor_id='$sid', status='filled' where id = '$id'") or die($mysqli->error);


		echo '<script>alert("Success!");
				window.location.replace("products.php");
		</script>';
	

}


?>	


	
