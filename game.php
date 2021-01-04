<?php
if (!isset($_GET['name'])) {
	die("Name parameter missing");
} elseif (isset($_POST['logout'])) {
	header('Location: index.php');
}
function check($com, $hum) {
	if ($hum === $com) {
		return "Tie";
	} elseif (($hum == '0' && $com == '2') ||
		($hum == '2' && $com == '1') ||
		($hum == '1' && $com == '0')) {
		return "You Win";
	}
	return "You Lose";
}

$rps     = ["Rock", "Paper", "Scissors"];
$message = 'Please select a strategy and press Play.';
$alerts  = ["Tie" => 'alert-secondary', "You Win" => "alert alert-success", "You Lose" => "alert alert-danger"];
$alert   = 'alert-dark';
if (isset($_POST['human'])) {
	if ($_POST['human'] != '-1' && $_POST['human'] != '3') {
		$rand    = strval(rand(0, 2));
		$chk     = check($rand, $_POST['human']);
		$alert   = $alerts[$chk];
		$message = "Your Play=".$rps[$_POST['human']]." Computer Play=".$rps[$rand]." Result=".$chk;
	} elseif ($_POST['human'] == '3') {
		$message = '';
		for ($c = 0; $c < 3; $c++) {
			for ($h = 0; $h < 3; $h++) {

				$r = check($c, $h);

				$message .= "Human=$rps[$h] Computer=$rps[$c] Result=$r<br>";

			}
		}}}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<br>
<h1>Rock Paper Scissors</h1>
<p>Welcome: <?=$_GET['name']?></p>
<form method="post">
<select class="custom-select"  name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<input type="submit" value="Play" class="btn btn-outline-secondary">
<input type="submit" name="logout" value="Logout" class="btn btn-outline-secondary">
</form>

<div class="alert <?=$alert?> "> <?=$message?></div>
</div>
</body>
</html>