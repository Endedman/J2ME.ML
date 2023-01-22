<?php
$dbhost = 'localhost';
$dbuser = 'admin_default';
$dbpass = '';
$dbname = 'admin_default';
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$q = $_GET['q'];
if(isset($q)){
if(empty($q)) {exit ("Вы не ввели данные");}}
echo "Вы искали: $q<br>";
$rows = "SELECT * FROM apps WHERE app_name LIKE '$q'";
$result_rows = mysqli_query($link, $rows);
while($row=mysqli_fetch_array($result_rows, MYSQLI_ASSOC)) {
$nomer = $row["id"];
$name = $row["app_name"];
echo "id: $nomer.<br>";
echo "appname: $name. <br>";
echo "link: <a href='http://168.119.140.238:40693?id=$nomer'>http://168.119.140.238:40693?id=$nomer</a><br>";
}
?>