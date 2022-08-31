<?php 

//sniffer.php 

//защита от непосредственного запуска 

//скрипта кем то посторонним 

/* if (eregi("sniffer.php",$PHP_SELF)) { 

Header("Location: index.php"); 

die(); 

} */ 

extract($HTTP_GET_VARS); 

extract($HTTP_POST_VARS); 

extract($HTTP_COOKIE_VARS); 

extract($HTTP_SERVER_VARS); 

//этот фрагмент кода был позаимствован 

//из системы PHP Nuke ;) 

//далее объявляю переменные 

$fileName="stat.txt"; //имя файла со статистикой 

$maxVisitors=30; //количество записей, отображаемых 

//при просмотре статистики 

$cookieName="visitorOfMySite"; //имя куки 

$cookieValue="1"; //значение куки 

$timeLimit=86400; //срок в секундах, который должен 

//пройти с момента последнего посещения сайта, что бы 

//информация о посетителе записалась повторно. Это 

//значение равно 1 дню, т.е. один и тот же посетитель 

//записывается в статистику раз в одни сутки. Если 

//эту переменную приравнять к нулю, то будут учитываться 

//все посещения одного и того же посетителя 

//далее следуют переменные, отвечающие за отображение 

//статистики 

$headerColor="#808080"; 

$headerFontColor="#FFFFFF"; 

$fontFace="Segoe UI"; 

$fontSize="1"; 

$tableColor="#000000"; 

$rowColor="#CECECE"; 

$fontColor="#0000A0"; 

$textFontColor="#000000"; 

//все переменные подготовлены. 

//Функция записи данных о посетителе 

function saveUserData() { 

GLOBAL $fileName, $HTTP_USER_AGENT, $REMOTE_ADDR, $REMOTE_HOST, 

$HTTP_REFERER, $REQUES_URI; 

$curTime=date("d.m.Y @ H:i:s"); //текущее время и дата 

//подготавливаю данные для записи 

if (empty($HTTP_USER_AGENT)) {$HTTP_USER_AGENT = "Unkwnown";} 

if (empty($REMOTE_ADDR)) {$REMOTE_ADDR = "Not Resolved";} 

if (empty($REMOTE_HOST)) {$REMOTE_HOST = "Unknown";} 

if (empty($HTTP_REFERER)) {$HTTP_REFERER = "No Referer";} 

if (empty($REQUEST_URI)) {$REQUEST_URI = "Unknown";} 

$data_ = $HTTP_USER_AGENT."::".$REMOTE_ADDR."::".$REMOTE_HOST.":: 

".$HTTP_REFERER."::".$REQUEST_URI."::".$curTime."rn"; 

//разделителем будут два ":" 

//далее пишу в файл 

if (is_writeable($fileName) ) : 

$fp = fopen($fileName, "a"); 

fputs ($fp, $data_); 

fclose ($fp); 

endif; 

} 

//функция записи готова. Теперь нужно написать 

//функцию вывода данных из файла статистики 

function showStat () { 

GLOBAL $headerColor, $headerFontColor, $fontFace, $fontSize, $tableColor, 

$fileName, $maxVisitors, $rowColor, $fontColor, $textFontColor; 

//вывожу таблицу 

$fbase=file($fileName); 

$fbase = array_reverse($fbase); 

$count = sizeOf($fbase); 

echo "<font face='$fontFace' color='$textFontColor' size='$fontSize'>"; 

echo "Всего посещений: $count<br><br>"; 

echo "<div align='center'> 

<table cellpadding='2' cellspacing='1' width='95%' 

border='0' bgcolor='$tableColor'>"; 

echo "<tr bgcolor='$headerColor'><td>

<font face='$fontFace' color='$headerFontColor' 

size='$fontSize'>Браузер 

</font> 

</td><td><font face='$fontFace' color='$headerFontColor' 

size='$fontSize'>IP</font></td> 

<td><font face='$fontFace' color='$headerFontColor' 

size='$fontSize'>Хост</font></td> 

<td><font face='$fontFace' color='$headerFontColor'

size='$fontSize'>Ссылка</font></td> 

<td><font face='$fontFace' color='$headerFontColor' 

size='$fontSize'>Страница</font></td> 

<td><font face='$fontFace' color='$headerFontColor' 

size='$fontSize'>Время визита</font></td></tr>"; 

echo "</font><font face='$fontFace' size='$fontSize'>"; 

//открываю файл и запускаю цикл 

$fbase=file($fileName); 

$fbase = array_reverse($fbase); 

for ($i=0; $i<$maxVisitors; $i++) : 

if ($i>= sizeof($fbase)) {break;} 

$s = $fbase[$i]; 

//разделяю 

$strr = explode("::", $s); 

if (empty($strr)) {break;} 

//вывожу данные 

echo "<tr><td bgcolor='$rowColor'>

<font face='$fontFace' color='$fontColor' 

size='$fontSize'>$strr[0]</font> 

</td><td bgcolor='$rowColor'>< 

font face='$fontFace' color='$fontColor' 

size='$fontSize'>$strr[1]</font> 

</td><td bgcolor='$rowColor'>< 

font face='$fontFace' color='$fontColor' 

size='$fontSize'>$strr[2]</font> 

</td><td bgcolor='$rowColor'>< 

font face='$fontFace' color='$fontColor'

size='$fontSize'>$strr[3]</font> 

</td><td bgcolor='$rowColor'>< 

font face='$fontFace' color='$fontColor' 

size='$fontSize'>$strr[4]</font> 

</td><td bgcolor='$rowColor'>< 

font face='$fontFace' color='$fontColor' 

size='$fontSize'>$strr[5]</font></td> 

</tr>"; 

endfor; 

} 

?>