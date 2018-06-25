<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.abc {
    text-decoration: none;
    float: right;
    border: 1px solid blue;
    margin-right: 90px;
    padding: 10px 20px;
    border-radius: 12px;
    background: #000;
    color: #fff;
}
</style>
</head>
<body>

<span>Basic HTML Table</span>
<a href="logout1.php" class="abc">Logout</a>
<table style="width:100%">
  <tr>
    <th>Id</th>
    <th>Firstname</th> 
    <th>Lastname</th>
	<th>Username</th>
	<th>Email</th>
	<th>Password</th>
	<th>Image</th>
	<th>Action</th>
 </tr>
 
<?php 
$conn = mysqli_connect("localhost","root","","assignmnt");
$var="select * from signup_table";
$result=mysqli_query($conn,$var);
if(mysqli_num_rows($result)>0)
{
	while($rows=mysqli_fetch_assoc($result)){
		?>
	<tr>
    <td><?php echo $Id=$rows["Id"];?></td>
    <td><?php echo $rows["Firstname"];?></td>
	<td><?php echo $rows["Lastname"];?></td>
	<td><?php echo $rows["Username"];?></td>
	<td><?php echo $rows["Email"];?></td>
	<td><?php echo $rows["Password"];?></td>
	<td><img src="<?php echo $rows["Image"];?>"></td>
	<td><a href="edit.php?Id=<?php echo $Id; ?>">Edit</a></td>
    <td><a href="delete.php?Id=<?php echo $Id; ?>" class="confirmation">Delete</a></td>
<!-- Include jQuery - see http://jquery.com -->
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script>
 </tr>
  <?php
	}
}

  ?>
  	
</table>

</body>
</html>