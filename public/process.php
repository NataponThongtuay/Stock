<?php
include"database.class.php";
require_once('connect.php'); 
$Y = date("Y")+543;
$y = date("y")+543; 
date_default_timezone_set('Asia/Bangkok');
//create object
$process = new Database();

	//Add_user
	if(isset($_POST['send_ItemCode'])){
		//รับข้อมูลจาก FORM ส่งไปที่ Method add_user
		$process->add_user($_POST);
	}
	// show edit data form
	if(isset($_POST['show_user_id'])){
		
		$edit_user = $process->get_user($_POST['show_user_id']);
		$E = 0;
		echo'<form id="edit_user_form">
			  <div class="form-group">
			  <input type="text" class="form-control" name="edit_ItemCode" value="'.$edit_user['ItemCode'].'" readonly>
			  </div>
			  <div class="form-group">
				<label >ชื่อสินค้า</label>
				<input type="text" class="form-control" name="edit_Name1" value="'.$edit_user['Name1'].'" readonly>
			  </div>
			  <div class="form-group">
				<label >หน่วย</label>
				<input type="text" class="form-control" name="edit_UnitName" value="'.$edit_user['UnitName'].'" readonly>
			  </div>
			  <div class="form-group">
				<label >จำนวน</label>
				<input type="text" class="form-control" name="edit_Qty" value="" autocomplete="off" required="required">
			  </div>
			  <input type="hidden" name="edit_Time" value="วันที่: '.date("d-m-$Y G:i:s").'">
			  <input type="hidden" name="edit_user_id" value="'.$edit_user['id'].'" >
			  <input type="hidden" name="edit_user_Lo" value="'.$edit_user['Location'].'" >
			</form>';
		

	}
	
	//edit user 
	if(isset($_POST['edit_user_id'])){
		
		$process->edit_user($_POST);
		
	}
	
	// //delete user
	// if(isset($_POST['delete_user_id'])){
		
	// 	$process->delete_user($_POST['delete_user_id']);
	// }

	//create job
	if(isset($_POST['create_JOB'])){
		
		$process->create_JOB($_POST);
		
	}

?>