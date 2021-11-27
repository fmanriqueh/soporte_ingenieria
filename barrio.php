<?php
	ob_start();
	include('session.php');
	$title = 'Barrios';
	$childView = 'views/_barrio.php';
	$user = $login_session;
	include('views/layout.php');
	if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
		if( $_POST['codbar'] ){
			$codbar = $_POST['codbar'];
			$name = $_POST['name'];
			$municipio = $_POST['municipio'];

			$update = "UPDATE barrios SET nombre = '$name', municipio = '$municipio' WHERE barrios.codbar = '$codbar'";
			$result = mysqli_query($db, $update);

			header('location:barrio.php');
			die();
		} else {
			$name = mysqli_real_escape_string($db, $_POST['name']);
			$municipio = mysqli_real_escape_string($db, $_POST['municipio']);

			$query  = "SELECT b.nombre FROM barrios as b WHERE b.nombre LIKE '$name'";
			$result = mysqli_query($db, $query);

			$count = mysqli_num_rows($result);

			if( count == 1 ) {
				$error = "Existe un barrio con este nombre";
				echo $error;
			} else {
			
				$insert = "INSERT INTO barrios (nombre, municipio) VALUES ('$name', '$municipio')";
				$insert_result = mysqli_query($db, $insert);

				header('location:barrio.php');
				die();
			}
		}
	} else if( $_SERVER["REQUEST_METHOD"] == "GET" ) {
		if( isset($_GET['codbar']) ) {
			$codbar = $_GET['codbar'];
			$delete = "DELETE FROM barrios WHERE codbar = '$codbar'";
			$delete_result = mysqli_query($db, $delete);
			if( $delete_result ) {
				header('location:barrio.php');
				die();
			}
		}
	}

?>
