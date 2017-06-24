<?php
 include("connect.php");
 $name = $_REQUEST['userName'];
 $url = $_REQUEST['url'];

 if ($name == "" || $url == "") {
 	$result["error"] =  "userName or url must not empty!";
 	$result["status"]= "delete collect img error";
	$result["code"]=400;
 }else{
 	$query = "SELECT * FROM account WHERE userName = '{$name}'";
	$user = mysql_query($query);
 	if ($row = mysql_fetch_assoc($user)) {
 		//有该账户
 		$query = "DELETE FROM collectImgs WHERE userName = '{$name}' and url = '{$url}'";
 		$user = mysql_query($query);
		 if (mysql_affected_rows()) {
		 	//$result["sql"] =  $query;
		 	$result["status"]= "delete collect img success";
		 	$result["code"]=200;
		 }else{
		 	$result["error"] =  mysql_error();
		 	$result["status"]= "delete collect img error";
		 	$result["code"]=402;
		 }
 		
 	}else{
 		//没有该账户
 		$result["error"] =  $name." account has not exit！";
 		$result["status"]= "delete collect img error";
		$result["code"]=401;
		
 	}

 }
 echo json_encode($result);
?>