<?php
 $servername = "localhost";
$username = "root";
$password = "";
$db = "inaya";
$mysqli = new  mysqli($servername, $username, $password,$db) or die($mysqli->error);
if(isset($_POST['updaterequest']))
{   
    $id=$_POST['pid'];
    $pritem=$_POST['pritem'];

	$result=$mysqli->query("update products SET cost_per_item = '$pritem' where id = '$id'") or die($mysqli->error);


		echo '<script>alert("Success!");
				window.location.replace("products.php");
		</script>';
	

}


?>	


	
