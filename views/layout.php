<html>
	<head>
		<title><?php echo $title; ?></title>
		<!-- main JavaScript file -->
		<script src="../project.js"></script>

		<!-- main CSS file -->
		<link rel="stylesheet" href="../styles.css">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<!--===================
        Header
        =======================-->
      <div class="main" style="display:inline-block">
        <aside>
          <div style="height:100vh;" class="sidebar left ">
            <div class="user-panel">
              <div class="pull-left image">
                <img src="https://images.unsplash.com/photo-1546146830-2cca9512c68e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1480&q=80" class="rounded-circle" alt="User Image">
              </div>
              <div class="pull-left info">
	        <p><?php echo $user; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
            <ul class="list-sidebar bg-defoult">
              <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label">Informes</span> <span class="fa fa-chevron-left pull-right"></span> </a>
                <ul class="sub-menu collapse" id="dashboard">
                  <li><a href="pbarrio.php">Proveedores por barrio</a></li>
                  <li><a href="pproducto.php">Proveedores por producto</a></li>
                  <li><a href="pulti.php">Promedio de ultimos 3 anos</a></li>
                  <li><a href="pfactu.php">Proveedores con mas de 30 facturas</a></li>
                  <li><a href="pvend.php">Promedio de ventas por proveedor</a></li>
                </ul>
              </li>
              <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active" ><i class="fa fa-table"></i> <span class="nav-label">Direccion</span><span class="fa fa-chevron-left pull-right"></span></a>
                <ul  class="sub-menu collapse" id="tables" >
                  <li><a href="barrio.php"> Barrios</a></li>
                  <li><a href="municipio.php"> Municipios</a></li>
                </ul>
              </li>
	      <li> <a href="proveedor.php"><i class="fa fa-user"></i> <span class="nav-label">Proveedores</span> </a></li>
	      <li> <a href="producto.php"><i class="fa fa-product-hunt"></i> <span class="nav-label">Productos</span> </a></li>
	      <li> <a href="factura.php"><i class="fa fa-file"></i> <span class="nav-label">Facturas</span> </a></li>
              <li> <a href="logout.php"><i class="fa fa-sign-out"></i> <span class="nav-label">Salir</span> </a></li>
            </ul>
          </div>
        </aside>
      </div>
		<?php include($childView); ?>
	</body>
</html>
