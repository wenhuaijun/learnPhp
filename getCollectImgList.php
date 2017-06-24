<?php
 include("connect.php");
 $name = $_REQUEST['userName'];
 if ($name == "") {
 	$result["error"] =  "userName is empty!";
 	$result["status"]= "get collect img error";
	$result["code"]=400;
 }else{
 	$dataInfo =array("size" => 0, "imgUrls" =>null);
 	$query = "SELECT url, largeUrl, width, height  FROM collectImgs WHERE userName = '{$name}' ORDER BY ID DESC ";
 	$result = mysql_query($query);
 	while ($row =mysql_fetch_assoc($result)) {
 		$data[] =$row;
 	}
 	$dataInfo["imgUrls"]=$data;
 	$dataInfo["size"]=count($data);
 	$dataInfo["status"]= "success";
	$dataInfo["code"]=200;
 }
	
 	echo json_encode($dataInfo);
?>