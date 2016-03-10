<?php

session_start();

$error_message = "";

//テスト用ID・PASS
$test_user_id = "testuser"; $test_pass = "testpass";

//表示用に特殊文字をエスケープ
$view_user_id = htmlspecialchars($_POST["userid"], ENT_QUOTES);

//ログインボタンが押されたとき
if(isset($_POST["login"])){

	//認証成功
	if($_POST["userid"] == $test_user_id && $_POST["pass"] == $test_pass){

		//セッションIDを新規に発行する
		session_regenerate_id(TRUE);
		$_SESSION["USERID"] = $_POST["userid"];
		header("Location: login_main.php");
		exit;
	
	}else{

		$errorMessage = "ユーザーIDあるいはパスワードに誤りがあります";

	}

}

?>

<!doctype html>
<html>
 <head>
 	<meta charset="UTF-8">
 	<title>ログインサンプル</title>
 </head>
 <body>
 	<form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
 		<fieldset>
 		<legend>ログインフォーム</legend>
 		<div><?php echo $errorMessage; ?></div>
 		<label for="userid">ユーザーID</label>
 		<input type="text" id="userid" name="userid" value="<?php echo $view_user_id; ?>">
 		<br>
 		<label for="pass">パスワード</label>
 		<input type="password" id="pass" name="pass" value="">
 		<br>
 		<label></label>
 		<input type="submit" id="login" name="login" value="ログイン">
 		</fieldset>
 		</form>
 		</body>
 	</html>
 	
