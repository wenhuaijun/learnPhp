<?php
 include("connect.php");
	$dataInfo =array("size" => 0, "data" =>null);
 	$query = "SELECT title,url  FROM hotSearch order by rand() limit 10";
 	$result = mysql_query($query);
 	while ($row =mysql_fetch_assoc($result)) {
 		$data[] =$row;
 	}
 	$dataInfo["data"]=$data;
 	$dataInfo["size"]=count($data);
 	echo json_encode($dataInfo);
?>