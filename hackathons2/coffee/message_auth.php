<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="10">
<title> ログイン機能付き簡単メッセージング</title>
</head>
<body>
<header style="position:absolute;right:5%;top:2%;text-align: right;">
<a href="index.html">ホーム</a>
    <a href="user_reg_input.html">ユーザー登録</a>
    <a href="session_login_input.html">ログイン</a>
    <a href="ch_password_input.html">パスワード変更</a>
</header>
<?php
// ===================ログイン確認部分ここから==========================
//ログインしているかを認証
session_start();
if(isset($_SESSION['uid'])){
    $uid = $_SESSION['uid'];
    echo "ログイン済みです。あなたのユーザIDは $uid です<br>";
} else {
    echo "ログインしていないので、アクセスできません。";
    echo '<a href="user_reg_input.html">ユーザー登録</a>
<a href="session_login_input.html">ログイン</a>
<a href="message_auth.php">メッセージ</a>';
    exit();
}
// ===================ログイン確認部分ここまで==========================
//接続用パラメータの設定
$host = 'localhost'; //データベースが動作するホスト
$user = 'db1ds16201g'; //ユーザ名（各自が設定）
$pass = 'n6bbavax'; //パスワード（各自が設定）
$dbname = 'coffee';//データベース名（各自が設定）
// mysqliクラスのオブジェクトを作成
$mysqli = new mysqli($host,$user,$pass,$dbname);
    if ($mysqli->connect_error) { //接続エラーになった場合
    echo $mysqli->connect_error; //エラーの内容を表示
    exit();//終了
} else {
    //echo "You are connected to the DB successfully.<br>"; //正しく接続できたことを確認
    $mysqli->set_charset("utf8"); //文字コードを設定
}
//=============================================
//メッセージ投稿
//=============================================
//メッセージが入力されていたら登録
if(!empty($_POST["mainText"])){
    //echo $_POST["mainText"];
    $mainText = $_POST["mainText"];
    $sql = "insert into message (mainText, postedTime, uid) values ('$mainText', now(), '$uid')"; //実行するSQLを文字列として記述
    $result = $mysqli->query($sql); //SQL文の実行
    if ($result) { //SQL実行のエラーチェック
        //echo "データの登録に成功しました";
    } else {
        echo "データの登録に登録に失敗しました";
        echo "SQL文：$sql";
        echo "エラー番号：$mysqli->errno";
        echo "エラーメッセージ：$mysql->error";
        exit();
    }
} else {
    //echo "テキストが登録されていません<br>";
}
//=============================================
//メッセージ表示
//=============================================
$sql = "select * from message join users on message.uid = users.uid"; //実行するSQLを文字列として記述
$result = $mysqli->query($sql); //SQL文の実行
if ($result) { //実行結果が正しければ
    // 連想配列を取得
    while ($row = $result->fetch_assoc()) { //結果から一行づつ読み込み
    echo $row["postedTime"] . " - " . $row["mainText"]. " - " .$row["userName"] . "<hr>"; //結果を整形して表示
    }
    // 結果セットを閉じる
    $result->close();
}
//=============================================
//入力窓
//=============================================
?>


<form action="message_auth.php" method="post">
メッセージ：<textarea name="mainText" row="1" cols="40"></textarea><br>
<input type="hidden" value=<?= $uid ?>>
<input type="submit" value="投稿">


<?php
//=============================================
// DB接続を閉じる
//=============================================
$mysqli->close();
?>



</body>
</html>