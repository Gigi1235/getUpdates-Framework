<?php

if($msg == '/start'){
	$menu[]= [['text'=>'Ciao','callback_data' => 'ciao']];
	sendMessage($userID,'Ciao anche a te','html',$menu,'inline');
unset($menu);
}

if($cbdata == 'ciao'){
	$r = editMessage($userID,$msgid,"hai premuto il bottone ciao");
	sendMessage($userID,$r);
}
