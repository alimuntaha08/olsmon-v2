<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$conn =  mysql_connect("localhost", "root", "", "ols");
$result = $conn->query("SELECT sys_info FROM ".$obj->table." LIMIT ".$obj->limit);
$outp = array();
$outp = $result->fetch_all(MYSQL_ASSOC);

echo json_encode($outp);
?>