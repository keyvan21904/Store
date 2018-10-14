<?php
	$host = '127.0.0.1';
	$dbname = 'school_db';
	$user = 'root';
	$pass = '';
	$link = mysqli_connect($host, $user, $pass, $dbname);

	 mysqli_set_charset($link, 'utf8');
	if (!$link) {
	    echo 'Error: Unable to connect to MySQL.' . PHP_EOL;
	    echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;
	    exit;
	}