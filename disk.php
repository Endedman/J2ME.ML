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
      <td class="main-border" valign="top" align="left"><h2><?php echo $desc2; ?></h2>
        <p><i><font><?php echo $slogan; ?></i>
          <br>
                <a href="http://m.j2me.ml"><?php echo $switchmobile; ?></a>
            </font><br>
		</p>
		<?php
  /* Функция для удаления лишних файлов: сюда, помимо удаления текущей и родительской директории, так же можно добавить файлы, не являющиеся картинкой (проверяя расширение) */
  function excess($files) {
    $result = array();
    for ($i = 0; $i < count($files); $i++) {
      if ($files[$i] != "." && $files[$i] != "..") $result[] = $files[$i];
    }
    return $result;
  }
  $dir = "images/disk"; // Путь к директории, в которой лежат изображения
  $files = scandir($dir); // Получаем список файлов из этой директории
  $files = excess($files); // Удаляем лишние файлы
  /* Дальше происходит вывод изображений на страницу сайта (по 4 штуки на одну строку) */
?>
<?php for ($i = 0; $i < count($files); $i++) { ?>
  <img src="<?=$dir."/".$files[$i]?>" alt="" width='20%' />
  <?php if (($i + 1) % 3 == 0) { ?><br /><?php } ?>
<?php } ?>
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
