<?php
require_once('connect.php'); // Connect Database


		
$stmt = "SELECT DISTINCT BCITEM.MySize from BCITEM
left join BCSTKLocation on BCITEM.Code = BCSTKLocation.ItemCode
where BCSTKLocation.WHCode = '".$_POST['search_SC']."' ORDER BY BCITEM.MySize ASC";
// $stmt->execute(["".$_POST['search']."%", "%".$_POST['search']."%"]);
$results = $pdo->query($stmt);
if (isset($_POST['ajax'])) { echo json_encode($results); }
			


// echo $term;
?>
<select class="form-control form-control-lg" id="exampleFormControlSelect1" >
                                <?php foreach($results as $result){?>
                                <option value="<?php echo $result["MySize"];?>">
                                <?php echo $result["MySize"]; ?>
                                </option>
                                <?php } ?>
                                </select>
            </select>
            

