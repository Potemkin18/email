<!doctype>
<html>
	<head>
		<title>Проект</title>
	</head>
	<body>	
		<style>
			.nik
		</style>
	<?php 
	
	function startup() {

		$hostname = 'localhost';
		$username = 'root';
		$password = '';
		$dbName = 'email';
		
		mysql_connect($hostname, $username, $password) or die('No connect');
		mysql_select_db($dbName) or die('No data base');
	}
	
	function send_message($email) {
		$email = trim($email);	
		
		if (!preg_match("/^(([a-zA-Z0-9_\-.]+)@([a-zA-Z0-9\-]+)\.[a-zA-Z0-9\-.]+$)/", $email)) 
			return ('не корретный email');
		
		//$date = date('l jS \of F Y h:i:s A');
		$ip = $_SERVER["REMOTE_ADDR"];
		$sql = "INSERT INTO users (email, ip) VALUES ('$email', '$ip')";
		$result = mysql_query($sql);

		if (!$result)
			die(mysql_error());
	}
	
	print_r($_REQUEST);
	
	
	$email = $_POST['email'];

	
	startup();
	$responce = send_message($email);
	echo $responce;
	?>
	
		<form action="" method="POST">
			<input name="email"  class="nik" type="text">
			<input name="add" type="submit" value="Отправить">
		</form>
	</body>
</html>