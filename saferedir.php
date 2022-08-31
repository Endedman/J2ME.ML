<?php
$httpsonly = 0;
$url = $_GET['url'];
if ($httpsonly == 0) {
	header('Location:' .$url);
} else {
	$urlshort =  explode('http://', $_GET['url']);
	echo $urlshort[count($urlshort)-1];
	header('Location: https://' .$url);
}
?>