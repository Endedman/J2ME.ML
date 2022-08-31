<?

// Max size PER file in KB
$max_file_size="8192";

// Max size for all files COMBINED in KB
$max_combined_size="65536";

//Maximum file uploades at one time
$file_uploads="8";

//The name of your website
$websitename="OldUpload";

// Full browser accessable URL to where files are accessed. With trailing slash.
$full_url="http://j2me.ml/admin/upload/uploaded_files/";

// Path to store files on your server If this fails use $fullpath below. With trailing slash.
$folder="./uploaded_files/";

// Use random file names? true=yes (recommended), false=use original file name.
// Random names will help prevent files being denied because a file with that name already exists.
$random_name=false;

// Types of files that are acceptiable for uploading. Keep the array structure.
$allow_types=array("jpg","gif","png","zip","jar","txt","jad","sis","sisx");

// Only use this variable if you wish to use full server paths. Otherwise leave this empty. With trailing slash.
$fullpath="";

//Use this only if you want to password protect your upload form.
$password=""; 

/*
//================================================================================
* ! ATTENTION !
//================================================================================
: Don't edit below this line.
*/

// Initialize variables
$password_hash=md5($password);
$error="";
$success="";
$display_message="";
$file_ext=array();
$password_form="";

// Function to get the extension a file.
function get_ext($key) { 
	$key=strtolower(substr(strrchr($key, "."), 1));
	$key=str_replace("jpeg","jpg",$key);
	return $key;
}

// Filename security cleaning. Do not modify.
function cln_file_name($string) {
	$cln_filename_find=array("/\.[^\.]+$/", "/[^\d\w\s-]/", "/\s\s+/", "/[-]+/", "/[_]+/");
	$cln_filename_repl=array("", ""," ", "-", "_");
	$string=preg_replace($cln_filename_find, $cln_filename_repl, $string);
	return trim($string);
}

// If a password is set, they must login to upload files.
If($password) {
	
	//Verify the credentials.
	If($_POST['verify_password']==true) {
		If(md5($_POST['check_password'])==$password_hash) {
			setcookie("phUploader",$password_hash);
			sleep(1); //seems to help some people.
			header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
			exit;
		}
	}

	//Show the authentication form
	If($_COOKIE['phUploader']!=$password_hash) {
		$password_form="<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."\">\n";
		$password_form.="<table align=\"center\" class=\"table\">\n";
		$password_form.="<tr>\n";
		$password_form.="<td width=\"100%\" class=\"table_header\" colspan=\"2\">Password Required</td>\n";
		$password_form.="</tr>\n";
		$password_form.="<tr>\n";
		$password_form.="<td width=\"35%\" class=\"table_body\">Enter Password:</td>\n";
		$password_form.="<td width=\"65%\" class=\"table_body\"><input type=\"password\" name=\"check_password\" /></td>\n";
		$password_form.="</tr>\n";
		$password_form.="<td colspan=\"2\" align=\"center\" class=\"table_body\">\n";
		$password_form.="<input type=\"hidden\" name=\"verify_password\" value=\"true\">\n";
		$password_form.="<input type=\"submit\" value=\" Verify Password \" />\n";
		$password_form.="</td>\n";
		$password_form.="</tr>\n";
		$password_form.="</table>\n";
		$password_form.="</form>\n";
	}
	
} // If Password

// Dont allow submit if $password_form has been populated
If(($_POST['submit']==true) AND ($password_form=="")) {

	//Tally the size of all the files uploaded, check if it's over the ammount.	
	If(array_sum($_FILES['file']['size']) > $max_combined_size*1024) {
		
		$error.="<b>FAILED:</b> All Files <b>REASON:</b> Combined file size is to large.<br />";
		
	// Loop though, verify and upload files.
	} Else {

		// Loop through all the files.
		For($i=0; $i <= $file_uploads-1; $i++) {
			
			// If a file actually exists in this key
			If($_FILES['file']['name'][$i]) {

				//Get the file extension
				$file_ext[$i]=get_ext($_FILES['file']['name'][$i]);
				
				// Randomize file names
				If($random_name){
					$file_name[$i]=time()+rand(0,100000);
				} Else {
					$file_name[$i]=cln_file_name($_FILES['file']['name'][$i]);
				}
	
				// Check for blank file name
				If(str_replace(" ", "", $file_name[$i])=="") {
					
					$error.= "<b>FAILED:</b> ".$_FILES['file']['name'][$i]." <b>REASON:</b> Blank file name detected.<br />";
				
				//Check if the file type uploaded is a valid file type. 
				}	ElseIf(!in_array($file_ext[$i], $allow_types)) {
								
					$error.= "<b>FAILED:</b> ".$_FILES['file']['name'][$i]." <b>REASON:</b> Invalide file type.<br />";
								
				//Check the size of each file
				} Elseif($_FILES['file']['size'][$i] > ($max_file_size*1024)) {
					
					$error.= "<b>FAILED:</b> ".$_FILES['file']['name'][$i]." <b>REASON:</b> File to large.<br />";
					
				// Check if the file already exists on the server..
				} Elseif(file_exists($folder.$file_name[$i].".".$file_ext[$i])) {
	
					$error.= "<b>FAILED:</b> ".$_FILES['file']['name'][$i]." <b>REASON:</b> File already exists.<br />";
					
				} Else {
					
					If(move_uploaded_file($_FILES['file']['tmp_name'][$i],$folder.$file_name[$i].".".$file_ext[$i])) {
						
						$success.="<b>SUCCESS:</b> ".$_FILES['file']['name'][$i]."<br />";
						$success.="<b>URL:</b> <a href=\"".$full_url.$file_name[$i].".".$file_ext[$i]."\" target=\"_blank\">".$full_url.$file_name[$i].".".$file_ext[$i]."</a><br /><br />";
						
					} Else {
						$error.="<b>FAILED:</b> ".$_FILES['file']['name'][$i]." <b>REASON:</b> General upload failure.<br />";
					}
					
				}
							
			} // If Files
		
		} // For
		
	} // Else Total Size
	
	If(($error=="") AND ($success=="")) {
		$error.="<b>FAILED:</b> No files selected<br />";
	}

	$display_message=$success.$error;

} // $_POST AND !$password_form

