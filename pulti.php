<?php
	ob_start();
	include('session.php');
	$title = 'Consulta 3';
	$childView = 'views/_pulti.php';
	$user = $login_session;
	include('views/layout.php');

?>
