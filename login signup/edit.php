<?php

$conn = mysqli_connect("localhost", "root","","assignmnt");
if($conn)
{
echo("Successful connection");
}
else{
	echo "not successful";
}
if(isset($_GET['Id']))
{
$sql = "select * from signup_table where Id='".$_GET['Id']."'";
$result=mysqli_query($conn, $sql);
$row= mysqli_fetch_assoc($result);

		$fname=$row["Firstname"];
		$lname=$row["Lastname"];
		$uname=$row["Username"];
		$email=$row["Email"];
		$pswd=$row["Password"];
		$img=$row["Image"];
}	
if(isset($_POST['edit'])){
	$fname=$_POST['Firstname'];
	$lname=$_POST['Lastname'];
	$uname=$_POST['Username'];
	$email=$_POST['Email'];
	$pswd=$_POST['Password'];
	$target_path = "uploads/";  
	
$target_path = $target_path.basename( $_FILES['Upload']['name']);   
  
if(move_uploaded_file($_FILES['Upload']['tmp_name'], $target_path)) { 
?>
<script> 
    alert( "File uploaded successfully!");
</script>	
<?php
} else{  

$target_path=$img; 

    
}
    $sql = "UPDATE signup_table SET Firstname='$fname',Lastname='$lname', Username='$uname', Email='$email', Password='$pswd', Image='$target_path' WHERE Id='".$_GET['Id']."'";

if (mysqli_query($conn, $sql)) {
	?>
	<script>
    alert("Record updated successfully!");
	</script>
	<?php
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
    
}
?>      



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 10%;
    border-radius: 70%;
}

.container {
    padding: 16px;
}
.myform{
width: 50%;
margin: 0px auto;

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<h2 style="text-align:center">Update Data</h2>

<form class="myform" action="" method="post" enctype="multipart/form-data">
  <div class="imgcontainer">
    <img src="uploads2525.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label ><b>Firstname</b></label>
    <input type="text"  name="Firstname" value="<?php echo $fname; ?>" >

	 <label ><b>Lastname</b></label>
    <input type="text"  name="Lastname" value="<?php echo $lname; ?>" >

	<label ><b>Username</b></label>
    <input type="text"  name="Username" value="<?php echo $uname; ?>" >

    <label ><b>Email</b></label>
    <input type="text"  name="Email" value="<?php echo $email; ?>">
        
    <label ><b>Password</b></label>
    <input type="password"  name="Password" value="<?php echo $pswd; ?>">

	 <label><b>Profile Picture</b></label>
    <input type="file"  name="Upload" >

    <input type="submit" name="edit" value="Edit">
    
  </div>
  

<!--
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    
  </div>-->
</form>

</body>
</html>