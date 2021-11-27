<section style="display:inline-block">
	<div>
   <div class="row col-md-8 col-md-offset-2 custyle" style="width:700px">
<div>Mostrar el promedio de lo facturado de los últimos 3 años, para sólo aquellas facturas cuyo valor total facturado sea mayor de $50.000 y cuya cantidad de productos comprados sea mayor a 3.

</div>
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Promedio</th>
        </tr>
    </thead>
<?php
		$query = 'SELECT AVG(p2.valor_unit * d2.cantidad) as promedio FROM factura as f2 INNER JOIN detalle as d2 on d2.factura = f2.factura INNER JOIN producto as p2 on p2.codpro = d2.producto WHERE f2.factura IN (SELECT f1.factura FROM factura as f1 INNER JOIN detalle as d1 on d1.factura = f1.factura INNER JOIN producto as p1 on p1.codpro = d1.producto WHERE year(f1.fecha) > (year(CURRENT_DATE) - 3 ) GROUP BY f1.factura HAVING sum(d1.cantidad * p1.valor_unit) > 50000 AND count(*) > 3) 
';
	      	$result = mysqli_query($db, $query);
		
		
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
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
