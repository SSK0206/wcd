<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>隠れ肥満診断</title>
</head>
<body>
<?php

$haight = $_POST["haight"];
$waist = $_POST["waist"]; 
$obesity = $waist / $haight;
$obesity = number_format($obesity,2);
echo "あなたの<b>ウエスト/身長</b>は<b>${obesity}</b>です．";
if ($obesity >= 0.6) {
	echo "肥満です。";
}elseif($obesity >= 0.5) {
	echo "肥満になる可能性があります。";
}else{
	echo "肥満になる可能性は少ないですね。";
}
?>
<br>
<a href="input.html">戻る</a>
</body>
</html>