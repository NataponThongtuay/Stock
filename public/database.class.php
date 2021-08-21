<?php
class Database {
 
       private $host = 'localhost'; //ชื่อ Host 
	   private $user = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
	   private $password = ''; // password สำหรับเข้าจัดการฐานข้อมูล
	   private $database = 'Stock_Test'; //ชื่อ ฐานข้อมูล
	//    private $TableName = $_POST['create_JOB'];
		
	//function เชื่อมต่อฐานข้อมูล
	protected function connect(){
		
		$mysqli = new mysqli($this->host,$this->user,$this->password,$this->database);
			
			$mysqli->set_charset("utf8");

			if ($mysqli->connect_error) {

			    die('Connect Error: ' . $mysqli->connect_error);
			}

		return $mysqli;
	}
	
	//function เรื่ยกดูข้อมูล all user
	public function get_all_user(){
	
		$JOB_Search = $_POST['create_JOB'];
		$db = $this->connect();
		$get_user = $db->query("SELECT * FROM BCSTK_List WHERE JOB_LIST LIKE '%".$JOB_Search."%'");
		while($user = $get_user->fetch_assoc()){
			$result[] = $user;
		}
		
		if(!empty($result)){
			
			return $result;
		}
	}
	public function get_all_user2(){
		$SC_Search = $_POST['SCnum'];
		$User_Search = $_POST['username3'];
		$JOB_Searchs = $_POST['create_JOB'];
		$db = $this->connect();
		$get_user = $db->query("SELECT*,Qty-Qty_CH as Sum FROM bcstk_list Where Qty-Qty_CH != 0 AND bcstk_list.UserName LIKE '%".$User_Search."%' AND bcstk_list.SC LIKE '%".$SC_Search."%' AND bcstk_list.JOB_List LIKE '%".$JOB_Searchs."%'");
		while($user = $get_user->fetch_assoc()){
			$result[] = $user;
		}
		
		if(!empty($result)){
			return $result;
		}
	}
	
	public function search_user($post = null){
		
		$db = $this->connect();
		$get_user = $db->query("SELECT * FROM BCSTK_List WHERE name LIKE '%".$post."%' ");
		
		while($user = $get_user->fetch_assoc()){
			$result[] = $user;
		}
		
		if(!empty($result)){
			
			return $result;
		}
		
	}
	
	public function get_user($user_ItemCode){
		$db = $this->connect();
		$get_user = $db->prepare("SELECT id,ItemCode,Name1,UnitName,Qty,Location FROM BCSTK_List WHERE ItemCode = ?");
		$get_user->bind_param('i',$user_ItemCode);
		$get_user->execute();
		$get_user->bind_result($id,$ItemCode,$Name1,$UnitName,$Qty,$Location);
		$get_user->fetch();
		
		$result = array(
			'id'=>$id,
			'ItemCode'=>$ItemCode,
			'Name1'=>$Name1,
			'UnitName'=>$UnitName,
			'Qty'=>$Qty,
			'Location'=>$Location
		);
		
		return $result;
	}

	//function เพื่ม user
	public function add_user($data){
		
		$db = $this->connect();
		
		$add_user = $db->prepare("INSERT INTO BCSTK_List (id,JOB_List,UserName,ItemCode,Name1,UnitName,Qty_CH,Qty,SC,Location,DATE_Create) VALUES(null,?,?,?,?,?,?,?,?,?,?) ");
		
		$add_user->bind_param("ssssssssss",$data['Send_create_JOB'],$data['send_UserName'],$data['send_ItemCode'],$data['send_Name1'],$data['send_UnitName'],$data['send_Qty_CH'],$data['send_Qty'],$data['send_SC'],$data['Send_Location'],$data['send_TimeSend']);
		if(!$add_user->execute()){
			
			echo $db->error;
			
		}else{
			
			echo "บันทึกข้อมูลเรียบร้อย";
		}
	}
	// function edit user
	public function edit_user($data){
		$db = $this->connect();
		$DE =$data['edit_user_id'];
		$LOE = $data['edit_user_Lo'];
		'<input type="hidden" value" echo $DE;">';
		$query =$db->query("SELECT*FROM bcstk_list where id LIKE '%".$DE."%' AND Location LIKE '%".$LOE."%'");
		if ($result = mysqli_fetch_array($query)){

			if (($result['DATE_Edit']) ==='') {
				
				$add_user = $db->prepare("UPDATE BCSTK_List SET Qty = ? , DATE_Edit = ? WHERE id = ?");
				$add_user->bind_param("sss",$data['edit_Qty'],$data['edit_Time'],$data['edit_user_id']);
				if(!$add_user->execute()){
			
					echo $db->error;
					
				}else{
					echo "บันทึกข้อมูลเรียบร้อย";
					
					
				}
			}
			elseif ((($result['DATE_Edit'])!== '')&&($result['DATE_Edit2'])=== '') {  
				$add_user = $db->prepare("UPDATE BCSTK_List SET Qty = ? , DATE_Edit2 = ? WHERE id = ?");
				$add_user->bind_param("sss",$data['edit_Qty'],$data['edit_Time'],$data['edit_user_id']);
				if(!$add_user->execute()){
			
					echo $db->error;
					
				}else{
					// echo $E;
					echo "บันทึกข้อมูลเรียบร้อย";
					
					
				}
			}
			elseif ((($result['DATE_Edit2'])!== '')&&($result['DATE_Edit3'])=== '') {  
				$add_user = $db->prepare("UPDATE BCSTK_List SET Qty = ? , DATE_Edit3 = ? WHERE id = ?");
				$add_user->bind_param("sss",$data['edit_Qty'],$data['edit_Time'],$data['edit_user_id']);
				if(!$add_user->execute()){
			
					echo $db->error;
					
				}else{
					// echo $E;
					echo "บันทึกข้อมูลเรียบร้อย";
					
					
				}
			}
			elseif ((($result['DATE_Edit'])!== '')&&($result['DATE_Edit2'])!== ''&&($result['DATE_Edit3'])!== '') {  
				
				
					echo "ไม่สามารถแก้ไขข้อมูลได้แล้ว";
					
					
				
			}
		}
	}
		public function create_JOB($data){
			$db = $this->connect();
			$add_user = $db->prepare("INSERT INTO BCJOB (JOB_ID,JOB_List,SC,DATE_Time) VALUES(null,?,?,?) ");
			$add_user->bind_param("sss",$data['Send_create_JOB'],$data['send_SC'],$data['send_TimeSend']);
			if(!$add_user->execute()){
			
				echo $db->error;
				
			}else{
				
				echo "บันทึกข้อมูลเรียบร้อย";
			}
		}

}
?>