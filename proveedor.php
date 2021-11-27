<?php
	ob_start();
	include('session.php');
	$title = 'Proveedores';
	$childView = 'views/_proveedor.php';
	$user = $login_session;
	include('views/layout.php');
	if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
		if( $_POST['create'] ){
			$nit = $_POST['Nit'];
			$name = $_POST['name'];
			$barrio = $_POST['barrio'];
			$fecha_ingreso = $_POST['fecha_ingreso'];

			$update = "UPDATE proveedor SET nombre = '$name', barrio= '$barrio', fecha_ing = '$fecha_ingreso' WHERE proveedor.Nit = '$nit'";
			$result = mysqli_query($db, $update);

			header('location:proveedor.php');
			die();
		} else {
			$nit = mysqli_real_escape_string($db, $_POST['Nit']);
			$name = mysqli_real_escape_string($db, $_POST['name']);
			$barrio = mysqli_real_escape_string($db, $_POST['barrio']);
			$fecha_ingreso = mysqli_real_escape_string($db, $_POST['fecha_ingreso']);

			$query  = "SELECT * FROM proveedor as p WHERE p.Nit = '$nit'";
			$result = mysqli_query($db, $query);

			$count = mysqli_num_rows($result);

			if( count == 1 ) {
				$error = "Existe un proveedor con este nit";
				echo $error;
			} else {
			
				$insert = "INSERT INTO  proveedor (Nit, nombre, barrio, fecha_ing) VALUES ('$nit', '$name', '$barrio', '$fecha_ingreso')";
				$insert_result = mysqli_query($db, $insert);

				header('location:proveedor.php');
				die();
			}
		}
	} else if( $_SERVER["REQUEST_METHOD"] == "GET" ) {
		if( isset($_GET['Nit']) ) {
			$nit = $_GET['Nit'];
			$delete = "DELETE FROM proveedor WHERE Nit = '$nit'";
			$delete_result = mysqli_query($db, $delete);
			if( $delete_result ) {
				header('location:proveedor.php');
				die();
			}
		}
	}

?>
