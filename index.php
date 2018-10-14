<!DOCTYPE html>
<html>
<head>
	<title>Exam</title>
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link href="assets/plugins/select2/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/index.css?<?php echo rand(100, 999999); ?>">
	<meta charset=utf-8>
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<script src="assets/plugins/jquery-3.3.1.min.js"></script>
	

</head>
<body style="background: #eee">
	<?php
		session_start();
	    require_once('lib.php');
		require_once('config.php');

		$page = trim(@$_REQUEST['page']);

				// $products = json_decode($_COOKIE['products']); //lib::object2array(json_decode($_COOKIE['products']), true));

	?>
	<?php if (!in_array($page, ['login']) && $page): ?>
		<?php require_once('alert.php') ?>
		<?php  require_once("$page.php") ?>		
	<?php else: ?>
		<div class="login">
			<?php require_once('alert.php') ?>
			<?php
				require_once((@$page ?: 'login') . '.php');

				$method = trim(@$_REQUEST['method']);
				if ($method) {
					$class = new Loginfrm($link);
					if (method_exists($class, $method)) {
						call_user_func_array([
							$class, 
							$method
						], $_REQUEST);
					} else {
						header('HTTP/1.0 404 Not Found');
					}
				}			
			?>
		</div>
	<?php endif ?>
			<!-- <?php foreach ($products as $id => $p): ?>
				<div class="product-item"><?php echo $p->name ?></div>
			<?php endforeach ?> -->

    <script src="assets/plugins/jquery-cookie-master/src/jquery.cookie.js"></script>
	<script src="assets/plugins/popper.min.js" ></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootbox.min.js"></script>
	<script src="assets/fonts/font-awesome/js/all.js"></script>	
	<script src="assets/plugins/select2/select2.min.js"></script>
	<script src="assets/index.js"></script>
</body>

</html>