<?php
 include("connect.php");
 $name = $_REQUEST['userName'];
 $url = $_REQUEST['url'];
 $largeUrl = $_REQUEST['largeUrl'];
 $width = $_REQUEST['width'];
 $height = $_REQUEST['height'];

 if ($name == "" || $url == ""||  $largeUrl == "") {
 	$result["error"] =  "userName or url or largeUrl must not empty!";
 	$result["status"]= "collect img error";
	$result["code"]=400;
 }else if($width == "" || $height == ""){
 	$result["error"] =  "width or url height not empty!";
 	$result["status"]= "collect img error";
	$result["code"]=400;
 }else{
 	$query = "SELECT * FROM account WHERE userName = '{$name}'";
	$user = mysql_query($query);
 	if ($row = mysql_fetch_assoc($user)) {
 		//有该账户
 		$query = "INSERT INTO collectImgs ( url , largeUrl, userName ,width,height) VALUES ( '".$url."' , '".$largeUrl."' , '".$name."' , '".$width."',
 		 '".$height."')";
		 if (mysql_query($query)) {
		 	//$result["sql"] =  $query;
		 	$result["status"]= "collect img success";
		 	$result["code"]=200;
		 }else{
		 	$result["error"] =  mysql_error();
		 	$result["status"]= "collect img error";
		 	$result["code"]=402;
		 }
 		
 	}else{
 		//没有该账户
 		$result["error"] =  $name." account has not exit！";
 		$result["status"]= "collect img error";
		$result["code"]=401;
		
 	}

 }
 echo json_encode($result);
?>