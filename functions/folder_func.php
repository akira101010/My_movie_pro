<?php

function folder_create($user_id, $title, $comment){
	//フォルダ新規作成関数

	global $dbh;

	$folder_create_sql = "INSERT INTO folders (user_id, title, comment) VALUES (?, ?, ?)";
	$folder_create_sql_pdo = $dbh->prepare($folder_create_sql);
	$folder_create_sql_pdo->execute(array($user_id, $title, $comment));

}

function folder_in($folder_id, $movie_id){
	//動画をフォルダへ登録（folders_moviesへ新規登録）

	global $dbh;

	//重複チェック
	$res = folder_get($folder_id);

	foreach ($res as $temp) {

		$dupli_flag = $temp["id"] == $movie_id ? true : false;

	}

	if($dupli_flag){

		$result = false;

	}else{

		//重複なしDB登録
		$folder_in_sql = "INSERT INTO folders_movies (folder_id, movie_id) VALUES (?, ?)";
		$folder_in_sql_pdo = $dbh->prepare($folder_in_sql);
		$folder_in_sql_pdo->execute(array($folder_id, $movie_id));

		$result = true;

	}

	return $result;

}

function folder_get($folder_id){
	//指定フォルダの内容を取得

	global $dbh;

	$folder_get_sql = "SELECT movies.* FROM folders_movies INNER JOIN folders ON 
		folders_movies.folder_id = folders.id INNER JOIN movies ON 
			folders_movies.movie_id = movies.id WHERE folders.id = ?";
	$folder_get_sql_pdo = $dbh->prepare($folder_get_sql);
	$folder_get_sql_pdo->bindValue(1, $folder_id, PDO::PARAM_INT);
	$folder_get_sql_pdo->execute();
	$folder_res = $folder_get_sql_pdo->fetchAll(PDO::FETCH_BOTH);

	return $folder_res;

}