<?php

class dbc extends settings{
    private $host = HOST_IP;
    private $user = HOST_USER;
    private $pass = HOST_PASS;
    private $name = HOST_NAME;

    /**
    * @var boolean
    */
    public $debug = false;

    /**
    * @var boolean if(false) return last insert/update ID;
    */
    public $query_select = true;

    /**
    * @var boolean
    */
    public $query_select_one = false;

    function db(){
        $db = @mysqli_connect($this->host, $this->user, $this->pass, $this->name);
        if(!$db){
            parent::DEBUG('Ошибка подключения к базе данных.', 1);
            return false;
        }

        if($this->debug)
            parent::DEBUG("Успешно подключён!");

        mysqli_set_charset($db,'utf8');
        return $db;
    }
    function close($db){
        return mysqli_close($db);
    }

    function query($query){
        $db = $this->db();

        if(!$this->query_select){
            mysqli_query($db, $query);
            return mysqli_insert_id($db);
        }

        $result = mysqli_query($db, $query);
        if(!$result)
            return false;

        if($this->query_select_one){
            $array = mysqli_fetch_assoc($result);
        }else{
            while ($row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }
        }

        $this->close($db);
        return $array;
    }

    function SECURE($str){
        $db     = $this->db();
        $str    = htmlspecialchars(mysqli_real_escape_string($db, $str));
        $this->close($db);
        return $str;
    }

    function getSetting($name){
        $name = $this->SECURE($name);
        $this->query_select_one = true;
        $value = $this->query("SELECT * FROM `settings` WHERE `name` = '{$name}' LIMIT 1");
        if($value == false)
            return false;

        return $value['value'];
    }
    
}
