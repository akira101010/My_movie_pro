<?php

function user_folder_get($user_id){
	//指定ユーザーのフォルダを取得

	global $dbh;
	
	$user_folder_get = "SELECT * FROM folders WHERE user_id = ?";
	$user_folder_get_pdo = $dbh->prepare($user_folder_get);
	$user_folder_get_pdo->bindValue(1, $user_id, PDO::PARAM_INT);
	$user_folder_get_pdo->execute();
	$user_folder_res = $user_folder_get_pdo->fetchAll(PDO::FETCH_BOTH);

	return $user_folder_res;

}

function user_fav_get($user_id){
	//指定ユーザーのファボを取得

	global $dbh;

	$user_fav_get = "SELECT * FROM fav_movies WHERE user_id = ?";
	$user_fav_get_pdo = $dbh->prepare($user_fav_get);
	$user_fav_get_pdo->bindValue(1, $user_id, PDO::PARAM_INT);
	$user_fav_get_pdo->execute();
	$user_fav_res = $user_fav_get_pdo->fetchAll(PDO::FETCH_BOTH);

	return $user_fav_res;

}