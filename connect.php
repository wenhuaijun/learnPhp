<?php
$con = mysql_connect("127.0.0.1","root","root");
if (!$con){
  die('Could not connect: ' . mysql_error());
  echo "connect error";
}
mysql_select_db("searchWeb", $con);
?>