/*
//================================================================================
* Start the form layout
//================================================================================
:- Please know what your doing before editing below. Sorry for the stop and start php.. people requested that I use only html for the form..
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $websitename; ?> - Powered By phUploader</title>

<style type="text/css">
	body{
		background-color:#FFFFFF;
		font-family: Verdana, Arial, sans-serif;
		font-size: 12pt;
		color: #000000;
	}
	
	.message {
		font-family: Verdana, Arial, sans-serif;
		font-size: 11pt;
		color: #000000;
		background-color:#EBEBEB;
	}

	a:link, a:visited {
		text-decoration:none;
		color: #000000;
	}
	
	a:hover {
		text-decoration:none;
		color: #000000;
	}

	.table {
		border-collapse:collapse;
		border:1px solid #000000;
		width:450px;
	}
	
	.table_header {
		border:1px solid #000000;
		background-color:#C03738;
		font-family: Verdana, Arial, sans-serif;
		font-size: 11pt;
		font-weight:bold;
		color: #FFFFFF;
		text-align:center;
		padding:2px;
	}
	
	.upload_info {
		border:1px solid #000000;
		background-color:#EBEBEB;
		font-family: Verdana, Arial, sans-serif;
		font-size: 8pt;
		color: #000000;
		padding:4px;
	}

	.table_body {
		border:1px solid #000000;
		background-color:#EBEBEB;
		font-family: Verdana, Arial, sans-serif;
		font-size: 10pt;
		color: #000000;
		padding:2px;
	}

	.table_footer {
		border:1px solid #000000;
		background-color:#C03738;
		text-align:center;
		padding:2px;
	}

	input,select,textarea {
		font-family: Verdana, Arial, sans-serif;
		font-size: 10pt;
		color: #000000;
		background-color:#AFAEAE;
		border:1px solid #000000;
	}
	
	.copyright {
		border:0px;
		font-family: Verdana, Arial, sans-serif;
		font-size: 9pt;
		color: #000000;
		text-align:right;
	}
	
	form {
		padding:0px;
		margin:0px;
	}
</style>

<?
If($password_form) {
	
	Echo $password_form;

} Else {
?>

<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" name="phuploader">
<table align="center" class="table">
	<tr>
		<td class="table_header" colspan="2"><b><?=$websitename;?></b> </td>
	</tr>

	<?If($display_message){?>
	<tr>
		<td colspan="2" class="message">
		<br />
			<?=$display_message;?>
		<br />
		</td>
	</tr>
	<?}?>
	
	<tr>
		<td colspan="2" class="upload_info">
			<b>Allowed Types:</b> <?=implode($allow_types, ", ");?><br />
			<b>Max size per file:</b> <?=$max_file_size?>kb.<br />
			<b>Max size for all files combined:</b> <?=$max_combined_size?>kb.<br />
		</td>
	</tr>
	<?For($i=0;$i <= $file_uploads-1;$i++) {?>
		<tr>
			<td class="table_body" width="20%"><b>Select File:</b> </td>
			<td class="table_body" width="80%"><input type="file" name="file[]" size="30" /></td>
		</tr>
	<?}?>
	<tr>
		<td colspan="2" align="center" class="table_footer">
			<input type="hidden" name="submit" value="true" />
			<input type="submit" value=" Upload File(s) " /> &nbsp;
			<input type="reset" name="reset" value=" Reset Form " onclick="window.location.reload(true);" />
		</td>
	</tr>
</table>
</form>

<?}//Please leave this here.. it really dosen't make people hate you or make your site look bad.. ?>
<table class="table" style="border:0px;" align="center">
	<tr>
		<td><div class="copyright">&copy;<a href="http://www.phphq.net/?script=phUploader" target="_blank" title="Uploader Powered By phUploader &lt;www.phphq.net&gt;">phUploader</a></div></td>
	</tr>
</table>
</body>
</html>