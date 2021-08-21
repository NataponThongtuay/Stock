<?php
require_once('connect.php'); // Connect Database
	
function get_Code($pdo,$search_Code){	
			
			// $pdo = OpenConnection();
			$stmt = $pdo->prepare("SELECT DISTINCT bcitem.Code,bcitem.Name1,BCItemunit.Name,BCPricelist.SalePrice1,BCBarCodeMaster.BarcodeName from BCPricelist
						left join bcitem on bcitem.Code = BCPriceList.ItemCode
						left join  BCItemunit on BCPricelist.UnitCode = BCItemunit.Code
						left join BCStklocation on BCStklocation.ItemCode = bcitem.Code
						left join BCBarCodeMaster on BCBarCodeMaster.ItemCode = bcitem.Code
						WHERE BCBarCodeMaster.BarCode LIKE ? OR BCitem.Code LIKE ?  ORDER BY bcitem.Code");
			$stmt->execute(["".$search_Code."", "".$search_Code.""]);
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
		$CodeList = $Code['BarcodeName'];
	}
	print_r($CodeList);
	// echo json_encode($CodeList); 
	// if (isset($_POST['ajax'])) { echo json_encode($CodeList); }

};
?>
