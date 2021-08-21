<?php

use Google\Service\Adsense\Alert;

include"database.class.php";
//new database
$db = new Database();
	
if(isset($_POST['search_user'])){
    //get search user
    $get_user = $db->search_user($_POST['search_user']);
    
}else{
    
    //call method getUser
    $get_user = $db->get_all_user2();
}
require_once('connect.php'); 
require_once('connect2.php'); 
$query = "SELECT COUNT(*) as Counts FROM BCITEM Where MyClass LIKE '".$_POST['SCnum']."' OR MySize LIKE '".$_POST['SCnum']."' "or die(print_r($e->getMessage()));
$result = $pdo->query($query);
$query2 = "SELECT COUNT(*) as Counts2 FROM bcstk_list Where SC LIKE '".$_POST['SCnum']."' AND JOB_List LIKE '".$_POST['create_JOB']."' "or die(print_r($e->getMessage()));
$result2 = $conn->query($query2);
$query4 = "SELECT * FROM bcstk_list Where SC LIKE '".$_POST['SCnum']."' AND JOB_List LIKE '".$_POST['create_JOB']."' "or die(print_r($e->getMessage()));
$result4 = $conn->query($query4);
$query3 = "SELECT Code,Name1 From BCITEM Where Myclass LIKE '".$_POST['SCnum']."'";
$result3 = $pdo->query($query3);
$Y = date("Y")+543;
$y = date("y")+543; 
date_default_timezone_set('Asia/Bangkok');
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Stock</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css"> -->
	
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

	
	<script src="script.js"></script>
    <script src="script2.js"></script>
    </head>
    <body>
    <div class="text-center">
   <div class="container-fluid">
     <h2>รายงานการนับสินค้า</h2>
       <div class="center">
            
            <textbox class="form-control text-left" style="height:100px">SC: <?=$_POST['SCnum'];?><br><?=$_POST['JOBReport'];?><br>ชื่อพนักงาน: <?=$_POST['username3'];?><br><?=$_POST['Timestp'];?></textbox>
            <input type="hidden" name="" value="<?=$_POST['create_JOB'];?>">
       </div>
   </div>
</div>

   <div class="container-fluid">
     <?php
     if (empty($get_user)){
      echo '<h3 class="text-center" style="color : Green">สินค้าของคุณตรวจนับเสร็จสิ้น</h3>';     }
      else{
       echo '<h3 class="text-center" style="color : red">สินค้าที่ข้อมูลยังไม่ถูกต้อง</h3>';
      }
     ?>
   
   <!-- head table -->
   <table class="table table-hover">
     <thead class="thead-dark"  style="font-size: 10px;background-color: #f79b45;">
       <tr>
         <th width="15%">รหัส</th>
         <th width="50%">ชื่อสินค้า</th>
         <!-- <th width="20%">หน่วย</th> -->
         <th width="10%">จำนวน</th>
         <!-- <th width="5%">แก้ไข</th> -->
       </tr>
     </thead>
   <!-- body dynamic rows -->
   <!-- <tbody> -->
								<?php
									$i = 1;
									if(!empty($get_user)){
										foreach($get_user as $user){
								?>
										<tr>
											<td  width="15%" id="search_Code"><?php echo $user['ItemCode']?></td>
											<td  width="45%"><?php echo $user['Name1']?></td>
                      <td  width="15%"><?php
                                if ($user['Sum']>0) {
                                  echo "<p style='color :#FFC300'>เกิน</p>";
                                }else{
                                  echo "<p style='color :#FF0000'>ขาด</p>";
                                }
                      
                      ?></td>
                      <!-- <td  width="10%"><?php echo $user['Sum']?></td> -->
                     </tr>
									
								<?php
										$i++;
                    // echo $i;
										}
									}else{
										echo "<tr><td colspan='5'>ไม่พบข้อมูลการนับที่ผิดพลาด</td></tr>";
									}
								?>
							</tbody>
   </table>
   </div>
          

          <div class="text-center" style="margin-top:15px">
            <input type="submit" name="submit" class="btn btn-success btn-md sm hBack" value="กลับไปแก้ไข" onclick="history.go(-1)";>
            <input type="submit" name="submit" class="btn btn-danger btn-md sm" value="จบการทำงาน" onclick=" confirmAction()">
        </div>
        <br><br>
        
       <?php foreach($result as $results){?>
        <input type="hidden" name="" id="" value="<?=$results['Counts'];?>">
        <?php } ?>
        <?php foreach($result2 as $results2){?>
        <input type="hidden" name="" id="" value="<?=$results2['Counts2'];?>">
        <?php } ?>
        

        <?php
        if ($results['Counts'] != $results2['Counts2']) {
          $SUMs = $results['Counts'] - $results2['Counts2'];
          $SUMSC = $_POST['SCnum'];
          echo "<script>window.alert('รายการสินค้ายังไม่ครบถ้วนตาม SC $SUMSC ขาดอีก $SUMs รายการ');</script>";
        }
        else {
          $SUMSC = $_POST['SCnum'];
          echo "<script>window.alert('รายการสินค้าถูกนับครบถ้วนตาม SC $SUMSC แล้ว กรุณาตรวจสอบจำนวนสินค้าให้ถูกต้องด้วย');</script>";
        }
        ?>

    <script   src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function relocate_home()
{
    //  location.href = "Login.php";
    window.alert('ต้องการจบการทำงาน');
    window.location.href='Login.php';
    
} 
function confirmAction() {
        let confirmAction = confirm("ต้องการจบการทำงานหรือไม่ กรุณาตรวจสอบข้อมูลให้ถูกต้องครบถ้วน");
        if (confirmAction) {
          alert("กำลังออกจากระบบ");
          window.location.href='Login.php';
        } else {
          
        }
      }
</script>
</body>
</html>
