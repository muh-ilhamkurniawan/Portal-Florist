<?php

session_start();
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
 	<?php include("include/header.php");?>
   	<div class="container-fluid main-container">
		<?php include("include/side_bar.php");?>
		<div class="col-md-9 content" style="margin-left:10px">
  			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:#fa972e">
					<h1>Selamat Datang Di Admin Panel</h1>
					
				</div><br>
				<div class="panel-body">
				<h4>Silahkan pilih menu yang ingin diakses pada sidebar sebelah kiri</h4>
				<h3>
					<?php 
					if(isset($_POST['success'])) {
					$success = $_POST["success"];
					echo "<h1 >Tanaman berhasil ditambahkan &nbsp;&nbsp;  <span style='color:#0C0' class='glyphicon glyphicon-ok'></h1></span>";
					}
					?>
				</h3>
				</div>
			</div>
		</div>
	</div>
<?php include("include/js.php"); ?>
</body>
</html>