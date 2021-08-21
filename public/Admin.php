<?php
if(isset($_GET['act'])){
	if($_GET['act']== 'excel'){
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=export.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	}
}
require_once('connect2.php');
$query = "SELECT *,Qty-Qty_CH as Sum FROM bcstk_list left join bcjob on bcjob.JOB_list = bcstk_list.JOB_list Order By id "or die(print_r($e->getMessage()));
$result = $conn->query($query);
$query2 = "SELECT * FROM bcjob Order By JOB_ID "or die(print_r($e->getMessage()));
$result2 = $conn->query($query2);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stock Report</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        
        
    </head>
    <body class="sb-nav-xl">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-" style="background-color: #FF7F50;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3">Admin</a>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
               
           
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">ตารางแสดงรายงาน</h1>
                        
                        
                        <div class="card mb-8">
                            <div class="card-header" style="background-color: #FF7F50;">
                                <i class="fas fa-table me-1" style="color: white;"></i>
                                datatables
                            </div>
                            <div class="card-body">
<form class="row gy-2 gx-3 align-items-center" id="login-form"action="EXcel_Job.php" method="POST">
  <div class="col-auto">
                    <select class="form-select" id="JOBLIST"  name='JOBLIST' data-container="body" data-live-search="true" title="กรุณาเลือกบัญชี" data-hide-disabled="true" required>
                                        <option value="" selected>ดาวน์โหลด Excel ตามหมายเลขเอกสาร</option>
                                        <?php foreach($result2 as $results2){?>
                                        <option value="<?php echo $results2["JOB_list"];?>">
                                        <?php echo $results2["JOB_list"]; ?>
                                        </option>
                                        <?php } ?>
                                        <!-- <option value="TWO">Two</option>
                                        <option value="THREE">Three</option> -->
                    </select>
  </div>
                    <div class="col-auto">
                    <input type="submit" name="submit" class="btn btn-info btn-md sm" value="DOWNLOAD" style="color :azure">
                    </div>
                    <div class="col-auto">
                   
						<a href="ExcelAll.php" class="btn btn-primary btn-md sm">ดาวน์โหลดทั้งหมด</a>
				
                    </div>
</form><br>
                                <table id="datatablesSimple">
                                    <thead style="font-size: 10px;">
                                        <tr>
                                            <th width="6%">รหัสสินค้า</th>
                                            <th width="5%">คลัง</th>
                                            <th width="5%">SC</th>
                                            <th width="4%">พนักงาน</th>
                                            <th width="30%">ชื่อสินค้า</th>
                                            <th width="4%">หน่วยนับ</th>
                                            <th width="4%">จำนวนนับ</th>
                                            <th width="4%">จำนวนเต็ม</th>
                                            <th width="4%">ขาด/เกิน</th>
                                            <th width="12%">เวลาที่นับ</th>
                                            <th width="12%">เวลาแก้ไข</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>รหัสสินค้า</th>
                                            <th>คลัง</th>
                                            <th>SC</th>
                                            <th>พนักงาน</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>หน่วยนับ</th>
                                            <th>จำนวนนับ</th>
                                            <th>จำนวนเต็ม</th>
                                            <th>ขาด/เกิน</th>
                                            <th>เวลาที่นับ</th>
                                            <th>เวลาแก้ไข</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if(!empty($result)){?>
                                      <?php  { ?>
                                     <?php foreach($result as $results){?>
                                        <tr>
                                            <td  style="display:none;"><?php echo$results['JOB_list'] ?></td>
                                            <td><?php echo$results['ItemCode'] ?></td>
                                            <td><?php echo$results['Location'] ?></td>
                                            <td><?php echo$results['SC'] ?></td>
                                            <td><?php echo$results['UserName'] ?></td>  
                                            <td><?php echo$results['Name1'] ?></td>
                                            <td><?php echo$results['UnitName'] ?></td>
                                            <td><?php echo$results['Qty'] ?></td>
                                            <td><?php echo$results['Qty_CH'] ?></td>
                                            <td><?php echo$results['Sum'] ?></td>
                                            <td><?php echo$results['DATE_Create'] ?></td>
                                            <td><?php echo$results['DATE_Edit'] ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php
										
										}
									}else{
										echo "<tr><td colspan='5'>ไม่พบข้อมูล</td></tr>";
									}
								?>
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                   
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
