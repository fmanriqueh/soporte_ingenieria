<?php
	ob_start();
	include('session.php');
	$title = 'Consulta 5';
	$childView = 'views/_pvend.php';
	$user = $login_session;
	include('views/layout.php');

?>
