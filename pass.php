<?php 
	
	function ascii_crypt($str){
		$encrypted = '';
		for ($i = 0; $i < strlen($str); $i++) {
			$number = ord($str[$i]);
			if(!($i == 0)){
				$encrypted .= '-';
			}
			if ($number % 2 == 0) {
				//It's even
				$encrypted .= strval(ord($str[$i])+5);
			}
			else{
				$encrypted .= strval(ord($str[$i])-5);
			}
		}
		return $encrypted;
	}
	
	function ascii_decrypt($str){
		$dencrypted = '';
		$str2 = explode( '-', $str );
		for($i=0;$i < count($str2); $i++){
			$ascii_dec = intval($str2[$i]);
			$dencrypted .= strval(chr($ascii_dec+6));
		}
		return $dencrypted;
	}
	$arr = array('status'=> 0 );
	$pass = $_POST['pass'];
	$phrase = $_POST['phrase'];
	$encr = ascii_crypt($phrase);
	$user_encr = $pass;
	$arr["encr"] = $phrase;	
	$arr["user_encr"] = $phrase;	
	
	if($user_encr==$encr){
	 	$arr['url_response'] = '/attack/congrats.php?crack=password';
		$arr["status"] = 1;	
	}else{
		$arr['error']='the password wasn\'t: ' .$encr .' please refresh the page and try again';
	}
	header('Content-Type: application/json');
	$json = json_encode($arr); // {"a":1,"b":2,"c":3,"d":4,"e":5}
	echo ($json);
	
	
	
?>