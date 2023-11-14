<?php

include("db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
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

<?php
include "header.php";
?>
<section class="section">
<div class="container-fluid">	
   	<div class="container-fluid main-container">
      <div class="content" style="margin:0 5%">
        <div class="panel-heading">
        <?php
          if ($page==0) {
            ?> <h1>Transaksi </h1> <?php
          } else {
            ?> <h1>Transaksi Halaman <?php echo $page;?></h1> <?php
          }

        ?>
        </div><br>
        <div class='table-responsive'>  
          <div style="overflow-x:scroll; background-color:white;">
            <table class="table" style="font-size:18px">
            <tr>
              <th width='15%'>Waktu</th>
              <th width='15%'>Tanaman</th>
              <th width='10%'>Desa</th>
              <th width='10%'>Kecamatan</th>
              <th width='20%'>Petunjuk Lokasi</th>
              <th width='10%'>Total</th>
              <th width='5%'>Jumlah</th>
              <th width='5%'>No Refrensi</th>
              <th width='10%'>Status</th>
            </tr>
                    <?php                 
                      
                      $query = "SELECT * FROM orders_info WHERE user_id='$_SESSION[uid]'";
                      $run = mysqli_query($con,$query);
                      if(mysqli_num_rows($run) > 0){

                       while($row = mysqli_fetch_array($run)){
                        $order_id = $row['order_id'];
                        $email = $row['email'];
                        $date = $row['date'];
                        $f_name = $row['f_name'];
                        $address = $row['address'];
                        $city = $row['city'];
                        $total_amount = $row['total_amt'];
                        $user_id = $row['user_id'];
                        $qty = $row['prod_count'];
                        $ket = $row['keterangan'];
                        $noref = $row['noref'];
                        $status = $row['status'];

                      ?>
                          <tr>
                          <td><?php echo $date ?></td>
                            <td> <?php
                            $query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $product_id = $row1['product_id'];

                               $query2 = "SELECT * FROM products where product_id = $product_id";
                               $run2 = mysqli_query($con,$query2);

                               while($row2 = mysqli_fetch_array($run2)){
                               $product_title = $row2['product_title'];
                           ?>
                              <?php echo $product_title ?><br>
                            <?php }}?></td>
                            
                            <td><?php echo $address ?></td>
                            <td><?php echo $city ?></td>
                            <td><?php echo $ket ?></td>
                            <td><?php echo $total_amount ?></td>
                            <td><?php echo $qty ?></td>
                            <td><?php echo $noref ?></td>

                            <?php
                            if ($status=='Diproses') {
                              echo "<td  class='btn btn-warning' style='width:80px;'> $status</td>
                              ";
                            } elseif ($status=='Dikirim') {
                              echo "<td  class='btn btn-primary' style='width:80px;'> $status</td>
                              ";
                            }
                            
                            elseif ($status=='Selesai') {
                              echo "<td  class='btn btn-success' style='width:80px;'> $status</td>";
                            }
                            ?>
                         </tr>
                         <?php } ?>
                        
                     <?php
                   }else {
                     echo "<center><h2>Anda harus masuk terlebih dahulu</h2><br><hr></center>";
                     }
                  ?>
            </table>
          </div>
        </div>
        <nav align="center"> 
          <?php 
            $paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
            $count=mysqli_num_rows($paging);

            $a=$count/5;
            $a=ceil($a);
            echo "<bt>";echo "<bt>";
            for($b=1; $b<=$a;$b++)
            {
          ?> 
            <ul class="pagination " style="border:groove #666">
            <li><a class="label-info" href="orders.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li></ul>
          <?php	
            }
          ?>
        </nav>
      </div>
    </div>
  <?php include("include/js.php");?>
</div>
</section>	
<?php
  include "footer.php";
?>

