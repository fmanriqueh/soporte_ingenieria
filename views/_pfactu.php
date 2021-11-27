<section style="display:inline-block">
	<div>
   <div class="row col-md-8 col-md-offset-2 custyle" style="width:700px">
<div>Mostrar el nombre del proveedor, la cantidad de ventas (facturas), total facturado, de aquellos proveedores que tengan más de 30 facturas y cuyo total facturado sea mayor a $2.000.000, además que pertenezcan a los siguientes barrios (  1 tasajero, 4  centro, 7  San Luis,  9 San rafael).

</div>
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Facturas</th>
	    <th>Total</th>
        </tr>
    </thead>
<?php
		$query = 'SELECT p1.nombre as nombre, count(DISTINCT f1.factura) as facturas, sum(d1.cantidad * p2.valor_unit) as total_facturado FROM proveedor as p1 INNER JOIN factura as f1 on f1.proveedor = p1.Nit INNER JOIN detalle as d1 on d1.factura = f1.factura INNER JOIN producto as p2 on p2.codpro = d1.producto WHERE p1.Nit IN (SELECT p2.Nit FROM proveedor as p2 INNER JOIN factura as f2 on f2.proveedor = p2.Nit GROUP BY p2.Nit HAVING count(*) > 30)  AND p1.barrio IN (1,4,7,9)';

	      	$result = mysqli_query($db, $query);
		
		
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['nombre']."</td>";
			echo "<td>".$row['facturas']."</td>";
			echo "<td>".$row['total_facturado']."</td>";
			echo "</tr>";
		}	
?>
    </table>
    </div>
<!-- line modal -->
		</div>
	</div>
  </div>
</div>
</div>
	<style>
	.custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
.center {
    margin-top:50px;
}

.modal-header {
	padding-bottom: 5px;
}

.modal-footer {
    	padding: 0;
	}

.modal-footer .btn-group button {
	height:40px;
	border-top-left-radius : 0;
	border-top-right-radius : 0;
	border: none;
	border-right: 1px solid #ddd;
}

.modal-footer .btn-group:last-child > button {
	border-right: 0;
}
	</style>
</section>
