<?php 
	include_once '../includes/functions.php';

	sec_session_start();
	$can_access = false;
	if (isset($_SESSION['username'])) {
		$can_access = true;
	}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Upload File</title>
	<meta charset="UTF-8">
</head>
<body>
	<table width="400" border="0" align="center" cellpadding="3" cellspacing="1">
		<tr>
			<td>
			<?php if ($can_access): ?>
			<form name="form1" method="post" action="process.php" enctype="multipart/form-data">
				<table width="200%" border="0" cellspacing="1" cellpadding="3">
					<tr>
						<td width="25%">Upload Photo</td>
						<td>:</td>
						<td><input name="customer_photo" type="file" id="customer_photo" size="50"></td>
					</tr>
					<tr>
						<td><div id="pesan"></div></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
					</tr>
				</table>
			</form>
			<?php else: 
				echo "Anda harus login terlebih dahulu";
			endif; ?>
			</td>
		</tr>
	</table>
</body>
</html>