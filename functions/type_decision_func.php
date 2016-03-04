<?php

function type_decision($url){
 //********製作途中！！！！******
 /*
	 生URLからサイトタイプを判定
	 生URLからムービーIDの部分を抽出
	 タイトルを生成
	 抽出が成功したか真偽判定
 */

	if( stripos($url, 'video.fc2.com') !== false ){

		if(fc2_url_pull($url)){
		
			$input["movie_code"] = fc2_url_pull($url);
			$input["site"] = "fc2";
			$input["title"] = "none_title_fc2";
			$input["msg"] = "登録完了";
			$input["flag"] = true;

		}else{

			$input["msg"] = "[fc2]ID抜き出しエラーです。URLを確認してください";
			$input["flag"] = false;

		}

	}elseif( stripos($url, 'xvideos.com') !== false ){

		$input["site"] = "xvideos";

	}elseif( stripos($url, 'xhamster.com') !== false ){

		$input["site"] = "xhamster";

	}else{

		$input["site"] = "none";
	}

	return $input;
}
