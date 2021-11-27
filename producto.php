<?php
	ob_start();
	include('session.php');
	$title = 'Municipios';
	$childView = 'views/_producto.php';
	$user = $login_session;
	include('views/layout.php');
	if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
		if( $_POST['codpro'] ){
			$codpro = $_POST['codpro'];
			$producto = $_POST['name'];
			$cantidad = $_POST['cantidad'];
			$proveedor = $_POST['proveedor'];
			$valor = $_POST['valor'];

			$update = "UPDATE producto SET producto = '$name',cant_inventario = '$cantidad', proveedor='$proveedor', valor_unit='$valor' WHERE producto.codpro = '$codpro'";
			$result = mysqli_query($db, $update);

			header('location:producto.php');
			die();
		} else {

			$producto = mysqli_real_escape_string($db, $_POST['name']);
			$cantidad = mysqli_real_escape_string($db, $_POST['cantidad'];
			$proveedor = $_POST['proveedor'];
			$valor = $_POST['valor'];

			$query  = "SELECT p.producto FROM producto as p WHERE p.producto LIKE '$producto'";
			$result = mysqli_query($db, $query);

			$count = mysqli_num_rows($result);

			if( count == 1 ) {
				$error = "Existe un producto con este nombre";
				echo $error;
			} else {
			
				$insert = "INSERT INTO producto (producto, cant_inventario, proveedor, valor_unit) VALUES ('$name', '$cantidad','$proveedor', '$valor')";
				$insert_result = mysqli_query($db, $insert);

				header('location:producto.php');
				die();
			}
		}
	} else if( $_SERVER["REQUEST_METHOD"] == "GET" ) {
		if( isset($_GET['codpro']) ) {
			$codpro = $_GET['codpro'];
			$delete = "DELETE FROM producto WHERE codpro = '$codpro'";
			$delete_result = mysqli_query($db, $delete);
			if( $delete_result ) {
				header('location:producto.php');
				die();
			}
		}
	}

?>
