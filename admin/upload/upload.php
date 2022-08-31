<?php
session_start();

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = (time() .'_'. $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('sis', 'sisx', 'jad', 'jar', 'xjar');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='<h1 class="succ">File is successfully uploaded. Your Link:</h1>https://j2me.ml/admin/upload/uploaded_files/' .$newFileName;
      }
      else 
      {
        $message = '<h1 class="err">There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.</h1>';
      }
    }
    else
    {
      $message = '<h1 class="err">Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions) . '</h1>';
    }
  }
  else
  {
    $message = '<h1 class="err">There is some error in the file upload. Please check the following error.</h1><br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: index.php");
