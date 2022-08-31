<html>
<?php
include 'includes/header.php'
?>
<?php 
include 'includes/newsbanner.php'
?>
<table class="main" align="center">
  <tbody>
    <tr> 
      <?php
        require 'includes/lsidebar.php'
      ?>
      <td class="main-border" valign="top" align="left"><h2><?php echo $titledev; ?></h2>
        <p><i>
			      
            <font><?php echo $desc1; ?>
				<?php
				if (isset($_GET['sect']) && $_GET['sect']=="tgbot") {
					include('devincludes/tgbot.php');
				} else if (isset($_GET['sect']) && $_GET['sect']=="weather") {
					include('devincludes/weather.php');
				} else if (isset($_GET['sect']) && $_GET['sect']=="uploader") {
					include('devincludes/uploader.php');
				} else if (isset($_GET['sect']) && $_GET['sect']=="test") {
					include('devincludes/test.php');
				} else {
					print('<br><a href="//j2me.ml/dev?sect=tgbot">'.$tgbotdesc.'</a><br>');
					print('<a href="//j2me.ml/dev?sect=weather">'.$weatherdesc.'</a><br>');
					print('<a href="//j2me.ml/dev?sect=uploader">'.$uploaderdesc.'</a><br>');
					print('<a href="//j2me.ml/dev?sect=test">'.$testdesc.'</a><br>');
				}
				?>
                <!---<a href="http://m.j2me.ml"><?php /* echo $switchmobile; */ ?></a></font>-->
            </font>
            <br>
            <!--<iframe src="http://gramsk.ru/dnev/user_dnev_list.php?id=823" width="100%" height="100%" />-->
            </td>
            <?php
                require 'includes/rsidebar.php'
            ?>
        </tr>
        <?php
            require 'includes/footer.php'
        ?>
    </tbody>
</table>
<br>
</font>
</body>
</html>
