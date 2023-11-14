<?php
    include("../db.php");
    $order_id=$_REQUEST['order_id'];

    $result=mysqli_query($con,"select order_id, f_name, email, address, city, keterangan, struk, noref, status from orders_info where order_id='$order_id'")or die ("query 1 incorrect.......");

    list($order_id, $f_name, $email, $address, $city, $keterangan, $struk, $noref, $status)=mysqli_fetch_array($result);

    if(isset($_POST['btn_save'])) 
    {
        $status=$_POST['status'];

        mysqli_query($con,"update orders_info set  status='$status' where order_id='$order_id'")or die("Query 2 is inncorrect..........");

        header("location: orders.php");
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
   	<div class="container-fluid main-container">
	    <?php include("include/side_bar.php");?>
        <div class="col-sm-9" style="margin-left:10px"> 
            <div class="panel-heading" style="background-color:#fa972e">
	            <h1>Detail Transaksi </h1>
            </div><br>
            <div class="panel-body" style="background-color:#E6EEEE;">
            <form action="edit_orders.php" name="form" method="post" enctype="multipart/form-data">
            <div class="col-lg-6">
            <div class="col-sm-7 ">
                    <label style="font-size:18px;">Order ID</label><br>
                    <input class="input-lg" style="font-size:18px; width:330px" name="order_id" type="text"  id="order_id" value="<?php echo $order_id; ?>" disabled><br><br>
                </div>
                <div class="col-sm-7 ">
                    <label style="font-size:18px;">Nama Lengkap</label><br>
                    <input class="input-lg" style="font-size:18px; width:330px" name="f_name" type="text"  id="f_name" value="<?php echo $f_name; ?>" disabled><br><br>
                </div>
                <div class="col-sm-7 ">
                    <label style="font-size:18px;">Email</label><br>
                    <input class="input-lg" style="font-size:18px; width:330px" name="email" type="text"  id="email" value="<?php echo $email; ?>" disabled><br><br>
                </div>
                <div class="col-sm-7 ">
                    <label style="font-size:18px;">Desa</label><br>
                    <input class="input-lg" style="font-size:18px; width:330px" name="address" type="text"  id="address" value="<?php echo $address; ?>" disabled><br><br>
                </div>
                <div class="col-sm-7 ">
                    <label style="font-size:18px;">Kecamatan</label><br>
                    <input class="input-lg" style="font-size:18px; width:330px" name="city" type="text"  id="city" value="<?php echo $city; ?>" disabled><br><br>
                </div>
                <div class="col-sm-7 ">
                    <label style="font-size:18px;">Petunjuk Lokasi</label><br>
                    <textarea id="keterangan" name="keterangan" class="input-lg" style="resize:vertical; font-size:18px; width:330px;" disabled><?php echo $keterangan; ?></textarea>
                </div>
            </div>
            <div class="col-lg-6">
                
                <div class="col-sm-7 ">
                    <label style="font-size:18px;">Bukti Transfer</label><br>
                    <img src='../struk_images/<?php echo $struk; ?>' style='width:150%; border:groove #000'><br><br>
                </div>
                <div class="col-sm-7 ">
                    <label style="font-size:18px;">No Refrensi</label><br>
                    <input class="input-lg" style="font-size:18px; width:330px" name="noref" type="number"  id="noref" value="<?php echo $noref; ?>" disabled><br><br>
                </div>
                <div class="col-sm-7 ">
                    <label style="font-size:18px;">Status</label><br>
                    <?php
                        if ($status=='Diproses') {
                            echo '         
                            <select class="input-lg" style="font-size:18px; width:330px" name="status" id="status">
                                <option value="Diproses" selected>Diproses</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Selesai">Selesai</option>
                            </select>'
                            ;
                        } elseif ($status=='Dikirim') {
                            echo '         
                            <select class="input-lg" style="font-size:18px; width:330px" name="status" id="status">
                                <option value="Diproses">Diproses</option>
                                <option value="Dikirim" selected>Dikirim</option>
                                <option value="Selesai">Selesai</option>
                            </select>'
                            ;
                        } elseif ($status=='Selesai') {
                            echo '         
                            <select class="input-lg" style="font-size:18px; width:330px" name="status" id="status">
                                <option value="Diproses">Diproses</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Selesai" selected>Selesai</option>
                            </select>'
                            ;
                        }
                    ?>

                        <br><br>
                </div>
                <div class="col-sm-7">
                    <a href="orders.php" class="btn btn-warning " style="font-size:18px">Kembali</a>
                    <button type="submit" class="btn btn-success " name="btn_save" id="btn_save" style="font-size:18px">Simpan</button>
                </div>
                
            </div>
            </div>

            </form>
</div></div>
<?php include("include/js.php");?>
</body>
</html>