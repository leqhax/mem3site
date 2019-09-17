<?php

	





function indexAction(){


}

function blyadAction(){


	$string = "
			id=1;
			weapon=1;
			skin=3;
			stattrak=1;
			seed=5;
			wear=6;
			quality=7;
			sticker1=8;
			sticker2=9;
			sticker3=10;
			sticker4=11;
			act=12;
			att=13;
		,
			id=2;
			weapon=2;
			skin=3;
			stattrak=1;
			seed=5;
			wear=6;
			quality=7;
			sticker1=8;
			sticker2=9;
			sticker3=10;
			sticker4=11;
			act=12;
			att=13;
		,
			id=2;
			weapon=3;
			skin=3;
			stattrak=1;
			seed=5;
			wear=6;
			quality=7;
			sticker1=8;
			sticker2=9;
			sticker3=10;
			sticker4=11;
			act=12;
			att=13;
		";


	$exp = explode(',', $string);

	foreach ($exp as $key => $value) {
		preg_match_all('/(?<tag>\w+)=(?<value>.*?);/iu', $value, $result[]);
	}

	foreach ($result as $key) {
		$res[$key['value'][1]] = array_combine($key['tag'], $key['value']);
	}
		
	print_r($res);
}


function TranslateInvCh($weapon_id){

	switch ($weapon_id) {
		case 1:$translate = "";break;
		case 1:$translate = "";break;
		case 1:$translate = "";break;
		case 1:$translate = "";break;
		case 1:$translate = "";break;
		case 1:$translate = "";break;
		case 1:$translate = "";break;
		case 1:$translate = "";break;
		case 1:$translate = "";break;
		
		default:$translate = "ID не найден.";break;
	}

	return $translate;
}

?>