<?php
 include("connect.php");
 $name = $_REQUEST['userName'];
 $password = $_REQUEST['password'];
 //$name = "wenHuaiJun";
 //$password ="123123";

 if ($name == "" || $password == "") {
 	$result["error"] =  "name or password must not empty!";
 	$result["status"]= "login error";
	$result["code"]=400;
 }else{
 	$query = "SELECT * FROM account WHERE userName = '{$name}' and password = '{$password}'";
	$user = mysql_query($query);
 	if ($row = mysql_fetch_array($user)) {
 		$result["status"]= "login success";
		$result["code"]=200;
		$result["userName"]=$row['userName'];
 	}else{
		 	$result["error"] =  mysql_error();
		 	$result["status"]= "password or username is error!";
		 	$result["code"]=401;
 	}

 }
 echo json_encode($result);
?>