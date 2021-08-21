<?php
require_once('connect.php'); // Connect Database


		
$stmt = "SELECT DISTINCT bcitem.Code,BCItemunit.Name from BCPricelist
left join bcitem on bcitem.Code = BCPriceList.ItemCode
left join  BCItemunit on BCPricelist.UnitCode = BCItemunit.Code
left join BCBarCodeMaster on BCBarCodeMaster.ItemCode = bcitem.Code
WHERE BCBarCodeMaster.BarCode LIKE '".$_POST['search_Code']."'";
// $stmt->execute(["".$_POST['search']."%", "%".$_POST['search']."%"]);
$results = $pdo->query($stmt);
if (isset($_POST['ajax'])) { echo json_encode($results); }
			


// echo $term;
?>
<select class="form-control form-control-lg" id="exampleFormControlSelect1" >
                                <?php foreach($results as $result){?>
                                <option value="<?php echo $result["Name"];?>">
                                <?php echo $result["Name"]; ?>
                                </option>
                                <?php } ?>
                                </select>
            </select>
            

