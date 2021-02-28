<?php 
$lnk2 = explode('?', $lnk);
// print_r($lnk2);
if ($_SESSION['AdminLoggedIn']) {
	$basePath = realpath($_SERVER["DOCUMENT_ROOT"]);
	include $basePath.'/CONTENT/ROOT_URI/admin/_header.php';
	include $basePath.'/CONTENT/ROOT_URI/admin/_menu.php';
	if($lnk == "" || $lnk == "index") include("home.php");
    elseif(file_exists(__DIR__."/".$lnk.".php"))  include($lnk.".php");
    elseif(isset($lnk2[1]) && file_exists(__DIR__."/".$lnk2[0].".php") ) include($lnk2[0].".php");
    else include $basePath.'/CONTENT/ROOT_URI/admin/_404.php';
	include $basePath.'/CONTENT/ROOT_URI/admin/_footer.php';
}else{
	include("/admin/login.php");	
}

?>
