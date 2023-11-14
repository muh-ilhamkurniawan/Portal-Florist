<?php

include("../db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
mysqli_query($con,"delete from user_info where user_id='$user_id'")or die("query is incorrect...");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="style/js/jquery.min.js"></script>
<?php
        include ("style.php");
    ?>
</head>
<body>
<?php include("include/header.php"); ?>

<div class="container-fluid">

<?php include("include/side_bar.php"); ?>
<div class="col-sm-9" style="margin-left:10px"> 
<div class="panel-heading" style="background-color:#fa972e">
	<h1>Lihat Pengguna </h1></div><br>

<div style="overflow-x:scroll;">
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
		<th>No</th>
		<th>Nama</th>
        <th>Email</th>
 		<th>No HP</th>
        <th>Alamat</th>
		<th colspan='2'>Aksi</th>
	</tr>	
<?php 
$result=mysqli_query($con,"select * from user_info")or die ("query 2 incorrect.......");
$no=1;
while(list($user_id,$fname,$lname,$email,$password,$mobile,$address1)=
mysqli_fetch_array($result))
{
echo "<tr>
		<td>$no</td>
		<td>$fname $lname</td>
		<td>$email</td>
		<td>$mobile</td>
		<td>$address1</td>";

		echo"
		<td>
			<a href='edit_user.php?user_id=$user_id' class='btn btn-warning'>Edit</a>
		</td>
		<td>
			<a href='manage_users.php?user_id=$user_id&action=delete' class='btn btn-danger'>Hapus</a>
	</td>
	</tr>";
$no++;
}
mysqli_close($con);
?>
</table>
</div>	
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>