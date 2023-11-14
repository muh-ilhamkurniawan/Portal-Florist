<?php
	include("../db.php");
	error_reporting(0);
	if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
	{
	$product_id=$_GET['product_id'];
	///////picture delete/////////
	$result=mysqli_query($con,"select product_image from products where product_id='$product_id'")
	or die("query is incorrect...");

	list($picture)=mysqli_fetch_array($result);
	$path="../product_images/$picture";

	if(file_exists($path)==true)
	{
	unlink($path);
	}
	else
	{}
	/*this is delet query*/
	mysqli_query($con,"delete from products where product_id='$product_id'")or die("query is incorrect...");
	}

	///pagination

	$page=$_GET['page'];

	if($page=="" || $page=="1")
	{
	$page1=0;	
	}
	else
	{
	$page1=($page*10)-10;	
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
	<?php include("include/header.php");?>
   	<div class="container-fluid main-container">
		<?php include("include/side_bar.php");?>
    		<div class="col-md-9 content" style="margin-left:10px">
    			<div class="panel-heading" style="background-color:#fa972e">
					<h1>Daftar Produk <?php echo $page;?></h1>
				</div><br>
				<div class='table-responsive'>  
					<div style="overflow-x:scroll; ">
						<table class="table  table-hover table-striped" style="font-size:18px">
							<tr>
								<th>Gambar</th>
								<th>Nama Tanaman</th>
								<th>Kategori</th>
								<th>Deskripsi</th>
								<th>Perawatan</th>
								<th>Harga</th>
								<th>Aksi</th>
							</tr>
							<?php 
								$result=mysqli_query($con,"select product_id,product_image, product_title,product_price,product_cat,product_desc,perawatan from products Limit $page1,10")or die ("query 1 incorrect.....");
								while(list($product_id,$image,$product_name,$price,$cat,$desc,$perawatan)=mysqli_fetch_array($result))
								{
									echo "<tr>
										<td width=20%><img src='../product_images/$image' style='width:70%; border:groove #000'></td>
										<td width=15%>$product_name</td>
										<td width=10%>";
											if($cat==1)
											{
											echo"Bunga";
											}
											else if ($cat==2) {
											echo "Daun";
											}
											else if ($cat==3){
											echo "Pohon";
											}
											else if ($cat==4) {
											echo "Buah";
											}
											else if ($cat==5){
											echo "Akar";
											}
											echo
											"</td>
												<td width=20%>$desc</td>
												<td width=20%>$perawatan</td>
												<td width=10%>$price</td>
												<td width=5%>
												<a class=' btn btn-danger' href='product.php?product_id=$product_id&action=delete'>Hapus</a>
												</td>
											</tr>";
										}
							?>
						</table>
					</div>
				</div>
				<nav align="center">
					<?php 
							//counting paging
							$paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
							$count=mysqli_num_rows($paging);

							$a=$count/10;
							$a=ceil($a);
							echo "<bt>";echo "<bt>";
							for($b=1; $b<=$a;$b++)
							{
					?> 
					<ul class="pagination" style="border:groove #666">
						<li>
							<a class="label-info" href="product.php?page=<?php echo $b;?>">
								<?php echo $b." ";?>
							</a>
						</li>
					</ul>
					<?php	
						}
					?>
				</nav>
			</div>
	</div>
		<?php 
			include("include/js.php");
		?>
</body>
</html>