<!DOCTYPE html>
	<lang="ja">
<head>
    <meta charset="UTF-8">
    <title>データの挿入</title>
</head>
<body>
	<form action ="index.php" method="post">
		<button type="submit" name="conect">接続</button>
		<button type="submit" name="create">テーブル作成</button>
		<button type="submit" name="drop">テーブル削除</button>
		<button type="submit" name="insert">データの挿入</button>
	</form>
</body>
</html>
<?php 
    $dsn = 'mysql:dbname=webphp2311_15;host=localhost;charset=utf8mb4';
    $user = 'root';
    $password = '';
		if(isset($_POST["conect"]))
		{
	    try {
	        $pdo = new PDO($dsn, $user, $password);
					echo "接続成功";
	    } catch (PDOException $e) {
	        exit($e->getMessage());
	    }
		}
		elseif(isset($_POST["create"]))
		{
	 		try {
	        $pdo = new PDO($dsn, $user, $password);
	        $sql = 'CREATE TABLE  SampleDB (id INT(11) PRIMARY KEY AUTO_INCREMENT,name VARCHAR(255),age INT(11))';
					// SQL文を実行する
          $pdo->query($sql);
					echo "作成成功";
	    } catch (PDOException $e) {
	        exit($e->getMessage());
	    }
		}
		elseif(isset($_POST["drop"]))
		{
	 		try {
	        $pdo = new PDO($dsn, $user, $password);
	        $sql = 'DROP TABLE  SampleDB';
					// SQL文を実行する
          $pdo->query($sql);
					echo "削除成功";
	    } catch (PDOException $e) {
	        exit($e->getMessage());
	    }
		}
		elseif(isset($_POST["insert"]))
		{
	 		try {
	        $pdo = new PDO($dsn, $user, $password);
					$sql = "INSERT INTO  SampleDB(name,age) VALUES ('watanabe',77)";
    			$stmt = $pdo->prepare($sql);
					// SQL文を実行する
          $pdo->query($sql);
					echo "挿入成功";
	    } catch (PDOException $e) {
	        exit($e->getMessage());
	    }
		}

?>
