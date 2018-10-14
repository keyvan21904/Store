<?php
	class Loginfrm {
		public  function __construct($db) {
			$this->db = $db;
			$this->username = mysqli_real_escape_string($this->db, $_POST['username']);
			$this->password = sha1(mysqli_real_escape_string($this->db, $_POST['password']));
			$this->email = mysqli_real_escape_string($this->db,$_POST['email']);
		}
		
		public function loginForm() {
			
			$sql = "SELECT * FROM users WHERE username = '{$this->username}' and password = '{$this->password}'";
			$result = mysqli_query($this->db,$sql);
			$count = mysqli_num_rows($result);
			$row=mysqli_fetch_assoc($result);

			if( $count == 1) {
				
				$_SESSION['username']=$this->username;
				$_SESSION['email']=$row['email'];
				header("location:index.php?page=welcome");

			} else {
				header("location:index.php?error=usernameInvalid");		
			}
		}

		public function logout() 
		{
			$_SESSION['username'] = '';
			header("location:index.php");
		}
  }


?>

<form action="index.php?method=loginForm" method="POST">
	
	<p>Login</p>
	<label for="inputPassword">username</label>
	<input type="text" name="username" placeholder="Username" required autofocus style="background: #a7a7a7;"><br>
	<label for="inputPassword">Password</label>
	<input type="password" name="password" id="inputPassword" placeholder="Password" required><br>
	<button type="submit" class="btn btn-danger">Login</button><br><br>
	<div>اگر ثبت نام نکرده اید 
		<a href="index.php?page=register">اینجا</a>
	کیک کنید	</div>

</form>