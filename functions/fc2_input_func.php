<?php

function param_del($url){

/*
	URLの「&」以降（GETパラメータ）を削除する関数
	「&」がない場合はそのままのURLを返すので対応できる
	検証済み

	次に最後が「/」の場合もrtrimにて削除
	ない場合はそのまま返すので対処できる
*/

	$processed_1 = substr($url, 0, strcspn($url, '&'));

	$processed_2 = rtrim($processed_1, '/');

	return $processed_2;

}

function fc2_url_pull($url){

/*
	http://video.fc2.com/ja/content/20150901yCx23AuS&t_feature
	[20150901yCx23AuS]の部分だけ抜き取る

*/

	$res = preg_match("/(.*)(content\/)(.*)/is", $url, $retArr);

	if($res == 1){

		$movie_id = param_del($retArr[3]);
		//抽出したURLの&以降を削除
	
	}else{

		$movie_id = FALSE;
		//抽出パターンにマッチしなかった場合
	
	}

	return $movie_id;
}