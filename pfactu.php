<?php
	ob_start();
	include('session.php');
	$title = 'Consulta 4';
	$childView = 'views/_pfactu.php';
	$user = $login_session;
	include('views/layout.php');

?>
