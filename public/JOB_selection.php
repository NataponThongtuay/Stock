<?php 
require_once('connect.php'); 
// $query = "SELECT * FROM BCSale Order By Code "or die(print_r($e->getMessage()));
// $result = $pdo->query($query);
$Y = date("Y")+543;
$y = date("y")+543; 
date_default_timezone_set('Asia/Bangkok');
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
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="add_JOB_form" action="create_JOB.php" method="post">
                            <h3 class="text-center text-info">เลือกใบงาน</h3>
                            <br> <br>
                            <div>
                            <input class="form-control" type="text" name="Name" disabled=disabled value="ชื่อพนักงาน :<?="" .$_POST['username'];?>">
                            <input class="" type="hidden" name="username2" value="<?=$_POST['username'];?>">
                            <select class="selectpicker form-control" id="search_SC" name="Location" data-container="body" data-live-search="true" title="กรุณาเลือกใบงาน" data-hide-disabled="true"required>
                                <option value="" selected>เลือกคลัง</option>
                                <option value="หน้าร้าน">หน้าร้าน</option>
                                <option value="หลังร้าน">หลังร้าน</option>
                            </select>
                        
                            <select class="selectpicker form-control" id="resultUnit" name="SCnum" data-container="body" data-live-search="true" title="กรุณาเลือกใบงาน" data-hide-disabled="true"required>                                                
                                                <option value="TEst3" selected label="คลัง"></option>
                                                <!-- <option   value="1"></option> -->
                            </select>
                
                           
                                <input type="hidden" name="GetTime" value="<?="วันที่: " .date("d-m-$Y G:i:s");?>">
                                <input type="hidden" name="create_JOB" id="create_JOB" value="<?="".date("dm$Y")."_".$_POST['username'];?>">
                                <div class="text-center" style="margin-top:10px">
                                <input type="submit" name="submit" class="btn btn-info btn-md sm"  value="ตกลง" onclick="return add_JOB_form();">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
