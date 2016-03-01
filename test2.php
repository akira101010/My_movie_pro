<?php

require_once 'all_func.php';

//***********DB接続***************
$dbh = db_access(DB_NAME,DB_HOST,USER,PASS);
//***********DB接続ここまで***************

$id = "http://sample2.com";
$site = "fc2";

$id = "20160210hBVFeWw1";
$site = "fc2";

$test_sql = "SELECT * FROM movies WHERE movie_id = ? AND site = ?";
$test_sql_pdo = $dbh->prepare($test_sql);
$test_sql_pdo->execute(array($id, $site));
$test = $test_sql_pdo->fetch(PDO::FETCH_BOTH);

if(empty($test)){

	echo "中身が存在しません";

}else{

	echo "中身が存在します";

}

echo "<pre>";
print_r($test);
echo "</pre>";