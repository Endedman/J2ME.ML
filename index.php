<?php 
error_reporting(0);
$dbhost = 'localhost';
$dbuser = 'endedman';
$dbpass = '';
$dbname = 'jstore2';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//1
$rows_1 = "SELECT * FROM apps WHERE id='1'";
$d_1 = mysqli_query($link, $rows_1);
$row_1 = mysqli_fetch_array($d_1, MYSQLI_ASSOC);
mysqli_free_result($d_1);
//2
$rows_2 = "SELECT * FROM apps WHERE id='2'";
$d_2 = mysqli_query($link, $rows_2);
$row_2 = mysqli_fetch_array($d_2, MYSQLI_ASSOC);
mysqli_free_result($d_2);
//3
$rows_3 = "SELECT * FROM apps WHERE id='3'";
$d_3 = mysqli_query($link, $rows_3);
$row_3 = mysqli_fetch_array($d_3, MYSQLI_ASSOC);
mysqli_free_result($d_3);
//4
$rows_4 = "SELECT * FROM apps WHERE id='4'";
$d_4 = mysqli_query($link, $rows_4);
$row_4 = mysqli_fetch_array($d_4, MYSQLI_ASSOC);
mysqli_free_result($d_4);
$dev=$_GET['dev'];
$id=$_GET['id'];
if ($id) {
	include('template_app.php');
} else if ($dev) {
	include('template_dev.php');
} else {
	include('home.php');
}
// if ($dev) {
// 	include('template_dev.php');
// } else {
// 	include('home.php');
// }

?>
