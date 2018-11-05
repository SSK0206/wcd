<?php

	require_once 'CorrectInput.php';
	require_once 'SoulNumber.php';

	$year = $_POST["year"];
	$month = $_POST["month"];
	$day = $_POST["day"];
	$is_correct = true;
?>

<!DOCTYPE html>
<html>
<head>
	<title>誕生日性格診断</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div style="margin: 0 auto; text-align: center;">
		<img src="images/line.png" alt="" style="width:500px; margin-top: 40px;" >
	</div>
	<h1 style="text-align: center; margin: 5px;"><img src="images/fortune.png" alt="fortune telling" style="width: 30px;margin-right: 20px;">誕生日性格占い<img src="images/crystal.png" alt="fortune telling" style="width: 30px;margin-left: 20px;"></h1>
	<div style="margin: 0 auto; text-align: center;">
		<img src="images/line.png" alt="" style="width:500px; margin-bottom: 30px;" >
	</div>
<div style="max-width: 500px;margin:0 auto;">
<?php

$my_array = new SoulNumber();
$array = $my_array->make_array($year, $month, $day);
$soul_number = $my_array->calc($array);

?>


<?php 

$my_input = new CorrectInput();

$is_leap_year = $my_input->is_leap_year($year);
$is_correct = $my_input->is_correct($month, $day);

?>

<?php
	#年を上二桁と下二桁に分割
	$year = str_split($year,2);
	$year_2 = (int)$year[1];

	#奇数の場合のみ年の下二桁に11を加える
	$year_2 = $my_input->odd_plus11($year_2);
	$year_2 = $year_2/2;

	#奇数の場合のみ年の下二桁に11を加える
	$year_2 = $my_input->odd_plus11($year_2);
	$doomsday = $year_2 % 7;

	#$doomsdayが何曜日なのか判明
	$days20 = ["火", "月", "日", "土", "金", "木", "水"];
	$days19 = ["水", "火", "月", "日", "土", "金", "木"];
	
	#生まれた月のdoomsdayとの差を求める
	$day = $my_input->diff_doomsday($month, $day);

	#生まれた日の曜日の添え字がわかる
	$day = $my_input->show_the_day($day, $doomsday);

echo '<div style="margin: 20px auto;text-align:center;border: 1px solid #f00; border-radius: 1em;">';
	if ($is_correct){
		if($year[0] == "20"){
			$ans = $days20[$day];
		}
		else{
			$ans = $days19[$day];
		}
		echo 'あなたは';
		echo '<span style="margin: 0 5px; font-size: 20px; color: red;">';
		echo $ans;
		echo '曜日</span>';
		echo "生まれです。";

	}else{
		echo '正しい日付を入力してください。';
	}
echo '</div>';

	if ($is_correct){
		switch ($ans) {
			case '日':
				echo $my_input->sun;
				break;
			case '月':
				echo $my_input->mon;
				break;
			case '火':
				echo $my_input->tue;
				break;
			case '水':
				echo $my_input->wed;
				break;
			case '木':
				echo $my_input->thi;
				break;
			case '金':
				echo $my_input->fri;
				break;
			case '土':
				echo $my_input->sat;
				break;
		}
	}


	if ($is_correct){
		if($year[0] == "20"){
			$ans = $days20[$day];
		}
		else{
			$ans = $days19[$day];
		}
echo '<div style="margin: 20px auto;text-align:center;border: 1px solid #f00; border-radius: 1em;">';
		echo "あなたのソウルナンバーは";
		echo '<span style="margin: 0 5px; font-size: 20px; color: red;">';
		echo $soul_number;
		echo '</span>';
		echo "です。";
	}

echo '</div>';

	if ($is_correct){
		switch ($soul_number) {
			case '1':
				echo $my_array->one;
				break;
			case '2':
				echo $my_array->two;
				break;
			case '3':
				echo $my_array->three;
				break;
			case '4':
				echo $my_array->four;
				break;
			case '5':
				echo $my_array->five;
				break;
			case '6':
				echo $my_array->six;
				break;
			case '7':
				echo $my_array->seven;
				break;
			case '8':
				echo $my_array->eight;
				break;
			case '9':
				echo $my_array->nine;
				break;
		}
	}
?>
<div>
	<a id="back" href="input.html" class="button" style="text-decoration: none; margin-top: 20px;width: 28px;">戻る</a>
</div>
</div>
</body>
</html>