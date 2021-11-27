<?php
	ob_start();
	include('session.php');
	$title = 'Municipios';
	$childView = 'views/_municipio.php';
	$user = $login_session;
	include('views/layout.php');
	if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
		if( $_POST['codmun'] ){
			$codmun = $_POST['codmun'];
			$name = $_POST['name'];

			$update = "UPDATE municipio SET nombre = '$name' WHERE municipio.codmun = '$codmun'";
			$result = mysqli_query($db, $update);

			header('location:municipio.php');
			die();
		} else {

			$name = mysqli_real_escape_string($db, $_POST['name']);

			$query  = "SELECT m.nombre FROM municipio as m WHERE m.nombre LIKE '$name'";
			$result = mysqli_query($db, $query);

			$count = mysqli_num_rows($result);

			if( count == 1 ) {
				$error = "Existe un municipio con este nombre";
				echo $error;
			} else {
			
				$insert = "INSERT INTO municipio (nombre) VALUES ('$name')";
				$insert_result = mysqli_query($db, $insert);

				header('location:municipio.php');
				die();
			}
		}
	} else if( $_SERVER["REQUEST_METHOD"] == "GET" ) {
		if( isset($_GET['codmun']) ) {
			$codmun = $_GET['codmun'];
			$delete = "DELETE FROM municipio WHERE codmun = '$codmun'";
			$delete_result = mysqli_query($db, $delete);
			if( $delete_result ) {
				header('location:municipio.php');
				die();
			}
		}
	}

?>
