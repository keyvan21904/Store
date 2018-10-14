<?php 
if ($_POST) {
	$username = strtolower(mysqli_real_escape_string($link,$_POST['username']));
	$password = sha1(mysqli_real_escape_string($link,$_POST['password']));
	$email = mysqli_real_escape_string($link,$_POST['email']);

	// check username exists
	$sql = "SELECT id FROM users WHERE username = '$username'";
	$result = mysqli_query($link, $sql);
	$count = mysqli_num_rows($result);

	if( $count == 1) {
		header('location: index.php?page=register&error=username');
	}

	$sql = "INSERT INTO users (username, password,email) values ('$username','$password','$email')";
	mysqli_query($link,$sql);

	header('location: index.php?page=register&success=register');
}
?>
<form method="POST">
	<label for="username">username</label>
	<input type="text" name="username" placeholder="Username" required autofocus><br>
	<label for="password">Password</label>
	<input type="password" name="password" id="inputPassword" placeholder="Password" required><br>
	<label for="email"> Email  </label> 
	<input type="email" name="email" id="inputPassword" placeholder="Example:a@yahoo.com" required style="margin-left: 23px;"><b>
	<button type="submit" class="btn btn-danger">save</button>
	<div>اگر ثبت نام کردید برای ورود 
		<a href="index.php?page=login">اینجا</a>
	لیک کنید</div>
</form>