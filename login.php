<?php
$error       = '';
$salt        = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
if (isset($_POST["who"]) && isset($_POST["pass"])) {
	if ($_POST['who'] === '' || $_POST['pass'] === '') {
		$error = 'User name and password are required';
	} elseif (hash('md5', $salt.$_POST['pass']) == $stored_hash) {
		header("Location: game.php?name=".urlencode($_POST['who']));
	} else {
		$error = 'Incorrect password';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
</head>
<body>
<div class="container">
<br>
<h1>Please Log In</h1>
<?php if ($error) {echo '<p style="color: red;">'.$error.'<p>';
}

?>
<form method="POST">
	<label for="nam">User Name</label>
	<input class="form" type="text" name="who" id="nam"><br/>

	<label for="id_1723">Password</label>
	<input type="text" name="pass" id="id_1723"><br/>

	<input type="submit" value="Log In">

	<input type="submit" name="cancel" value="Cancel">
</form>
</div>
</body>
</html>