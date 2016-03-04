<h2>My_movie_project　インプットページ</h2>

<?php

require_once 'all_func.php';

$user_id = "1"; //開発中のため暫定ID。本番ではセッション管理になると思われる


//***********DB接続***************
$dbh = db_access(DB_NAME,DB_HOST,USER,PASS);
//***********DB接続ここまで***************

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$date_time = now_datetime();

	$input = type_decision($_POST['url']);
	//$input["flag"]["movie_code"]["site"]["title"]["msg"]
	
	if($input["flag"]){
	//入力内容に問題ない場合重複チェック
		$check_sql = "SELECT * FROM movies WHERE movie_code = ? AND site = ?";
		$check_sql_pdo = $dbh->prepare($check_sql);
		$check_sql_pdo->execute(array($input["movie_code"], $input["site"]));
		$check = $check_sql_pdo->fetch(PDO::FETCH_BOTH);

		if(empty($check)){
		//重複していない場合DB新規登録
			$input_sql = "INSERT INTO movies (movie_code, site, title, c_date) VALUES (?, ?, ?, ?)";
			$input_sql_pdo = $dbh->prepare($input_sql);
			$input_sql_pdo->execute(array($input["movie_code"], $input["site"], $input["title"], $date_time));

		//movieをfav(直前登録IDを取得しなければならない)
			$last_sql = 'SELECT LAST_INSERT_ID() FROM movies';
			$last_sql_pdo = $dbh->prepare($last_sql);
			$last_sql_pdo->execute();
			$last = $last_sql_pdo->fetch(PDO::FETCH_BOTH);
			
			$comment = "hogehoge"; //暫定
			$movie_id = (int)$last['LAST_INSERT_ID()'];
			fav_regist($movie_id, $user_id, $comment);


		}else{
		//重複していた場合、新規登録はせずfav
			$comment = "hogehoge"; //暫定
			fav_regist($check["id"], $user_id, $comment);

		}

	}else{
	//$input["flag"]がfalseの場合の処理



	}

	echo "<p>".$input["msg"]."</p>";

}

?>

<form action="" method="POST" accept-charset="UTF-8">
	<input type="text" name="url"  placeholder="URL">
	<!-- <input type="text" name="site"  placeholder="SITE"> -->
	<input type="submit" value="input!">
</form>


<a href="index.php">TOPへ戻る</a>