<?php 
include"database.class.php";
	
//new database
$db = new Database();

if(isset($_POST['search_user'])){
  //get search user
  $get_user = $db->search_user($_POST['search_user']);
  
}else{
  
  //call method getUser
  $get_user = $db->get_all_user();
}
require_once('connect.php'); 

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
    <script src="script3.js"></script>
    <html xmlns="http://www.w3.org/1999/xhtml"></html>
    </head>
    <body>
  <form method="post" action="Report.php">
   <div class="container-fluid">
       <div class="row">
            <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xs-7" style="margin-top:10px">
            <input type="text" class="INTer" value="รายงาน: <?="" .$_POST['create_JOB']?>" disabled="disabled"><br>
            <input type="hidden" name="JOBReport" value="รายงาน: <?="" .$_POST['create_JOB']?>">
            <input type="text" class="INTer" value="<?="ชื่อพนักงาน: " .$_POST['username2'];?>" disabled="disabled">
            <input type="hidden" name="username3" value="<?="".$_POST['username2'];?>"">
            <input type="hidden" name="create_JOB" id="" value="<?="" .$_POST['create_JOB']?>">
            <br>
            <input type="text" class="INTer" value="<?=$_POST['GetTime'];?>" disabled="disabled">
            <input type="hidden" name="Timestp" value="<?=$_POST['GetTime'];?>">
            </div>
            <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xs-4" style="margin-top:10px">
            <input type="text" class="SC1" value="<?="SC: " .$_POST['SCnum'];?>" disabled="disabled">
            <input type="hidden" name="SCnum" value="<?="".$_POST['SCnum'];?>">
            <input type="hidden" name="Location" value="<?="".$_POST['Location'];?>">
            </div>
            
            <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xs-4 text-center" style="margin-bottom: 5px;">
            <br><br>
						<input type="button" class="btn btn-info" data-toggle="modal" data-target="#add_user" value="ตรวจนับ" style="margin-top: 10px;width: 108px;">
					  </div>
       </div>
            
   </div>      
         
           
      
  
   <div class="container-fluid" style="padding-left: 5px; padding-right: 5px;">
   
   <!-- head table -->
   <table class="table table-hover">
     <thead class="thead-dark"  style="font-size: 10px;background-color: #f79b45;">
       <tr>
         <th width="4%">No.</th>
         <th width="13%">รหัส</th>
         <th width="53%">ชื่อสินค้า</th>
         <th width="20%">หน่วย</th>
         <th width="5%">จำนวน</th>
         <th width="5%">แก้ไข</th>
       </tr>
     </thead>
   <!-- body dynamic rows -->
   <tbody>
								<?php

									$i = 1;
									if(!empty($get_user)){
										foreach($get_user as $user){
								?>
										<tr>
                      <td  width="4%"><?php echo $i ?></td>
											<td  width="13%"><?php echo $user['ItemCode']?></td>
											<td  width="53%"><?php echo $user['Name1']?></td>
											<td  width="20%"><?php echo $user['UnitName']?></td>
                      <td  width="5%"><?php echo $user['Qty']?></td>
                      <input type="hidden" name="" id="" value="<?php echo $user['Location']?>">
											<td  width="5%"><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return show_edit_user(<?php echo $user['ItemCode']?>);">แก้ไข</button></td>
											<!-- <td><button class="btn btn-danger btn-xs" onclick="return delete_user(<?php echo $user['ItemCode']?>);">ลบ</button></td> -->
										</tr>
									
								<?php
										$i++;
										}
									}else{
										echo "<tr><td colspan='5' class='text-center'>ไม่พบข้อมูล</td></tr>";
									}
								?>
							</tbody>
   </table>
   </div>
         
          <div class="text-center" style="margin-top:15px">
            <input type="submit" style="width:40%" name="submit" class="btn btn-success btn-md sm" value="บันทึก"  onclick="myCancel();">
            <input type="button" style="width:40%" name="submit" class="btn btn-danger btn-md sm " value="กลับไปแก้ไข" onclick="history.go(-1)";>
            <br><br>
              <!-- <input type="submit" style="width:40%" name="submit" class="btn btn-success btn-md sm col-xs-6" value="บันทึก">
              <input type="button" style="width:40%" class="btn btn-danger btn-md sm col-xs-6" value="ยกเลิก" onclick="myCancel();"> -->
            </div>
      </form>   
        <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">ตรวจนับสินค้า</h4>
			  </div>
			  <div class="modal-body">
              <form id="add_user_form">
                <div class="row p-l-20 p-r-10">
                
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                    <input type="hidden" name="" id="create_JOB" value="<?="" .$_POST['create_JOB'];?>">
						<label class="col-xs-4" style="margin-top: 4px;">รหัสสินค้า :</label><input class=" col-xs-3 " type="input" value=""  style="margin-top: 1px;margin-bottom: 1px;padding: 0px;" autocomplete="off" name="send_ItemCode" id="search_Code">
                     <input type="hidden" name="search_RO" id="search_RO" value="<?="".$_POST['Location'];?>">  
                    </div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
						<label class="col-xs-4" style="margin-top: 2px;">ชื่อสินค้า :</label><textarea class=" form-control-col-xs-6 " type="input" name="send_Name1" value=""  style="width: 182.4px;height: 60px;margin-top: 1px;margin-bottom: 1px" autocomplete="off" id="resultDiv" readonly></textarea>
                    </div>
                    <!-- แสดงผลตัวแปร description -->
					<!-- <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        
					</div> -->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <div class="col-xs-6">
                            <select class="form-control form-control-lg" id="resultUnit" name="send_UnitName" value="หน่วยนับ" required>
                                                
                                                <option value="TEst3" selected label="หน่วยนับ"></option>
                                                <!-- <option   value="1"></option> -->
                            </select>
                            <!-- <select class="selectpicker form-control" id="search_SCQTY" name="Location" data-container="body" data-live-search="true" title="กรุณาเลือกใบงาน" data-hide-disabled="true"required>
                                <option value="" selected>เลือกคลัง</option>
                                <option value="หน้าร้าน">หน้าร้าน</option>
                                <option value="หลังร้าน">หลังร้าน</option>
                            </select> -->
                    </div>
                    

                    <div class="col-xs-6" style="padding-top:5px">
                        <input class="col-xs-6" type="hidden" name="send_Qty_CH" id="resultQty" autocomplete="off">
                        <!-- <input class="col-xs-6" type="text" name="send_Qty_CH" id="resultQty2" autocomplete="off"> -->
                        <label class="col-xs-6" style="margin-top: 2px;" >จำนวน </label>
                        <input class="col-xs-6" type="text" name="send_Qty" id="" autocomplete="off" required>
                        
                    </div>
                    <div>
                      <input type="hidden" name="send_TimeSend" value="<?="วันที่: " .date("d-m-$Y G:i:s");?>">
                      <input type="hidden" name="send_UserName" value="<?=$_POST['username2'];?>">
                      <input type="hidden" name="send_SC" value="<?=$_POST['SCnum'];?>">
                      <input type="hidden" name="Send_create_JOB" value="<?=$_POST['create_JOB'];?>">
                      <input type="hidden" name="Send_Location" value="<?=$_POST['Location'];?>">

                      
                    </div>
                    </div>
                </form>
                </div>
              
          </div>
          <div id="result"></div>
                <div class="modal-footer">
               
                <button type="button" class="btn btn-primary" onclick="return add_user_form();">บันทึก</button>
             
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
			</div>
		  </div>
		</div>

        <!-- Modal Edit User -->
		<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Form แก้ไขข้อมูล</h4>
			  </div>
			  <div class="modal-body">
					<div id="edit_form"></div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="return edit_user_form();">Save changes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
    
    <script   src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
