<?php

include_once ('../models/Require.php');
include_once ('../models/DataBase.php');
include_once ('../models/Auth.php');

function loginAction(){

    $Auth = new Auth;
    $Auth->login();

}
function registerAction(){

    $Auth = new Auth;
    $Auth->register();

}
function checkAction(){

    $Auth = new Auth;
    $Auth->check();

}
function logoutAction(){

    $Auth = new Auth;
    $Auth->logout();
}
