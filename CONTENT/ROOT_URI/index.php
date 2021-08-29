<?php 
$lnk2 = explode('?', $lnk);
print_r($lnk2);
if ($_SESSION['LoggedIn']) {
	include("_headerL.php");
	if($lnk == "" || $lnk == "index") include("dashboard.php");
    elseif(file_exists(__DIR__."/".$lnk.".php"))  include($lnk.".php");
    elseif(isset($lnk2[1]) && file_exists(__DIR__."/".$lnk2[0].".php") ) include($lnk2[0].".php");
    else include '_404.php';
	include("_footerL.php");
}else{
	if($lnk=="login") include("login.php");
	elseif($lnk=="signup") include("signup.php");
	elseif($lnk=="forgotpassword") include("forgotpassword.php");
	else{
		include("_header.php");
		if($lnk=="" ||$lnk == "index") include("_home.php");
	    elseif(file_exists(__DIR__."/".$lnk.".php"))  include($lnk.".php");
	    elseif(isset($lnk2[1]) && file_exists(__DIR__."/".$lnk2[0].".php") ) include($lnk2[0].".php");
	    else include '_404.php';
		include("_footer.php");
	}	
}
// if($lnk == "" || $lnk == "index") include("_home.php");
?>
