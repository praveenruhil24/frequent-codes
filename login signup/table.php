<!DOCTYPE html>
<html>
<head>
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
</style>
</head>
<body>

<h2>Basic HTML Table</h2>

<table style="width:100%">
  <tr>
    <th>id</th>
    <th>name</th> 
    <th>email</th>
	<th>password</th>
 </tr>
 
<?php 
$conn = mysqli_connect("localhost","root","","mydata");
$var="select * from users";
$result=mysqli_query($conn,$var);
if(mysqli_num_rows($result)>0)
{
	while($rows=mysqli_fetch_assoc($result)){?>
	<tr>
    <td><?php echo $rows["id"];?></td>
    <td><?php echo $rows["name"];?></td>
	<td><?php echo $rows["email"];?></td>
	<td><?php echo $rows["password"];?></td>
 </tr>
  <?php
	}
}

  ?>
  	
</table>

</body>
</html>

  