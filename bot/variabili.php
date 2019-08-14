<?php

error_reporting(false);

unset($msgid);
unset($userID);
unset($is_bot);
unset($nome);
unset($username);
unset($lingua);
unset($chatID);
unset($type);
unset($titolo);
unset($msg);
unset($cbdata);
unset($cbid);





if(isset($update['message'])){

$msgid = $update['message']['message_id'];
$userID = $update['message']['from']['id'];
$is_bot = $update['message']['from']['is_bot'];
$nome = $update['message']['from']['first_name'];
$username = $update['message']['from']['username'];
$lingua = $update['message']['from']['language_code'];
$chatID = $update['message']['chat']['id'];
$type = $update['message']['chat']['type'];
$titolo = $update['message']['chat']['title'];
$msg = $update['message']['text'];
}
if(isset($update['callback_query'])){
	$cbid = $update['callback_query']['id'];
	$msgid = $update['callback_query']['message']['message_id'];
	$userID = $update['callback_query']['from']['id'];
	$is_bot = $update['callback_query']['from']['is_bot'];
	$nome = $update['callback_query']['from']['first_name'];
	$username = $update['callback_query']['from']['username'];
	$lingua = $update['callback_query']['from']['language_code'];
	$cbdata = $update['callback_query']['data'];
}
error_reporting(E_ERROR);
