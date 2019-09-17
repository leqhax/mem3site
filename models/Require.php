<?php

    /**
    * Settings class
    */
    class settings{

        /**
        * @var (string) color
        */
        public $debug_color_background = "#000";
        public $debug_color_text = "#fff";
        /****/

        /**
        * @var (string) crypt_algoritm '5' or '6' [AES]
        */
        private $crypt_algoritm = '6';

        /**
        * Use @var (string) crypt_rounds only for AES
        */
        private $crypt_rounds = 'rounds=1488';

        /**
        * @var (string) crypt_salt
        */
        private $crypt_salt = '6011f4f4daa873fe22e8d952aa4357da';

        /**
        * @var (string) hash_type
        */
        public $hash_type = "sha512";

        /**
        * @var (string) ajax_output_print_block
        */
        public $ajax_output_print_block = false;


        public function DEBUG($string = null, $die = false){
            $subject = "<div style='display: block;background-color: " . $this->debug_color_background . ";color: " . $this->debug_color_text . ";padding: 10px;margin: 10px 0;'><strong>Debug:</strong> <br /><pre>";
            $footer = "</pre></div>";
            echo $subject;
                print_r($string);
            echo $footer;

            if($die) die;

            return;
        }

        public function crypt_string($string){
            $salt = '$' . $this->crypt_algoritm . '$' . $this->crypt_rounds . '$' . $this->crypt_salt . '$';
            return crypt($string, $salt);
        }

        public function ajax_result($bool, $message){
            $data['status'] = (bool) $bool;
            $data['message'] = htmlspecialchars($message);
            return print_r(json_encode($data), $this->ajax_output_print_block);
        }

        public function generate_token(){
            $string  = mb_strimwidth(hash($this->hash_type, rand(1000000, 100000000)), 1, 65);
            $string .= mb_strimwidth(hash($this->hash_type, rand(1000000, 100000000)), 1, 65);

            return $string;
        }

        public function hash_string($string){
            return hash($this->hash_type, $string);
        }

        function Captcha($captcha, $key){
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret'    => $key,
                'response'  => $captcha
            );
            $options = array(
                'http' => array (
                    'method'    => 'POST',
                    'content'   => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $verify = file_get_contents($url, false, $context);
            file_put_contents("logs1.log",$captcha);
            file_put_contents("logs2.log",$key);
            file_put_contents("logs3.log",$verify);
            $captcha_success = json_decode($verify);
            return $captcha_success->success;
        }
    }
