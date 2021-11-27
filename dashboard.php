<?php
	include('session.php');
	$title = 'Inicio';
	$childView = 'views/_dashboard.php';
	$user = $login_session;
	include('views/layout.php');

?>
