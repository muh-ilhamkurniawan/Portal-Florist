<?php
    include("../db.php");

    if(isset($_POST['btn_save']))
    {
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];
        $user_password=$_POST['user_password'];
        $mobile=$_POST['mobile'];
        $address1=$_POST['address1'];
        $address2=$_POST['address2'];

        mysqli_query($con,"insert into user_info(first_name, last_name,email,password,mobile,address1,address2) values ('$first_name','$last_name','$email','$user_password','$mobile','$address1','$address2')") 
                    or die ("Query 1 is inncorrect........");
        header("location: manage_users.php"); 
        mysqli_close($con);
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
	<h1>Tambahkan Pengguna  </h1></div><br>
	
    <form action="add_user.php" name="form" method="post">
        <div class="col-sm-6">
            <p>Nama Depan</p>
            <input name="first_name" class="input-lg" type="text"  id="first_name" style="width:330px" placeholder="tulis di sini" autofocus required><br><br>
        </div>
        <div class="col-sm-6">
            <p>Nama Belakang</p>
            <input name="last_name" class="input-lg" type="text"  id="last_name" style="width:330px" placeholder="tulis di sini" autofocus required><br><br>
        </div>
        <div class="col-sm-6">
            <p>Email</p>
            <input name="email" class="input-lg" type="text"  id="email" style="width:330px" placeholder="tulis di sini" autofocus required><br><br>
        </div>
        <div class="col-sm-6">
            <p>Kata Sandi</p>
            <input name="user_password" class="input-lg" type="text"  id="user_password" style="width:330px"  placeholder="tulis di sini" required><br><br>
        </div>
        <div class="col-sm-6">
            <p>No HP</p>
            <input name="mobile" class="input-lg" type="phone"  id="mobile" style="width:330px" placeholder="tulis di sini" autofocus required><br><br>
        </div>
        <div class="col-sm-6">
            <p>Desa</p>
            <input name="address1" class="input-lg" type="text"  id="address1" style="width:330px" placeholder="tulis di sini" autofocus required><br><br>
        </div>
        <div class="col-sm-6">
            <p>Kecamatan</p>
            <input name="address2" class="input-lg" type="text"  id="address2" style="width:330px" placeholder="tulis di sini" autofocus required><br><br>
        </div>
        <div class="col-sm-12" style="margin-bottom:20px;">
            <button type="submit" class="btn btn-success btn-block center" name="btn_save" id="btn_save" style="font-size:18px">Tambahkan</button>
        </div>
    </form>
</div></div>
<?php include("include/js.php"); ?>
</body>
</html>