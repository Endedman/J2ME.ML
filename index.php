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
      <td class="main-border" valign="top" align="left"><h2><?php echo $title; ?></h2>
        <p><i><font><?php echo $slogan; ?></i>
          <br>
            <font><?php echo $desc1; ?>
                <a href="http://m.j2me.ml"><?php echo $switchmobile; ?></a></font>
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
