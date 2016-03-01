<?php

require_once "all_func.php";

//***********DB接続***************
$dbh = db_access(DB_NAME,DB_HOST,USER,PASS);
//***********DB接続ここまで***************

	$date_time = now_datetime();

$txt = "gnaidhgirejk/???sferarg/";
// $txt2 = "gnaidhgirejk";

$res = rtrim($txt, '/');

echo "<pre>";

var_dump($txt);
var_dump($res);
echo "</pre>";
