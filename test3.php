<?php
require_once 'all_func.php';

//***********DB接続***************
$dbh = db_access(DB_NAME,DB_HOST,USER,PASS);
//***********DB接続ここまで***************

$input["movie_id"] = "hogehoge222";
$input["site"] = "fc2";
$input["title"] = "テスト１";


$date_time_obj = new DateTime();
$date_time = $date_time_obj->format('Y-m-d H:i:s');

$input_sql = "INSERT INTO movies (movie_id, site, title, c_date) VALUES (?, ?, ?, ?)";
$input_sql_pdo = $dbh->prepare($input_sql);
$input_sql_pdo->execute(array($input["movie_id"], $input["site"], $input["title"], $date_time));


$c_sql = 'SELECT LAST_INSERT_ID() FROM movies';
$c_sql_pdo = $dbh->prepare($c_sql);
$c_sql_pdo->execute();
$c = $c_sql_pdo->fetch(PDO::FETCH_BOTH);

$i = (int)$c[0];

echo "<pre>";
var_dump($c);
var_dump($i);
// print_r($c);
echo "</pre>";