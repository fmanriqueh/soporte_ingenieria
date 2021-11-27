<section style="display:inline-block">
	<div>
   <div class="row col-md-8 col-md-offset-2 custyle" style="width:700px">
<div>Mostrar por cada producto la cantidad de proveedores y cantidad de municipios en los que se ha vendido.

</div>
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Proveedores</th>
	    <th>Municipios</th>
        </tr>
    </thead>
<?php
		$query = 'SELECT pr1.producto as producto, count(DISTINCT p1.Nit) as proveedores, count(DISTINCT m1.codmun) as municipios FROM producto as pr1 INNER JOIN  detalle as d1 on d1.producto = pr1.codpro INNER JOIN factura as f1 on f1.factura = d1.factura INNER JOIN proveedor as p1 on p1.Nit = f1.Nit INNER JOIN barrios as b1 on b1.codbar = p1.barrio INNER JOIN municipio as m1 on m1.codmun = b1.municipio GROUP BY pr1.producto
';
	      	$result = mysqli_query($db, $query);
		
		
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['producto']."</td>";
			echo "<td>".$row['proveedores']."</td>";
			echo "<td>".$row['municipios']."</td>";
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
