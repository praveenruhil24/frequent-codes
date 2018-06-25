<?php 
$conn = mysqli_connect("localhost", "root","","assignmnt");
if($conn)
{
echo("Successful connection");
}
if(isset($_POST['submit']))
{
$fname = $_POST["Firstname"];
$lname = $_POST["Lastname"];
$uname = $_POST["Username"];
$email = $_POST["Email"];
$password = $_POST["Password"];


$target_path = "uploads/";  
$target_path = $target_path.basename( $_FILES['Upload']['name']);   
  
if(move_uploaded_file($_FILES['Upload']['tmp_name'], $target_path)) {  
    echo "File uploaded successfully!";  
} else{  
    echo "Sorry, file not uploaded, please try again!";  
} 
$sql = "INSERT INTO signup_table (Firstname,Lastname,Username,Email,Password,Image)
VALUES ('$fname','$lname' ,'$uname','$email','$password','$target_path')";
if (mysqli_query($conn, $sql)) {
    header("Location:login1.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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

<h2 style="text-align:center">Sign up Here</h2>

<form class="myform" action="" method="post" enctype="multipart/form-data">
  <div class="imgcontainer">
    <img src="uploads2525.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Firstname</b></label>
    <input type="text" placeholder="Enter Firstname" name="Firstname" required>

	 <label for="uname"><b>Lastname</b></label>
    <input type="text" placeholder="Enter Lastname" name="Lastname" required>

	<label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="Username" required>

    <label for="psw"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="Email" required>
        
    <label for="uname"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>

	 <label for="uname"><b>Profile Picture</b></label>
    <input type="file"  name="Upload" required>

    <input type="submit" name="submit" value="Sign up">
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>