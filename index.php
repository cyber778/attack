<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<!-- General meta information -->
	<title>Login Form</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta charset="utf-8" />
	<!-- // General meta information -->
	
	
	<!-- Load Javascript -->
	<script type="text/javascript" src="./js/jquery.js"></script>
	<!-- // Load Javascipt -->

	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="css/style.css" media="screen" />
	<!-- // Load stylesheets -->
	
<script>


	$(document).ready(function(){
 
	$("#submit1").hover(
	function() {
	$(this).animate({"opacity": "0"}, "slow");
	},
	function() {
	$(this).animate({"opacity": "1"}, "slow");
	});
 	});


</script>
	
</head>
<body>
<?php 
	//generate random string
	$characters = '789abcdefghijklmnopqrstABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < 4; $i++) {
	    $randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
?>
	<div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle">

			<h2>Login</h2>

			<div id="username_input">

				<div id="username_inputleft"></div>

				<div id="username_inputmiddle">
				<form>
					<input type="text" name="link" id="url" placeholder="E-mail Address / Username">
					<img id="url_user" src="./images/mailicon.png" alt="">
				</form>
				</div>

				<div id="username_inputright"></div>

			</div>

			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
				<form>
					<input class="pass" type="text" name="link" id="url" placeholder="Password = <?php echo $randomString; ?>">
					<input class="phrase" name="phrase" type="hidden" value="<?php echo $randomString; ?>" />
					<img id="url_password" src="./images/passicon.png" alt="">
				</form>
				</div>

				<div id="password_inputright"></div>

			</div>
			<div id="security_code_input">

				<div id="security_inputleft"></div>

				<div id="security_inputmiddle">
				<form>
					<input type="text" name="security" id="security" placeholder="Security Code">
					<img style="top: 15px;left: 16px;position: absolute;"id="url_security" src="./images/passicon.png" alt="">
				</form>
				</div>

				<div id="security_inputright"></div>

			</div>

			<div id="submit">
				<form>
				<img type="image" src="./images/submit_hover.png" id="submit1" value="Sign In">
				<img type="image" src="./images/submit.png" id="submit2" value="Sign In">
				</form>
			</div>

		</div>
		
		<div id="wrapperbottom"></div>
		<div class="load-wrap hide"><div class="loader"></div></div>
		<div class="alert-box hide error"><span>error: </span><span id="error"></span> </div>
	</div>
	<div class="txt-form">
		<p style="font-size: 20px;text-align: center;">
			If you don't have a valid email please write below and it will be saved in a txt file, we will try to contact you... <br />
			to view the txt file please go to: localhost:8080/attack/comment.php<br/>
			<span style="font-size: 16px; color:red;">*this txt will be rendered in an inlude(your_text_file).<br/>
			*please note that every time you submit the file will be overwritten.</span>
		</p>
		<form action="" style="text-align: center;" method="post" class="comment">
			<textarea name="comment" style="text-align: center; width: 500px; height: 200px;"></textarea><br/>
			<button type="submit">Submit!</button>
		</form>
	</div>
	
	<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$content = $_POST['comment'];
		$file = 'comment.txt';
		// Open the file to get existing content
		$current = file_get_contents($file);
		// Append a new person to the file
		$current = $content;
		// Write the contents back to the file
		file_put_contents($file, $current);
		echo "<h1 style='color:green; font-size:30px; text-align:center'>Success</h1>";
	} ?>
	
<script src="js/script.js"></script>
</body>
</html>