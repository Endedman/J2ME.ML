<?php include("passwd_prt.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
   		input { border: 1px solid black; }
    </style>
	<title>DevCP (j2me.ml instance)</title>
</head>
<body>
	<form action="handle.php" align=center>
		<input type="text" name="app_name" placeholder="Application name"><br>
		<input type="text" name="dev_name" placeholder="Developer name"><br>
		<input type="text" name="icon" placeholder="Icon"><br>
		<input type="text" name="banner" placeholder="Banner"><br>
		<!-- <input type="text" name="file" placeholder="File"><br> -->
		<select name="paid" id="paid">
			<option value="true">&#x202A;true&#x202C;</option>
			<option value="false">&#x202A;false&#x202C;</option>
		</select>
		<hr>
		<input type="text" name="fee" placeholder="Fee, if enabled"><br>
		<input type="text" name="paytoken" placeholder="Link to moneykeeper"><br>
		<input type="submit"><br>
	</form>
</body>
</html>