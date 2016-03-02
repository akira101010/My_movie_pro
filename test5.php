<?php

require_once "all_func.php";

//***********DB接続***************
$dbh = db_access(DB_NAME,DB_HOST,USER,PASS);
//***********DB接続ここまで***************

echo "test5";

// $movie_id = 42;
$user_id = 1;
$title = "テスト2フォルダ";
$comment = "テスト2コメント";

$folder_id = 2;
$movie_id = 30;

// folder_create($user_id, $title, $comment);
// folder_in($folder_id, $movie_id);
$res = folder_get($folder_id);

echo "<pre>";
print_r($res);
echo "</pre>";

