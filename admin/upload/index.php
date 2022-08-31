<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP File Upload</title>
  <link href="style.css" rel="stylesheet"></link>
</head>
<body>
  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <div class="upl">
      <span>Upload a File:</span>
      <input type="file" name="uploadedFile" id="input__file"/>
	  <label for="input__file" class="input__file-button">
      <span class="input__file-icon-wrapper"><img class="input__file-icon" src="/images/add.svg" alt="Выбрать файл" width="25"></span>
      <span class="input__file-button-text">Select a file</span>
	  </label>
	  <input type="submit" name="uploadBtn" value="Upload" /><br>
	  <a href="uploaded_files/explorer.php">Explore the apps. Anonymously.</a>
	  Powered by <a href="http://www.symwld.com">Symbian World</a> & <a href="http://j2me.ml">Endedman</a>
    </div>
  </form>
</body>
</html>
