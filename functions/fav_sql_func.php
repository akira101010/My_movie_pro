<?php

function fav_regist($movie_id, $user_id, $comment){
	//fav追加関数

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
	$fav_count_up_sql_pdo->execute();

}

function fav_del($movie_id, $user_id){
	//fav削除関数

	global $dbh;

	//favカラムを削除
	$fav_del_sql = "DELETE FROM fav_movies WHERE movie_id = ? AND user_id = ?";
	$fav_del_sql_pdo = $dbh->prepare($fav_del_sql);
	$fav_del_sql_pdo->bindValue(1, $movie_id, PDO::PARAM_INT);
	$fav_del_sql_pdo->bindValue(2, $user_id, PDO::PARAM_INT);
	$fav_del_sql_pdo->execute();

	//moviesのfavカウントを減少させる
	$fav_count_up_sql = "UPDATE movies SET fav_count = fav_count - 1 WHERE id = ?";
	$fav_count_up_sql_pdo = $dbh->prepare($fav_count_up_sql);
	$fav_count_up_sql_pdo->bindValue(1, $movie_id, PDO::PARAM_INT);
	$fav_count_up_sql_pdo->execute();	

}