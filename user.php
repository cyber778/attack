<?php 

$user = $_POST["user"];
$arr = FALSE;
$fh = fopen('C:\xampp\deny\users.txt','r');
$arr = array('status'=> 0 );
while ($line = fgets($fh)) {
	// <... Do your work with the line ...>
	if(trim($line)==$user){
		$arr['url_response'] = '/attack/congrats.php?crack=username';
		$arr["status"] = 1;	
		break;
	}
}
fclose($fh);
 

//$arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);

if(!$arr["status"]){
	$arr['error']='there is no user name with that email in file: localhost:8080/xampp/deny/users.txt !';	
}
header('Content-Type: application/json');
$json = json_encode($arr); // {"a":1,"b":2,"c":3,"d":4,"e":5}
echo ($json);

?>

