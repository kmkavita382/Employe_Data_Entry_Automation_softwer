<?php

$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="employetable";
$conn="";

$conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if($conn){
	//echo "connect successfully";

}else{
	echo "connect not successfully";
}


?>