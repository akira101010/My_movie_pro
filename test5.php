<?php

require_once "all_func.php";

//***********DB接続***************
$dbh = db_access(DB_NAME,DB_HOST,USER,PASS);
//***********DB接続ここまで***************

$movie_id = 42;
$user_id = 1;

fav_del($movie_id, $user_id);

