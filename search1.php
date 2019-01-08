<?php  
$server="localhost";
$user= "root";
$password="";
$database="test";
try {
$con=mysqli_connect($server,$user,$password,$database);   
} catch (Exception $e) {
    echo $e->getMessage();
    
}  
?>
 
<!DOCTYPE>
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<?php
    include("search1.php");
    print($comb[1]);
    $q1 = $_GET['q1']; 
    // gets value sent over search form
     
    $min_length = 1;
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($con,$query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($con,"SELECT * FROM dtcdata
            WHERE (`Bus_No` LIKE '%".$query."%')") or die(mysql_error());
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                if( $results['Bus_No']==$query ){
                echo "<p><h3>".$results['Bus_No']."</h3>".$results['route']."</p>";
                break;
                }
            }
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
?>
</body>
</html>