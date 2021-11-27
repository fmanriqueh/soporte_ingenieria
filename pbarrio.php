<?php
	ob_start();
	include('session.php');
	$title = 'Consulta 1';
	$childView = 'views/_pbarrio.php';
	$user = $login_session;
	include('views/layout.php');

?>
