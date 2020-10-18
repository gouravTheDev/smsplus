<?php //var_dump($url);echo "<br>FD=",F_D,"<br>lnk=",$lnk,"<br>"; //phpinfo();
$lnk2 = explode('?', $lnk);
// print_r($lnk2);

if($lnk=="login") include("login.php");
elseif($lnk=="signup") include("signup.php");
elseif($lnk=="forgotpassword") include("forgotpassword.php");
// elseif($lnk2[0] =="visitCourse"){

// 	include("visitCourse.php");	
// } 
else{
	include("_header.php");
	if($lnk=="" ||$lnk == "index") include("_home.php");
    elseif(file_exists(__DIR__."/".$lnk.".php"))  include($lnk.".php");
    elseif(isset($lnk2[1]) && file_exists(__DIR__."/".$lnk2[0].".php") ) include($lnk2[0].".php");
    else{
 		$sql = "SELECT * FROM BLOGS WHERE SLUG = '$lnk'";
 		$result = mysqli_query($link, $sql);
 		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 		if(mysqli_num_rows($result)==0){
 			include("_404.php");
 		}else{
 			include("single-blog.php");
 		}
    }
	include("_footer.php");
}

?>
