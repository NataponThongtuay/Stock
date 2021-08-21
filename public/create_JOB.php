<?php
$Y = date("Y")+543;
$y = date("y")+543; 
date_default_timezone_set('Asia/Bangkok');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Stock_Test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// $TableName = $_POST['create_JOB'].$_POST['SCnum'];
$TableName = $_POST['Location']."".$_POST['SCnum']."_".$_POST['create_JOB'];
$SC = $_POST['SCnum'];
$DATE = $_POST['GetTime'];
$username = $_POST['username2'];
$Location =$_POST['Location'];
$TableName2 = $TableName;
// sql to create table
'<input type="hidden" value="echo $TableName2;"> ';
'<input type="hidden" value="print_r($TableName2);"> ';

$sql = "INSERT INTO BCJOB (JOB_ID,JOB_List,UserName,Location,SC,DATE_TIME) VALUES(null,'$TableName','$username','$Location','$SC','$DATE') ";

if ($conn->query($sql) === TRUE) {
  // echo "Table MyGuests created successfully";
} else {
  // echo "Error creating table: " . $conn->error;
}

$conn->close();
// header( "refresh:1;url=Stock.php" );

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
    </head>
    <body>
    <div id="login">
<form id="" action="Stock.php" method="post">
   <div class="container-fluid">
       <div class="row">
           <h1 class="text-center">ตรวจสอบข้อมูล</h1>
            <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xs-7" style="margin-top:10px">
            <input type="text" class="INTer" value="รายงาน: <?="JOB_".$_POST['SCnum']."_".date("d.m.$y")."_".$_POST['username2'];?>" disabled="disabled"><br>
            <input type="hidden" name="JOBReport" value="<?="JOB_".$_POST['SCnum']."_".date("d.m.$y")."_".$_POST['username2'];?>"">
            <input type="text" class="INTer" value="<?="ชื่อพนักงาน: " .$_POST['username2'];?>" disabled="disabled">
            <input type="hidden" name="username2" value="<?="" .$_POST['username2'];?>"">
            <input type="hidden" name="create_JOB" value="<?= "".$_POST['Location']."".$_POST['SCnum']."_".$_POST['create_JOB']?>">
            <br>
            <input type="text" class="INTer" value="<?=$_POST['GetTime'];?>" disabled="disabled">
            <input type="hidden" name="GetTime" value="<?="" .date("d-m-$Y G:i:s");?>"">
            </div>
            <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xs-4" style="margin-top:10px">
            <input type="text" class="SC1" value="<?="SC: " .$_POST['SCnum'];?>" disabled="disabled">
            <input type="hidden" name="SCnum" value="<?="" .$_POST['SCnum'];?>"">
            <input type="hidden" name="Location" value="<?="".$_POST['Location'];?>">
            </div>
       </div>
            <div class="text-center">
           <input type="submit" name="submit" class="btn btn-success btn-md sm" value="ตกลง">
            <input type="button" class="btn btn-danger btn-md sm" value="ยกเลิก" onclick="history.go(-1);">
            </div>
        </div>  
   </div>
   <script   src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </body>   
</html>
<!-- <script type="text/javascript">
		window.onload=function(){
			window.setTimeout('document.qrcodeRedirectForm.submit()', 100)
		}
	</script> -->