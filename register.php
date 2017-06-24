<?php
 include("connect.php");
 $name = $_REQUEST['userName'];
 $password = $_REQUEST['password'];
 //$name = "wenHuaiJun";
 //$password ="123123";

 if ($name == "" || $password == "") {
 	$result["error"] =  "name or password must not empty!";
 	$result["status"]= "register error";
	$result["code"]=400;
 }else{
 	$query = "SELECT * FROM account WHERE userName = '{$name}'";
	$user = mysql_query($query);
 	if ($row = mysql_fetch_assoc($user)) {
 		$result["error"] =  $name." has been used";
 		$result["status"]= "register error";
		$result["code"]=401;
 	}else{
		$query = "INSERT INTO account ( userName , password ) VALUES ( '".$name."' , '".$password."' )";
		 if (mysql_query($query)) {
		 	//$result["sql"] =  $query;
		 	$result["status"]= "register success";
		 	$result["code"]=200;
		 }else{
		 	$result["error"] =  mysql_error();
		 	$result["status"]= "register error";
		 	$result["code"]=402;
		 }
 	}

 }
 echo json_encode($result);
?>