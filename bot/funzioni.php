<?php

 function curl($method,$args = []){
	global $token;
	if(count($args) > 0){
		$args = http_build_query($args);
	}else{
		$args = '';
	}
	$request = curl_init("https://api.telegram.org/bot$token/$method");   
	curl_setopt_array($request, array(
		CURLOPT_CONNECTTIMEOUT => 1,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_USERAGENT => 'cURL request',
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $args,
	));
	$result = curl_exec($request);
	curl_close($request);
	return $result;
}


function sendMessage($chatID,$text = '',$parse_mode = 'html',$menu = [],$reply_markup='inline'){
	$args = [
		'chat_id'		=> $chatID,
		'text'			=> $text,
		'parse_mode' 	=> $parse_mode,
	];
	if(!empty($menu)){
		if($reply_markup == 'inline'){
			$args['reply_markup'] = json_encode(['inline_keyboard' => $menu]);
		}elseif($reply_markup == 'reply'){
			$args['reply_markup'] = json_encode(['keyboard' => $menu]);
		}
	}

	return curl('sendMessage',$args);
}

function editMessage($chatID,$msgid,$text = "",$menu = [],$parse_mode = 'html'){
   
    
    $args = [
        "chat_id" => $chatID,
        "message_id" => $msgid,
        "text"=>$text,
        "parse_mode" => $parse_mode,
    ];
    if(!empty($menu)){
        $args["reply_markup"] = json_encode(["inline_keyboard" => $reply_markup]);
    }
    return curl("editMessageText",$args);
}
