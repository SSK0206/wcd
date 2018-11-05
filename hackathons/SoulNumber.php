<?php

/**
 * 
 */
class SoulNumber
{	

	public $one = '<span class="center">「行動力抜群で明朗快活な人」</span></span><br><主な芸能人><br>大野智、櫻井翔、志村けん、浜崎あゆみ、中村俊輔さん、明石家さんま、マツコ・デラックス';

	public $two = '<span class="center">「頼りになるリーダー」</span><br><主な芸能人><br>相葉雅紀、村上信五、香取慎吾、今田耕司、マドンナ、田中将大、武田鉄矢、所ジョージ';

	public $three = '<span class="center">「穏やかな平和主義者」</span><br><主な芸能人><br>
	阿部寛、有吉弘行、天海祐希、アントニオ猪木、竹之内豊、王貞治、仲間由紀恵';

	public $four = '<span class="center">「積極的でパワー溢れる人」</span><br><主な芸能人><br>丸山隆平、稲垣吾郎、ビートたけし、タモリ、北村一輝、桑田佳祐、ビル・ゲイツ、ブラットピット';

	public $five = '<span class="center">「真面目で誠実な人」</span><br><主な芸能人><br>松本潤、渋谷すばる、宇多田ヒカル、アンジェリーナ・ジョリー、孫正義、三谷幸喜、国分太一';

	public $six = '<span class="center">「社交的で人望を集める人」</span><br><主な芸能人><br>ジョン・レノン、マイケル・ジャクソン、三浦知良、中島みゆき、深田恭子、黒柳徹子';

	public $seven = '<span class="center">「感受性が強く繊細な方」</span><br><主な芸能人><br>
	木村拓哉、イチロー、小室哲也、新垣結衣、広末涼子、松嶋菜々子、スティーブ・ホーキング';

	public $eight = '<span class="center">「純粋で几帳面な人」</span><br><主な芸能人><br>安室奈美恵、二宮和也、野村克也、本田宗一郎、三木谷浩史、浜田雅功';

	public $nine = '<span class="center">「無邪気な寂しがり屋」</span><br><主な芸能人><br>中居正広、沢尻エリカ、マザー・テレサ、オノ・ヨーコ、松本人志、千原ジュニア、岡村隆史、西田敏行';

	function make_array ($year, $month, $day)
	{
		$array = str_split($year);
		$array_month = str_split(sprintf('%02d',$month));
		$array_day = str_split(sprintf('%02d',$day));

		$array[4] = $array_month[0];
		$array[5] = $array_month[1];
		$array[6] = $array_day[0];
		$array[7] = $array_day[1];

		return $array;
	}

	function calc($array)
	{
		$sum = 0;
		foreach ($array as $v)
		{
			$sum += (int)$v;
		}


		if (strlen((string)$sum) > 1)
		{
			$a = str_split($sum);
			return($this->calc($a));
		}
		else
		{			
			return $sum;
		}
	}
}

?>