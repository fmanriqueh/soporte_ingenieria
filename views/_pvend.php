<section style="display:inline-block">
	<div>
   <div class="row col-md-8 col-md-offset-2 custyle" style="width:700px">
<div>Mostrar el promedio de ventas (valor total facturado)  por proveedor. Para aquellos proveedores pertenecientes a los municipios con más de 3 barrios.

</div>
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Proveedor</th>
	    <th>Promedio</th>
        </tr>
    </thead>
<?php
		$query = 'SELECT p1.nombre as nombre, AVG(d1.cantidad * p2.valor_unit) as promedio FROM proveedor as p1 INNER JOIN factura as f1 on f1.proveedor = p1.Nit INNER JOIN detalle as d1 on d1.factura = f1.factura INNER JOIN producto as p2 on p2.codpro = d1.producto WHERE p1.barrio IN (SELECT b1.codbar FROM barrios as b1 WHERE b1.municipio IN (SELECT m1.codmun FROM municipio as m1 INNER JOIN barrios as b2 on b2.municipio = m1.codmun GROUP BY m1.codmun HAVING count(*) > 3) ) ';
	      	$result = mysqli_query($db, $query);
		
		
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['nombre']."</td>";
			echo "<td>".$row['promedio']."</td>";
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
