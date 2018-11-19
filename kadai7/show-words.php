<?php 

//DB接続用パラメータ
$host = 'localhost'; //データベースが動作するホスト
$user = '****'; //ユーザ名(各自のものに変更)
$pass = '****'; //パスワード(各自のものに変更)
$dbname = '*****';//データベース名(各自のものに変更)
// mysqliクラスのオブジェクトを作成
$mysqli = new mysqli($host,$user,$pass,$dbname);
 
if ($mysqli->connect_error) { //接続エラーになった場合
    echo $mysqli->connect_error; //エラーの内容を表示
    exit();//終了
} else {
    echo "You are connected to the DB successfully.<br>"; //正しく接続できたことを確認
    $mysqli->set_charset("utf8"); //文字コードを設定
}
 
$sql = "insert into Johnnys (name, menu) values ('$name', $menu')"; //実行するSQLを文字列として記述
$result = $mysqli->query($sql); //SQL文の実行
 
//クエリー失敗
if(!$result) {
	echo $mysqli->error;
	exit();
}
 
//レコード件数
$row_count = $result->num_rows;
 
//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$rows[] = $row;
}
 
//結果セットを解放
$result->free();
 
// データベース切断
$mysqli->close();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>入力単語リスト</title>
</head>
<body>
<h1>入力単語リスト</h1>
件数：<?php echo $row_count; ?>
<table>
	<caption>入力単語テーブル</caption>
	<thead>
		<tr>
			<th>人物</th>
			<th>食事メニュー</th>
		</tr>
	</thead>
	<tbody>
<?php 
	foreach($rows as $row){
?> 
		<tr>
			<td><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></td>
			<td><?php echo htmlspecialchars($row['menu'],ENT_QUOTES,'UTF-8'); ?></td>
		</tr>
<?php 
} 
?>
	</tbody>
</table>
</body>
</html>