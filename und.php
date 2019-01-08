<?php  
$server="localhost";
$user= "root";
$password="";
$database="test";
try {
$connection=mysqli_connect($server,$user,$password,$database);
if ($connection) {
	//echo "database connection was successful";	# code...
}	
} catch (Exception $e) {
	echo $e->getMessage();
	
}
$query = "SELECT route FROM dtcdata WHERE Bus_No='522'";
$run_query=mysqli_query($connection,$query);
if($run_query){
	echo "data selected";
}else{
	echo "data not selected";
}
$result=mysqli_fetch_array($run_query,MYSQLI_ASSOC);
?>
<br></br>
<?php  
echo $result["route"];
$q="SELECT route FROM dtcdata WHERE Bus_No='522'";
//$run_q=mysqli_num_rows()
mysqli_close($connection);
?>