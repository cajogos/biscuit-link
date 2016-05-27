<?php

require_once '../functions.php';

$username = Request::_POST('username');
$password = Request::_POST('password');



Session::setValue('userloggedin', 'carlos');