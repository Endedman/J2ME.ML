<?php
// Add login/password pairs below, like described above
// NOTE: all rows except last must have comma "," at the end of line
$LOGIN_INFORMATION = array(
'admin' => 'pass'
);

// request login? true - show login and password boxes, false - password box only
define('USE_USERNAME', true);

// User will be redirected to this page after logout
define('LOGOUT_URL', 'http://domain.tld');

// time out after NN minutes of inactivity. Set to 0 to not timeout
define('TIMEOUT_MINUTES', 0);

// This parameter is only useful when TIMEOUT_MINUTES is not zero
// true - timeout time from last activity, false - timeout time from login
define('TIMEOUT_CHECK_ACTIVITY', true);

##################################################################
# SETTINGS END
##################################################################
///////////////////////////////////////////////////////
// do not change code below
///////////////////////////////////////////////////////

// show usage example
if(isset($_GET['help'])) {
 die('Include following code into every page you would like to protect, at the very beginning (first line):<br>&lt;?php include("' . str_replace('\\','\\\\',__FILE__) . '"); ?&gt;');
}

// timeout in seconds
$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);

// logout?
if(isset($_GET['logout'])) {
 setcookie("verify", '', $timeout, '/'); // clear password;
 header('Location: ' . LOGOUT_URL);
 exit();
}

if(!function_exists('showLoginPasswordProtect')) {
// show login form
function showLoginPasswordProtect($error_msg) {
?>
<html>
 <head>
  <title>Для доступа к странице введите пароль</title>
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
 </head>
 <body>
  <style>
   input { border: 1px solid black; }
  </style>
  <div style="width:500px; margin-left:auto; margin-right:auto; text-align:center">
   <form method="post">
    <h3>Введите имя пользователя и пароль:</h3>
    <font color="red"><?php echo $error_msg; ?></font><br />
    <?php if (USE_USERNAME) echo 'Пользователь:<br /><input type="input" name="access_login" /><br />Пароль:<br />'; ?>
    <input type="password" name="access_password" /><p></p><input type="submit" name="Submit" value="Войти" />
   </form>
   <br />
  </div>
 </body>
</html>

<?php
// stop at this point
die();
}
}

// user provided password
if (isset($_POST['access_password'])) {
 $login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
 $pass = $_POST['access_password'];
 if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION)
 || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION[$login] != $pass ) )
 ) {
  showLoginPasswordProtect("Пароль не верный.");
 }
 else {
  // set cookie if password was validated
  setcookie("verify", md5($login.'%'.$pass), $timeout, '/');
  // Some programs (like Form1 Bilder) check $_POST array to see if parameters passed
  // So need to clear password protector variables
  unset($_POST['access_login']);
  unset($_POST['access_password']);
  unset($_POST['Submit']);
 }
}
else {
 // check if password cookie is set
 if (!isset($_COOKIE['verify'])) {
  showLoginPasswordProtect("");
 }
 // check if cookie is good
 $found = false;
 foreach($LOGIN_INFORMATION as $key=>$val) {
  $lp = (USE_USERNAME ? $key : '') .'%'.$val;
  if ($_COOKIE['verify'] == md5($lp)) {
   $found = true;
   // prolong timeout
   if (TIMEOUT_CHECK_ACTIVITY) {
    setcookie("verify", md5($lp), $timeout, '/');
   }
   break;
  }
 }
 if (!$found) {
  showLoginPasswordProtect("");
 }
}
?>