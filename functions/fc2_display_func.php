<?php

function fc2_gene($url){

/* 

FC2用タグ生成関数
注意　URLの後に「&」などでGETパラメータがついていてもembedタグは生成できる
　　　　/a/がなくても再生できる

*/
	$s_tag[] = '<script';
	$s_tag[] = 'src="http://static.fc2.com/video/js/outerplayer.min.js"';
	$s_tag[] = 'url="'.$url.'"';
	$s_tag[] = 'tk=""';
	$s_tag[] = 'tl=""';
	$s_tag[] = 'sj=""';
	$s_tag[] = 'd=""';
	$s_tag[] = 'w="448"';
	$s_tag[] = 'h="284"';
	$s_tag[] = 'suggest="on"';
	$s_tag[] = 'charset="UTF-8">';
	$s_tag[] = '</script>';

	//スペースを挟んでつなげた文字列を返す
	return implode(" ", $s_tag);
	
	/*
	<script
	 src="http://static.fc2.com/video/js/outerplayer.min.js"	プレイヤーURL（共通）
	 url="http://video.fc2.com/ja/a/content/20150901yCx23AuS/"	動画URL
	 tk=""														おそらくアフィリエイトkey
	 tl="コスプレイヤー4"											表示用タイトル
	 sj="59000"													おそらくシークバー用サムネイル設定
	 d="1830" 													表示用動画時間（秒表記)
	 w="448" h="284"											プレイヤーサイズ
	 suggest="on"												終了時のオススメ表示
	 charset="UTF-8">											文字コード(共通)
	</script>
	*/

}


?>