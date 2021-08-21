<?php 
require_once('connect2.php'); 
// $query = "SELECT * FROM BCSale Order By Code "or die(print_r($e->getMessage()));
// $result = $pdo->query($query);
$Y = date("Y")+543;
$y = date("y")+543; 
date_default_timezone_set('Asia/Bangkok');
$query = "SELECT * FROM BCJOB where UserName = '".$_POST['username']."'"or die(print_r($e->getMessage()));
$result = $conn->query($query);
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css"> -->
	
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<script src="script.js"></script>
    <script src="script3.js"></script>
    </head>

<body>
    <div id="login" class="Rectangle8">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container sq col-sm-8">
           
                   
                        
                            <h3 class="text-center text-info">เลือกใบงาน ที่ต้องการทำต่อ</h3>
                            <br> <br>
                            <table class="table table-hover">
     <thead class="thead-dark"  style="font-size: 10px;background-color: #f79b45;">
       <tr>
         <th width="15%">SC</th>
         <th width="50%">JOB_LIST</th>
         <th width="10%"></th>
       </tr>
     </thead>
     <?php if(!empty($result)){ ?>
     <?php foreach($result as $results){?>
                                <tr>
                                    <form method="post">
                                    <input type="hidden" name="username2" id="" value="<?php echo $results['UserName']?>">
                                    <input type="hidden" name="SCnum" id="" value="<?php echo $results['SC']?>">
                                    <input type="hidden" name="create_JOB" id="" value="<?php echo $results['JOB_list']?>">
                                    <input type="hidden" name="GetTime" id="" value="<?php echo $results['DATE_Time']?>">
                                    <input type="hidden" name="Location" id="" value="<?php echo $results['Location']?>">
                                    <td width="15%" name="SCnum"><?php echo $results['SC']?></td>
                                    <td width="50%" name="create_JOB"><?php echo $results['JOB_list']?></td>
                                    <td width="10%" id=""><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_user" onclick="this.form.action='Stock.php'; submit();">ทำต่อ</button></td>
                                    <!-- onclick="return show_edit_user(<?php echo $user['ItemCode']?>);" -->
                                    </form>
                                </tr>
                                
     <?php } ?>
     <?php
									}else{
										echo "<tr><td colspan='5'>ไม่พบข้อมูล</td></tr>";
									}
								?>
									
							</tbody>
   </table>
                       
                   
            </div>
        </div>
   

</body>
</html>
