<?php

//★データベースアクセス関数　戻り値＝$dbh
function db_access($db_name,$db_host,$db_user,$db_pass){
	$dsn = 'mysql:dbname='.$db_name.';host='.$db_host;

	try{
	    $dbh = new PDO($dsn, $db_user, $db_pass,
		array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`"
		)
	    );

	return $dbh;

	}catch (PDOException $e){
	    print('Error:'.$e->getMessage());
	    die();
	}
}

?>