<?php

    class FreeKassa extends dbc
    {
        private $freekassa_id       = FK_ID;
        private $freekassa_secret_1 = FK_SEC1;
        private $freekassa_secret_2 = FK_SEC2;

        private $order_id   = null;
        private $price      = null;
		private $id 		= null;

        public $days       = null;
		public $days_referer = null;
		public $days_buyer   = null;

        public $language   = 'ru';

        public $us_login    = null;
        public $us_password = null;

        function __construct() {$this->data = $this->paymentStatus();}

        public function prices(){
            $array = array(
                1 => 7,
                199 => 30,
                349 => 60,
                549 => 90,
                859 => 180,
                1399 => 360,
                1999 => 9999,
            );
            return $array;
        }
		public function days_referal(){
			$array = array(
                array( "buyer" => 0, "referer" => 0.5, "price" => 1, "days" => 7 ),
                array( "buyer" => 1, "referer" => 3, "price" => 199, "days" => 30 ),
                array( "buyer" => 3, "referer" => 7 , "price" => 349, "days" => 60 ),
                array( "buyer" => 4, "referer" => 11 , "price" => 549, "days" => 90 ),
                array( "buyer" => 10, "referer" => 23 , "price" => 859, "days" => 180 ),
                array( "buyer" => 20, "referer" => 50, "price" => 1399, "days" => 360 ),
                array( "buyer" => 0, "referer" => 60 , "price" => 1999, "days" => 9999 ),
            );
            return $array;
		}

        private function validUser(){
            $login      = isset($_COOKIE['login'])      ? $_COOKIE['login']     : $this->us_login;
            $password   = isset($_COOKIE['password'])   ? $_COOKIE['password']  : $this->us_password;

            $login      = parent::SECURE($login);
            $password   = parent::SECURE($password);
            $password   = md5($password);


            $this->query_select_one = true;
            
            return $check = parent::query(
                "SELECT * FROM `Users` WHERE
                ( `email` = '{$login}' or `login` = '{$login}' )
                and
                `password` = '{$password}'
                LIMIT 1"
            ); 
        }

        private function getInfoUser($login){
            $login = parent::SECURE($login);

            $this->query_select_one = true;
            return parent::query("SELECT * FROM `Users` WHERE `login` = '{$login}' LIMIT 1");
        }

        private function sign($form = true){
            if($form)
                return md5($this->freekassa_id . ':' . $this->price . ':' . $this->freekassa_secret_1 . ':' . $this->order_id);
            else
                return md5(FK_ID . ':' . $this->price . ':' . FK_SEC2 . ':' . $this->order_id);
        }

        public function getURL(){
            $check = $this->validUser();
            if(!$check)
                return header('Location: /?s=1');

            $days = isset($_GET['id']) ? $_GET['id'] : $this->days;

            foreach ($this->days_referal() as $key => $value) {
                if($days == $value['days']){
					$this->id = $key;
					$this->price = $value['price'];
				}
            }
            if($this->price == null)
                return header('Location: /?s=2');

            $this->order_id = time();
			$referal = '';
			file_put_contents('trash.log',$check);
			if(isset($check['referer'])){
				$referal = '&us_referal=' . $check['referer'];
				$this->price *= (100 - max(0,min($this->getInfoUser($check['referer'])['ref_discount'],30)))/ 100;
				//file_put_contents('trash.log',$this->getInfoUser($check['referer'])['ref_discount']);
			}else if(isset($_COOKIE['referal'])){
				$referal = '&us_referal=' . $_COOKIE['referal'];
				$this->price *= (100 - max(0,min($this->getInfoUser($_COOKIE['referal'])['ref_discount'],30))['ref_discount'])/ 100;
			}
			$this->price = intval($this->price);
            $query = array(
                'm'         => $this->freekassa_id,
                'oa'        => $this->price,
                'o'         => $this->order_id,
                's'         => $this->sign(),
                'lang'      => $this->language,
                'us_login'  => $check['login'],
				'us_id' 	=> $this->id,
            );
			// $this->price > 119 ||
            $link = 'http://www.free-kassa.ru/merchant/cash.php?'.http_build_query($query);
            return header('Location: ' . $link);

        }

        private function validIP(){
            $ip = isset($_SERVER['HTTP_X_REAL_IP']) ? $_SERVER['HTTP_X_REAL_IP'] : $_SERVER['REMOTE_ADDR'];

            if (!in_array($ip, array(
                '136.243.38.147',
                '136.243.38.149',
                '136.243.38.150',
                '136.243.38.151',
                '136.243.38.189',
                '88.198.88.98',
                '136.243.38.108',
            ))) {
                return false;
            }
            return true;
        }

        public function payment(){

            $validIP = $this->validIP();
            if($validIP == false)
                die('ERROR - IP');

            $this->order_id = $_POST['MERCHANT_ORDER_ID'];
            $this->price = $_POST['AMOUNT'];
			$this->id = $_POST['us_id'];

            $sign = $this->sign(false);
            if($sign != $_POST['SIGN'])
                die('ERROR - SIGN');
			$referal = "";
			if(isset($_POST['us_referal']))
				$referal = $_POST['us_referal'];
			if($getInfo['referer'])
				$referal = $getInfo['referer'];
			$user = $this->getInfoUser($referal);
            foreach ($this->days_referal() as $key => $value) {
                if($this->id == $key && $this->price == intval($value['price'] * (100 - $user['ref_discount'])/100)){
                    $this->days = $value['days'];
					if(isset($_POST['us_referal'])){
						$this->days_referer = $value["referer"];
						$this->days_buyer = $value["buyer"];
					}
				}
            }
            if($this->days == null)
                die('ERROR - PRICE');

            $getInfo = $this->getInfoUser($_POST['us_login']);
            if($getInfo == false)
                die('ERROR - USER');
			if($user && $user['login'] != $getInfo['login']){
				$reftime = $this->days_referer * 60 * 60 * 24;
				if($user['subscription'] > time()){
					$reftime = $user['subscription'] + $reftime;
				}else{
					$reftime = time() + $reftime;
				}
				parent::query("UPDATE `Users` SET `subscription` = '{$reftime}' WHERE `login` = '{$user['login']}' LIMIT 1");
				parent::query("UPDATE `Users` SET `referer` = '{$user['login']}' WHERE `login` = '{$getInfo['login']}' LIMIT 1");
				$balance = $user['balance'] + $this->price * ($user['salary'])/100;
				parent::query("UPDATE `Users` SET `balance` = '{$balance}' WHERE `login` = '{$user['login']}' LIMIT 1");
			}
            $ctime = time();
            $timeleft = ($this->days_buyer + $this->days) * 60 * 60 * 24;
            if($getInfo['subscription'] > $ctime){
                $timeleft = $getInfo['subscription'] + $timeleft;
            }else{
                $timeleft = $ctime + $timeleft;
            }

            parent::query("UPDATE `Users` SET `subscription` = '{$timeleft}' WHERE `login` = '{$getInfo['login']}' LIMIT 1");

            die('YES');
        }
        public function paymentStatus() { return [false,false]; }
    }
