<section style="display:inline-block">
	<div>
   <div class="row col-md-8 col-md-offset-2 custyle" style="width:700px">
	<div>Mostrar la cantidad de proveedores por barrios (nombre), distinguiendo el municipio, para aquellos proveedores que tienen más de 5 facturas y que contengan por lo menos 2 productos con el valor unitario mayor a $50.000.
</div>
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Municipio</th>
            <th>Barrio</th>
	    <th>Proveedores</th>
        </tr>
    </thead>
<?php
		$query = "SELECT m1.nombre as municipio, b1.nombre as barrio, count(DISTINCT p1.Nit) as proveedores FROM municipio as m1 INNER JOIN barrios as b1 on b1.municipio = m1.codmun INNER JOIN proveedor as p1 on p1.barrio = b1.codbar INNER JOIN factura as f1 on f1.proveedor = p1.Nit WHERE f1.factura in ( SELECT f2.factura FROM factura as f2 INNER JOIN detalle as d1 on d1.factura = f2.factura INNER JOIN producto as p2 on p2.codpro = d1.producto WHERE p2.valor_unit > 50000 GROUP BY f2.factura HAVING count(*) > 1) GROUP BY m1.nombre, b1.nombre HAVING COUNT(f1.factura) > 5
";
	      	$result = mysqli_query($db, $query);
		
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['municipio']."</td>";
			echo "<td>".$row['barrio']."</td>";
			echo "<td>".$row['proveedores']."</td>";
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
