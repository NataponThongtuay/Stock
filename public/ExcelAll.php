<?php  
require_once('connect2.php');
$query = "SELECT id,JOB_list,UserName,ItemCode,Name1,UnitName,Qty,Qty_CH as Sum,Qty-Qty_CH,SC,DATE_Create,DATE_Edit,DATE_Edit2,DATE_Edit3   FROM bcstk_list Order By id "or die(print_r($e->getMessage()));
$result = $conn->query($query);
$columnHeader = '';  
$columnHeader = "ID" . "\t" . "JOB_List" . "\t" . "ชื่อพนักงาน" . "\t". "รหัสสินค้า" . "\t". "ชื่อสินค้า" . "\t". "หน่วยนับ" . "\t". "จำนวนนับ" . "\t". "จำนวนในคลัง" . "\t". "ผลต่าง" . "\t". "SC" . "\t". "วันที่นับ" . "\t". "แก้ไข1" . "\t". "แก้ไข2" . "\t". "แก้ไข3" . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($result)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=STOCK_CHECK_AllData.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 