<h1>test</h1>

<?php

require_once 'all_func.php';

// $url = "http://video.fc2.com/content/201111309yABPkbq";
$url = "http://video.fc2.com/content/201111309yABPkbq&t_feature";

	$date_time_obj = new DateTime();
	$date_time = $date_time_obj->format('Y-m-d H:i:s');
	echo $date_time."<br>";

echo param_del($url)."<br>";

echo fc2_gene($url);

echo "<br><br>";
echo "type判別テスト<br>";

$url2 = "http://video.fc2.com/content/201111309yABPkbq&t_feature";
// $url2 = "http://jp.xvideos.com/video18425943/xvideos.com_e6bec1b2f91def6fb9e1e0b3764b6681";
// $url2 = "http://jp.xhamster.com/movies/5706426/mizumore_mix_45.html";
$type = type_decision($url2);
echo $type;
echo "<br><br>";


echo "URL抜き出しテスト";

$s_arr = fc2_url_pull($url2);
echo "<pre>";
print_r($s_arr);
echo "</pre>";

?>
<a href="index.php">TOPへ戻る</a>