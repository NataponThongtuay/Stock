<?php 
require_once('connect.php'); 
$query = "SELECT * FROM BCSale Order By Code "or die(print_r($e->getMessage()));
$result = $pdo->query($query);
$Y = date("Y")+543;
$y = date("y")+543; 
date_default_timezone_set('Asia/Bangkok');
?> 
<!DOCTYPE html>
<script src="script2.js"></script>
<html xmlns="http://www.w3.org/1999/xhtml"></html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="../dist/css/bootstrap-select.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/bootstrap-select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="dist/js/bootstrap-select.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>
<?php 
require_once('connect.php'); 
$query = "SELECT * FROM BCSale Order By Code "or die(print_r($e->getMessage()));
$result = $pdo->query($query);
?> 
<!------ Include the above in your HEAD tag ---------->
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container sq col-sm-8">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="POST">
                            <h3 class="text-center text-info">เข้าสู่ระบบ</h3>
                            <br> <br>
                            <div class="form-group">
                            <select class="selectpicker form-control" id="number"  name='username' data-container="body" data-live-search="true" title="กรุณาเลือกบัญชี" data-hide-disabled="true" required>
                            <?php foreach($result as $results){?>
                                <option value="<?php echo $results["Name"];?>">
                                <?php echo $results['Code'],"&nbsp;",$results["Name"]; ?>
                                </option>
                                <?php } ?>
                                <!-- <option value="TWO">Two</option>
                                <option value="THREE">Three</option> -->
                                </select>
                            </div>
                            <div class="text-center">
                                <!-- <input type="submit" name="submit" class="btn btn-info btn-md sm" value="LOGIN" onclick="myConfirm();"> -->
                                <input type="submit" style="width:40%" name="submit" class="btn btn-info btn-md sm" value="เริ่มงานใหม่"  onclick=" NewJOB(); this.form.action='JOB_selection.php'; submit();">
                                <input type="submit" style="width:40%" name="submit" class="btn btn-warning btn-md sm" value="ทำต่องานเดิม"  onclick=" ConJOB(); this.form.action='JOB_Continue.php'; submit();">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/8.10.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/8.10.0/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
</body>
</html>
<?php
if(isset($_POST['click']))
{
    $date_clicked = date('Y-m-d H:i:s');;
    echo "Time the button was clicked: " . $date_clicked . "<br>";
}
?>
<script>
    function NewJOB() {
        window.alert('กำลังเริ่มต้นทำงานใหม่');
      }
      function ConJOB() {
        window.alert('กำลังเริ่มทำงานต่อจากเดิม');
      }
</script>