<?php

session_start();

//ログイン状態のチェック
if(!isset($_SESSION["USERID"])){
	header("Location: logout.php");
	exit;
}

echo "ようこそ".$_SESSION["USERID"]."さん";
?>

<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>サンプルアプリケーション</title>
	</head>
<body>
	<ul>
		<il><a href="logout.php">ログアウト</a></il>
	</ul>
</body>
</html>
