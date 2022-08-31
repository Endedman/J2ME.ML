<head>
<?php
session_start();
	if ((isset($_GET['lang']) && $_GET['lang']=="en") or (($_COOKIE["cookielang"] == "en") && !isset($_GET['lang']))) {
		setrawcookie("cookielang", '', time()-1, "/", "j2me.ml");	
        setrawcookie("cookielang", 'en', time()+3600, "/", "j2me.ml");
        $_SESSION['lang']="en";  
        require 'lang/en.php';
	} else if ((isset($_GET['lang']) && $_GET['lang']=="ru") or (($_COOKIE["cookielang"] == "ru") && !isset($_GET['lang']))) {
		setrawcookie("cookielang", '', time()-1, "/", "j2me.ml");		
		setrawcookie("cookielang", 'ru', time()+3600, "/", "j2me.ml");
        $_SESSION['lang']="ru";
        require 'lang/ru.php';
	} else if ((isset($_GET['lang']) && $_GET['lang']=="es") or (($_COOKIE["cookielang"] == "es") && !isset($_GET['lang']))) {
		setrawcookie("cookielang", '', time()-1, "/", "j2me.ml");	
        setrawcookie("cookielang", 'es', time()+3600, "/", "j2me.ml");
        $_SESSION['lang']="es";
        require 'lang/es.php';
     } else if ((isset($_GET['lang']) && $_GET['lang']=="") or (($_COOKIE["cookielang"] == "") && !isset($_GET['lang']))) {
		setrawcookie("cookielang", '', time()-1, "/", "j2me.ml");	
        setrawcookie("cookielang", 'ru', time()+3600, "/", "j2me.ml");
	    print('<h1 style="color: red; font-family: Segoe UI;" >Применяем куки... Ожидайте</h1>');
		header('Location: /');
	 } else {
		 die('No language selected');
	 }
     if (isset($_GET['debug']) && $_GET['debug']=="1") {
        require 'lang/dummydebug.php';
     } 
?>
<?php 

include("sniff.php"); 

if (! isset($$cookieName)) : 

//установить куки 

setcookie($cookieName, $cookieValue, time()+$timeLimit); 

saveUserData(); 

endif; 

?>
    <title><?php echo $title; ?></title>
    <link href="//j2me.ml/css/style.css" rel="stylesheet">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Поддержка J2ME - главная">
    <meta property="og:url" content="http://j2me.ml">
    <meta property="og:image" content="https://j2me.ml/favicon-32x32.png">
    <meta property="og:site_name" content="J2ME LLC">
    <meta property="og:locale" content="ru_RU">
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="../mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="https://cdn.jsdelivr.net/npm/blockadblock@3.2.1/blockadblock.min.js"></script>
    <script>
    // Function called if AdBlock is not detected
    let adblock;
    function adBlockNotDetected() {
        adblock='';
    }
    // Function called if AdBlock is detected
    function adBlockDetected() {
        adblock='<?php echo $adblock; ?>';
    }

    // We look at whether BlockAdBlock already exists.
    if(typeof blockAdBlock !== 'undefined' || typeof BlockAdBlock !== 'undefined') {
	    // If this is the case, it means that something tries to usurp are identity
	    // So, considering that it is a detection
	    adBlockDetected();
    } else {
	    // Otherwise, you import the script BlockAdBlock
	    var importFAB = document.createElement('script');
	    importFAB.onload = function() {
		    // If all goes well, we configure BlockAdBlock
		    blockAdBlock.onDetected(adBlockDetected)
		    blockAdBlock.onNotDetected(adBlockNotDetected);
	    };
	    importFAB.onerror = function() {
		    // If the script does not load (blocked, integrity error, ...)
		    // Then a detection is triggered
		    adBlockDetected(); 
	    };
	    importFAB.integrity = 'sha256-xjwKUY/NgkPjZZBOtOxRYtK20GaqTwUCf7WYCJ1z69w=';
	    importFAB.crossOrigin = 'anonymous';
	    importFAB.src = 'https://cdnjs.cloudflare.com/ajax/libs/blockadblock/3.2.1/blockadblock.min.js';
	    document.head.appendChild(importFAB);
    }
    </script> 
    <meta charset="utf-8">
</head>
