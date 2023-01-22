<?php
$dbhost = 'localhost';
$dbuser = 'endedman';
$dbpass = '';
$dbname = 'jstore2';
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
echo "link: <a href='http://j2me.ml?id=$nomer'>http://j2me.ml?id=$nomer</a><br>";
}
?>