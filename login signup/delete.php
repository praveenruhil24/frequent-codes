<?php 
$conn = mysqli_connect("localhost", "root","","assignmnt");
if($conn)
{
echo("Successful connection");
}
else{
	echo "not successful";
}


$sql = "delete from signup_table where id='".$_GET['Id']."'";  
if(mysqli_query($conn, $sql)){  
 echo "Record deleted successfully";
 header("Location:dashboard.php");
}else{  
echo "Could not deleted record: ". mysqli_error($conn);  
} 




?>