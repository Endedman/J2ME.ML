<?php
$dbhost = 'localhost';
$dbuser = 'endedman';
$dbpass = '';
$dbname = 'jstore2';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$rows = "SELECT * FROM apps";
$d = mysqli_query($link, $rows);
$app_name = preg_replace('/\s+/', ' ', $_GET['app_name']);
$dev_name=$_GET['dev_name'];
$icon=$_GET['icon'];
$banner=$_GET['banner'];
// $file=$_GET['file'];
$date=date('l jS \of F Y h:i:s A');
$token=md5($date);
$paid=$_GET['paid'];
$fee=$_GET['fee'];
$paytoken=$_GET['paytoken'];
mysqli_query($link, "INSERT into apps (app_name, dev_name, icon, banner, file, token, paid, fee, paytoken) values ('$app_name', '$dev_name', '$icon', '$banner', 'http://j2me.ml/app/$app_name/$app_name.jar', '$token', '$paid', '$fee', '$paytoken')");
printf('Succeeded, SQL query accepted');
mkdir('/var/www/endedman/data/www/j2me.ml/app/'.$app_name.'/');
printf('Succeeded, mkdir executed!');
?>