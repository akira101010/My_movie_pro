<?php

function fav_regist($movie_id, $user_id, $comment){

	global $dbh;

	$date_time = now_datetime();

	//favを追加
	$fav_sql = "INSERT INTO fav_movies (user_id, movie_id, comment, date_time) VALUES (?, ?, ?, ?)";
	$fav_sql_pdo = $dbh->prepare($fav_sql);
	$fav_sql_pdo->execute(array($user_id, $movie_id, $comment, $date_time));

	//moviesのfavカウントを増加させる
	$fav_count_up_sql = "UPDATE movies SET fav_count = fav_count + 1 WHERE id = ?";
	$fav_count_up_sql_pdo = $dbh->prepare($fav_count_up_sql);
	$fav_count_up_sql_pdo->bindValue(1, $movie_id, PDO::PARAM_INT);
	$res = $fav_count_up_sql_pdo->execute();

}