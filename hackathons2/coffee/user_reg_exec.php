<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>新規ユーザ登録</title>
</head>
<body>
<header style="position:absolute;right:5%;top:2%;text-align: right;">
    <a href="index.php">ホーム</a>
    <a href="user_reg_input.html">ユーザー登録</a>
    <a href="session_login_input.html">ログイン</a>
    <a href="ch_password_input.html">パスワード変更</a>
</header>
<?php
//接続用パラメータの設定
$host = 'localhost'; //データベースが動作するホスト
$user = 'db1ds16201g'; //ユーザ名（各自が設定）
$pass = 'n6bbavax'; //パスワード（各自が設定）
$dbname = 'coffee';//データベース名（各自が設定）
// try{
//     $pdo = new PDO(
//         'mysql:host=localhost;dbname=coffee;charset=utf8',
//         '1ds16201g',
//         'n6bbavax'
//     );
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
// }catch(PDOException $Exception){
//     die('接続エラー：' .$Exception->getMessage());
// }

// mysqliクラスのオブジェクトを作成
$mysqli = new mysqli($host,$user,$pass,$dbname);
    if ($mysqli->connect_error) { //接続エラーになった場合
    echo $mysqli->connect_error; //エラーの内容を表示
    exit();//終了
} else {
    //echo "You are connected to the DB successfully.<br>"; //正しく接続できたことを確認
    $mysqli->set_charset("utf8"); //文字コードを設定
}
//入力データの受取
if(!empty($_POST["userName"]) && !empty($_POST["password1"]) && !empty($_POST["password2"])){
    //POSTされた変数の受取
    $userName = $_POST["userName"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];
    //ユーザ名が既に使用されているかのチェック
    $sql = "select * from user where userName = '$userName'"; //実行するSQLを文字列として記述
    $result = $mysqli->query($sql); //SQL文の実行
    if( $result->num_rows != 0){
        echo "ユーザ名「${userName}」はすでに登録されているため使用できません。<br>";
        exit();
    }
    //パスワードが一致するかのチェック
    if($password1 != $password2) {
        echo "パスワードが一致しません<br>";
        exit();
    }
    //パスワードの暗号化
    $enc_passwd = password_hash($password1,PASSWORD_DEFAULT); //ソルトを使ったパスワードの暗号化
    //ユーザの登録
    $sql = "insert into user (userName, password) values ('$userName','$enc_passwd')"; //実行するSQLを文字列として記述
    $result = $mysqli->query($sql); //SQL文の実行
    if ($result) { //SQL実行のエラーチェック
        echo "ユーザ「${userName}」の登録に成功しました <br>";
    } else {
        echo "データの登録に登録に失敗しました <br>";
        echo "SQL文：$sql <br>"; //本当は表示しないほうがいい
        echo "エラー番号：$mysqli->errno <br>";
        echo "エラーメッセージ：$mysqli->error <br>";
        exit();
    }
    // DB接続を閉じる
    $mysqli->close();
} else {
    echo "入力されていない項目があります。<br>";
}
?>


</body>
</html>