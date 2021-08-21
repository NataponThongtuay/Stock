<?php
require_once('connect.php'); // Connect Database
	
function get_Code($pdo,$search_Code){	
			// $Send_Location = $_POST['Send_Location']??"";
			// echo $search_Code;
			// $pdo = OpenConnection();
			$stmt = $pdo->prepare("SELECT DISTINCT BCSTKLocation.Qty from BCITEM
            left join BCSTKLocation on BCITEM.Code = BCSTKLocation.ItemCode
            where BCSTKLocation.ItemCode LIKE ? AND BCSTKLocation.WHCode LIKE 'หลังร้าน' ");
			$stmt->execute(["".$search_Code."%", "".$search_Code."%"]);
			// $result = $pdo->query($query);	
			$data = $stmt->fetchAll();
			return $data;
			print_r($stmt);
echo $_POST['search_Code'];
}
if(isset($_POST['search_Code'])){
	$getCode = get_Code($pdo, $_POST['search_Code']);
	$CodeList = array();
	foreach($getCode as $Code){
		$CodeList = number_format($Code['Qty'], 2, '.', '');;
	}
	print_r($CodeList);
	// echo json_encode($CodeList); 
	// if (isset($_POST['ajax'])) { echo json_encode($CodeList); }

};
// echo $_POST['Send_Location'];
// print_r($stmt);
?>

