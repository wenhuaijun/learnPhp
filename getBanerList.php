<?php
 include("connect.php");
	$dataInfo =array("size" => 0, "imgUrls" =>null);
 	$query = "SELECT url  FROM banner order by rand() limit 3";
 	$result = mysql_query($query);
 	while ($row =mysql_fetch_assoc($result)) {
 		$data[] =$row;
 	}
 	$dataInfo["imgUrls"]=$data;
 	$dataInfo["size"]=count($data);
 	$dataInfo["status"]= "success";
	$dataInfo["code"]=200;
 	echo json_encode($dataInfo);
?>