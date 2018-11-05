<?php

/**
 **
 */
class CorrectInput
{	
	public $is_leap_year = false;

	public $sun = '日曜日生まれの人は、まさにリーダータイプです。自立心がとても旺盛で、常識などに縛られることなく、自分の意思と力で歩んでいくことができます。まさに太陽のような人で、自分が注目を集めていないと気のすまないところがあります。';

	public $mon = '月曜日生まれの人はとても優しい雰囲気の持ち主です。一見おっとりしているように見えますが感受性が強く、またその感情の動きが表にも出やすいため、そんな月曜日生まれの人の感情表現に周囲では驚く人も少なくありません。';

	public $tue = '火曜日生まれの人は、とても愛嬌が良く愛され上手です。明るく、一緒にいるだけで楽しくなる火曜日生まれの人の			まわりには、いつもたくさんの人が集まってきます。';	

	public $wed = '水曜日生まれの人は、非常に寂しがり屋な人が多いです。寂しがり屋な割に、束縛されることは非常に嫌いなので、帰りの時間をいちいち確認されたり、休日の予定などを詮索されることを嫌がります。';

	public $thi = '木曜日生まれの人は、大変個性的です。黙っていても目立ってしまうので、目立つあまり噂や批判のターゲットになりやすいところがありますが、基本的に自信家なので、本人はあまりそのことを気にする様子がありません。';

	public $fri = '金曜日生まれの人は、とても美意識が高いのが特徴です。内面的な綺麗さよりも外見的な綺麗さに重視する人が多く、センスもよくファッションにもとてもこだわります。';
	
	public $sat = '土曜日生まれの人は、静と動を兼ね備えたタイプです。基本的には自宅のソファーで朝から晩までゆっくり過ごすような「静」のイメージが強い土曜日生まれさんですが、いざスイッチが入ると驚くほど行動的になります。';

	function is_leap_year($year)
	{
		if ($year % 4 == 0)
		{
			$this->is_leap_year = true;
		}
		return $this->is_leap_year;
	}


	/*
	** 正しい入力か判定
	*/
	function is_correct($month, $day)
	{
		$is_correct = true;
		if ($month == 2)
		{
			if ($this->is_leap_year && $day > 29 || !$this->is_leap_year && $day >= 29)
			{
				$is_correct = false;
			}
		}elseif ($month == 2 || $month == 4 || $month == 6 || $month == 9 || $month == 11)
		{
			if ($day > 30)
			{
				$is_correct = false;
			}
		}
		return $is_correct;
	}





	/*
	** 奇数にのみ11を加える
	*/
	function odd_plus11($year_2)
	{
		if ($year_2 % 2 == 1)
		{
			$year_2 = $year_2 + 11;
		}
		return $year_2;
	}

	/*
	** doomsdayとの差を求める
	*/
	function diff_doomsday($month, $day)
	{
		switch ($month) {
		case 1:
			if($this->is_leap_year){
				$day = $day - 4;
			}else{
				$day = $day - 3;
			}
			break;
		case 2:
			if($this->is_leap_year){
				$day = $day - 29;
			}else{
				$day = $day - 28;
			}
			break;
		case 3:
			$day = $day - 7;
			break;
		case 4:
			$day = $day - 4;
			break;
		case 5:
			$day = $day - 9;
			break;
		case 6:
			$day = $day - 6;
			break;
		case 7:
			$day = $day - 11;
			break;
		case 8:
			$day = $day - 8;
			break;
		case 9:
			$day = $day - 5;
			break;
		case 10:
			$day = $day - 10;
			break;
		case 11:
			$day = $day - 7;
			break;
		case 12:
			$day = $day - 12;
			break;
		}
		return $day;
	}

	/*
	** 生まれた日の曜日の添え字を返す
	*/
	function show_the_day($day, $doomsday)
	{
		if ($day > 0) {
			//$ans = $day%7;
			$day = ($doomsday - $day%7 + 7)%7;
		}else{
			$diff = abs($day)%7;
			//$diff = abs($diff)%7;
			$day = ($doomsday + $diff + 7)%7;
		}
		return $day;
	}

	
}

// ?>