<?php 
require_once('backup_restore.class.php');

/** config. php **/
$db_host ="localhost";
$db_user = "sidhu";
$db_pass ="sidhu";
$db_name ="sidhu";
/****************/

$newImport = new backup_restore($db_host,$db_name,$db_user,$db_pass);

if(isset($_REQUEST['backup'])){
//call of backup function
$message=$newImport -> backup ();

echo "Download THE <a href='".$message."' >SQL FILE </a> OR RESTORE IT ANY TIME";
}
if(isset($_REQUEST['restore'])){

//call of restore function
$message=$newImport -> restore ();
echo $message;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"  dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Buffer Now (Back up And Restore Script)</title>
</head>

<body>

<table align="center" width="50%"><tr>
<form method='post' >
<td>
<input type="submit" accesskey="b"  name="backup" value="BACKUP">

</td><td>
<input type="submit" accesskey="r" name="restore" value="RESTORE">
</form></td></tr></table>

</body>
</html>