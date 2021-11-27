<section style="display:inline-block">
	<div>
   <div class="row col-md-8 col-md-offset-2 custyle" style="width:700px">
    <table class="table table-striped custab">
    <thead>
<div class="center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block" onclick="$('#codmun').val('');$('#name').val('');">+ Agregar municpio</button></div>
        <tr>
            <th>C&oacute;digo</th>
            <th>Nombre</th>
	    <th>Cantidad</th>
	    <th>Proveedor</th>
	    <th>Valor</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
<?php
		$query = "SELECT * FROM producto";
	      	$result = mysqli_query($db, $query);
		
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['codpro']."</td>";
			echo "<td>".$row['producto']."</td>";
			echo "<td>".$row['cant_inventario']."</td>";
			echo "<td>".$row['proveedor']."</td>";
			echo "<td>".$row['valor_unit']."</td>";
			echo "<td class='text-center'><a class='btn btn-info btn-xs' data-toggle='modal' data-target='#squarespaceModal'  onclick='$(\"#codpro\").val(".$row['codpro'].");$(\"#name\").val(".$row['producto'].");$(\"#cantidad\").val(".$row['cant_inventario'].";$(\"#proveedor\").val(".$row['proveedor'].");$(\"#valor\").val(".$row['valor_unit'].");'><span class='glyphicon glyphicon-edit'></span> Editar</a> <a href='municipio.php?codmun=".$row['codmun']."' class='btn btn-danger btn-xs' onclick='return confirm(\"&iquest;Desea eliminar este elemento&#63;\")'><span class='glyphicon glyphicon-remove'></span> Eliminar</a></td>";
			echo "</tr>";
		}	
?>
    </table>
    </div>
<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title" id="lineModalLabel">Municipio</h3>
		</div>
		<div class="modal-body">

            <!-- content goes here -->
			<form action="" method="post">	
				<div class="form-group">
					<input type="hidden" id="codpro" name="codpro">
					<label for="name">Nombre</label>
					<input type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="cant_inventario">Cantidad</label>
					<input type="number" class="form-control" id="cantidad" name="cantidad">
				</div>
				<div class="form-group">
					<label for="proveedor">Proveedor</label>
					<input type="text" class="form-control" id="proveedor" name="proveedor">
				</div>
				<div class="form-group">
					<label for="valor">Valor</label>
					<input type="number" class="form-control" id="valor" name="valor">
				</div>
				<button type="submit" class="btn btn-default">Guardar</button>
		<!--
		<div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Check me out
                </label>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
	-->
            </form>

		</div>
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Salir</button>
				</div>
				<!--
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
				</div>
				-->
			</div>
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
