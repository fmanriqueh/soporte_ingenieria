<?php
	ob_start();
	include('session.php');
	$title = 'Consulta 2';
	$childView = 'views/_pproducto.php';
	$user = $login_session;
	include('views/layout.php');

?>
