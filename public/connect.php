<?php
define('DB_CHARSET', 'utf8');
$mssqldriver = '{SQL Server}'; 
$mssqldriver = '{SQL Server Native Client 11.0}';
$mssqldriver = '{ODBC Driver 11 for SQL Server}';
$serverName = '192.168.88.254,1433'; //IP ของเครื่อง DATABASE 192.168.88.254,1433 = CH /192.168.88.125,49750 = TESTPOS
// $serverName = '.';
$userName = 'sa'; // USERNAME
$userPassword = 'BCserver2018'; //PASWORD
$dbName = 'CH'; //DATABASE NAME
    try {
        $pdo = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
        catch(Exception $e){
	        die(print_r($e->getMessage())); }
?>