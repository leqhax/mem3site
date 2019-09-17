<?php



    /**
     *
     */
    class Auth extends dbc
    {
        private $login = null;
        private $password = null;

        public function login(){
            $login      = isset($_POST['login'])    ? $_POST['login']       : null;
            $password   = isset($_POST['password']) ? $_POST['password']    : null;
            $captcha    = isset($_POST['captcha'])  ? $_POST['captcha']     : null;

            if(!$login || !$password)
                return parent::ajax_result(false, 'Заполните все поля!');

            if(strlen($login) >= 50)
                return parent::ajax_result(false, 'Максимальная длина логина [50]!');

            if(strlen($password) >= 50)
                return parent::ajax_result(false, 'Максимальная длина пароля [50]!');

            $captcha_key = parent::getSetting('secret_key');
            $check  = parent::Captcha($captcha, $captcha_key);
			if($check == false)
               return parent::ajax_result(false, 'Капча не заполнена!');

            $login = parent::SECURE($login);
            $login_password = md5($password);

            $res = parent::query("SELECT * FROM `Users` WHERE (`email` = '{$login}' or `login` = '{$login}') and `password` = '{$login_password}' LIMIT 1");
            if($res == false)
                return parent::ajax_result(false, 'Неверные данные!');

            setcookie('login', $login, time() + 60 * 60 * 24 * 1488, '/');
        	setcookie('password', $password, time() + 60 * 60 * 24 * 1488, '/');

            return parent::ajax_result(true, 'Добро пожаловать!');
        }

        public function register(){
            $login      = isset($_POST['login'])    ? $_POST['login']       : null;
            $email      = isset($_POST['email'])    ? $_POST['email']       : null;
            $password   = isset($_POST['password']) ? $_POST['password']    : null;
            $password2  = isset($_POST['password2'])? $_POST['password2']   : null;
            $captcha    = isset($_POST['captcha'])  ? $_POST['captcha']     : null;

            if(!$login || !$email || !$password|| !$password2)
                return parent::ajax_result(false, 'Заполните все поля!');

            if($password != $password2)
                return parent::ajax_result(false, 'Пароли не совпадают!');

            if(strlen($login) < 5)
                return parent::ajax_result(false, 'Минимальная длина логина [5]!');

            if(strlen($login) >= 50)
                return parent::ajax_result(false, 'Максимальная длина логина [50]!');
			
			if(!preg_match("/^[0-9a-zA-Z_]{5,50}$/", $login))
				 return parent::ajax_result(false, 'Логин содержит запрещенные символы!');
			 
            if(strlen($email) < 5)
                return parent::ajax_result(false, 'Минимальная длина почты [5]!');

            if(strlen($email) >= 50)
                return parent::ajax_result(false, 'Максимальная длина почты [50]!');

            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                return parent::ajax_result(false, 'Введите корректную почту!');

            if(strlen($password) < 5)
                return parent::ajax_result(false, 'Минимальная длина пароля [5]!');

            if(strlen($password) >= 50)
                return parent::ajax_result(false, 'Максимальная длина пароля [50]!');

            $captcha_key = parent::getSetting('secret_key');
            $check  = parent::Captcha($captcha, $captcha_key);
            if($check == false)
                return parent::ajax_result(false, 'Капча не заполнена!');

            $login = parent::SECURE($login);
            $email = parent::SECURE($email);
            $password2 = md5($password2);

            $this->query_select_one = true;

            $checkLogin = parent::query("SELECT * FROM `Users` WHERE `login` = '{$login}' LIMIT 1");
            if($checkLogin != false)
                return parent::ajax_result(false, 'Такой логин уже существует!');

            $checkEmail = parent::query("SELECT * FROM `Users` WHERE `email` = '{$email}' LIMIT 1");
            if($checkEmail != false)
                return parent::ajax_result(false, 'Такая почта уже существует!');

            $ctime = time();
            $this->query_select = false;
            $res = parent::query("INSERT INTO `Users`(`login`, `email`, `password`, `date_register`) VALUES ('{$login}', '{$email}', '{$password2}', '{$ctime}')");

            setcookie('login', $login, time() + 60 * 60 * 24 * 1488, '/');
        	setcookie('password', $password, time() + 60 * 60 * 24 * 1488, '/');

            return parent::ajax_result(true, 'Добро пожаловать!');
        }
        public function check(){
            $login      = isset($_COOKIE['login'])    ? $_COOKIE['login']       : null;
            $password   = isset($_COOKIE['password']) ? $_COOKIE['password']    : null;

            if(!$login || !$password)
                return parent::ajax_result(false, '');


            $login = parent::SECURE($login);
            $login_password = md5($password);

            $res = parent::query("SELECT * FROM `Users` WHERE (`email` = '{$login}' or `login` = '{$login}') and `password` = '{$login_password}' LIMIT 1");
            if($res == false)
                return parent::ajax_result(false, '');

            return parent::ajax_result(true, '');
        }
        public function logout(){
            setcookie('login', null, time() - 1, '/');
            setcookie('password', null, time() - 1, '/');

            return header('Location: /');
        }
    }
