<?php

require_once 'all_func.php';

//***********DB接続***************
$dbh = db_access(DB_NAME,DB_HOST,USER,PASS);
//***********DB接続ここまで***************

?>

<h2>My_movie_project　トップページ</h2>

<p><a href="/create/My_movie_pro/input.php">入力フォーム(input.php)</a></p>
<p><a href="/create/My_movie_pro/test.php">テストページ(test.php)</a></p>
<p><a href="/create/My_movie_pro/test2.php">テストページ2(test2.php)</a></p>
<p><a href="/create/My_movie_pro/test4.php">テストページ4(test4.php)</a></p>
<p><a href="/create/My_movie_pro/test5.php">テストページ5(test5.php)</a></p>

<?php

$test_sql = "SELECT * FROM movies";
$test_sql_pdo = $dbh->prepare($test_sql);
$test_sql_pdo->execute();
$test = $test_sql_pdo->fetchAll(PDO::FETCH_BOTH);

foreach ($test as $tmp) {
	echo $tmp["movie_code"]."<br>";
}

echo "<pre>";
print_r($test);
echo "</pre>";

?>
