<?php
class EmailConfig {

    public $default = array(
        'transport' => 'Smtp',
        'from' => array('polish@polaron.com.au' => 'Polaron'),
		'sender' => array('polish@polaron.com.au' => 'Polaron'),
        'host' => 'ssl://smtp.gmail.com',//'ssl://smtp.live.com', //'ssl://smtp.gmail.com',
        'port' => 465,
        'username' => 'office@polaron.com.au',
        'password' => 'macandcheese1206');

    public $fast = array(
        'transport' => 'Smtp',
        'from' => array('polish@polaron.com.au' => 'Test Mail name sender'),
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'username' => 'polish@polaron.com.au',
        'password' => 'kotipies1206');
    
    public $smtp = array(
        'transport' => 'Smtp',
        'from' => array('noreply@polaron.com.au' => 'Polaron'),
        'host' => 'ssl://smtp.gmail.com', //'ssl://c2s1-3m-mel.hosting-services.net.au', //'ssl://smtp.gmail.com',
        'port' => 465,
        'timeout' => 30,
        'username' => 'office@polaron.com.au',
        'password' => 'macandcheese1206',
        'client' => null,
        'log' => false,
        'charset' => 'utf-8',
        'headerCharset' => 'utf-8',
    );

}