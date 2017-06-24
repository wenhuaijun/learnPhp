<?php
 include("connect.php");
 $name = $_REQUEST['userName'];
 $password = $_REQUEST['password'];
 $newPassword = $_REQUEST['newPassword'];
 //$name = "wenHuaiJun";
 //$password ="123123";

 if ($name == "" || $password == ""||$newPassword == "") {
 	$result["error"] =  "name or password must not empty!";
 	$result["status"]= "login error";
	$result["code"]=400;
 }else{
 	$query = "UPDATE account SET password = '{$newPassword}' WHERE userName = '{$name}' and password = '{$password}'";
	$user = mysql_query($query);
 	if ($row = mysql_affected_rows()) {
 		$result["status"]= "edit password success";
		$result["code"]=200;
 	}else{
		 	$result["error"] =  mysql_error();
		 	$result["status"]= "password or username is error!";
		 	$result["code"]=401;
 	}

 }
 echo json_encode($result);
?>