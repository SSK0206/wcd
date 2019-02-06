<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MY COFFEE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body style="margin:0;">
    <img src="img/coffee_main.jpg" alt="" style="width:100%;position: relative;margin:0;padding: 0;">
    <header style="position:absolute;right:5%;top:2%;text-align: right;">
<?php
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

    session_start();
    $id = $_SESSION['uid'];
    $sql = "select * from user where uid = '$id'"; //実行するSQLを文字列として記述
    $result = $mysqli->query($sql); //SQL文の実行
    
    $row = $result->fetch_assoc(); //結果から一行づつ読み込み
    $user_name = $row["userName"];

    if(isset($_SESSION['uid'])){
        //$uid = $_SESSION['uid'];
        echo '<a class="header_item" href="mypage.php">'.$user_name.' さん</a>';
        echo '<a class="header_item" href="logout.php">ログアウト</a>';
    } else {
        echo '<a class="header_item" href="session_login_input.html">ログイン</a>';
        echo '<a class="header_item" href="user_reg_input.html">ユーザー登録</a>'; 
        echo '<a class="header_item" href="ch_password_input.html">パスワード変更</a>';
    }
?>
    </header>
    <div style="position:absolute;left:0;right:0;top:10%;text-align: center;">
        <h1>MY COFFEE</h1>
        <h3 style="margin:0 auto;border:1px solid #000;padding:20px;max-width:300px;">あなただけの最高の一杯を</h3>
    </div>
    
    
</body>
</html>