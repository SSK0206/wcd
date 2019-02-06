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
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
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
    
    if(isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
        echo '<a class="header_item" href="index.php">ホーム</a>';
        echo '<a class="header_item" href="logout.php">ログアウト</a>';
    } else {
        echo '<a class="header_item" href="session_login_input.html">ログイン</a>';
        echo '<a class="header_item" href="user_reg_input.html">ユーザー登録</a>'; 
        echo '<a class="header_item" href="ch_password_input.html">パスワード変更</a>';
    }

?>
    </header>
    <div style="position:absolute;left:0;right:0;top:10%;text-align: center; background:white;width:500px;margin:0 auto; padding-bottom:20px;border-radius:15px;">
        <h1>入力</h1>
               
<?php

    if(!empty($_POST["brand"]) && !empty($_POST["point"])){
        //POSTされた変数の受取
        ///$btnInsert = $_POST["btnInsert"];
        $howTo = "特になし";
        $comment = "特になし";
        $coffeeName = $_POST["brand"];
        $point = $_POST["point"];
        $howTo = $_POST["howTo"];
        $comment = $_POST["comment"];

        $sql = "insert into my_coffee (uid, coffeeName, point, howTo, comment) values ('$uid', '$coffeeName','$point','$howTo','$comment')"; //実行するSQLを文字列として記述
        $result = $mysqli->query($sql); //SQL文の実行
        if ($result) { //SQL実行のエラーチェック
            echo "登録に成功しました <br>";
        } else {
            echo "データの登録に登録に失敗しました <br>";
            echo "SQL文：$sql <br>"; //本当は表示しないほうがいい
            echo "エラー番号：$mysqli->errno <br>";
            echo "エラーメッセージ：$mysqli->error <br>";
            exit();
        }
        $mysqli->close();
    }


    header('Location:./mypage.php');
    exit;

?>           
            

        
   
    
    
</body>
</html>