<section style="display:inline-block">
	<div>
   <div class="row col-md-8 col-md-offset-2 custyle" style="width:700px">
    <table class="table table-striped custab">
    <thead>
<div class="center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block" onclick="$('#Nit').val('');$('#name').val('');$('#create')val('');">+ Agregar proveedor</button></div>
        <tr>
            <th>Nit</th>
            <th>Nombre</th>
	    <th>Barrio</th>
	    <th>Ingreso</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
<?php
		$query = "SELECT p.Nit as Nit, p.nombre as nombre, b.codbar as codbar, b.nombre as barrio, p.fecha_ing as ingreso FROM proveedor AS p LEFT JOIN barrios as b on b.codbar = p.barrio";
	      	$result = mysqli_query($db, $query);
		
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['Nit']."</td>";
			echo "<td>".$row['nombre']."</td>";
			echo "<td>".$row['barrio']."</td>";
			echo "<td>".$row['ingreso']."</td>";
			echo "<td class='text-center'><a class='btn btn-info btn-xs' data-toggle='modal' data-target='#squarespaceModal'  onclick='$(\"#Nit\").val(".$row['Nit'].");$(\"#name\").val(\"".$row['nombre']."\");$(\"#barrio\").val(".$row['codbar'].");$(\"#fecha_ingreso\").val(\"".$row['ingreso']."\");$(\"#create\").val(\"false\");'><span class='glyphicon glyphicon-edit'></span> Editar</a> <a href='proveedor.php?Nit=".$row['Nit']."' class='btn btn-danger btn-xs' onclick='return confirm(\"&iquest;Desea eliminar este elemento&#63;\")'><span class='glyphicon glyphicon-remove'></span> Eliminar</a></td>";
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
			<h3 class="modal-title" id="lineModalLabel">Proveedor</h3>
		</div>
		<div class="modal-body">

            <!-- content goes here -->
			<form action="" method="post">	
				<div class="form-group">
					<label for="Nit">Nit</label>
					<input type="number" class="form-control" id="Nit" name="Nit">
				</div>
				<div class="form-group">
					<input type="hidden" id="create" name="create">
					<label for="name">Nombre</label>
					<input type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="municipio">Barrio</label>
					<select class="form-control" style="height:34px"  name="barrio" id="barrio">
						<?php
							$query = "SELECT * FROM barrios";
							$result = mysqli_query($db, $query);
							
							while($row = mysqli_fetch_array($result)) {
								echo "<option value=".$row['codbar'].">".$row['nombre']."</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="fecha_ingreso">Ingreso</label>
					<input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" max="<?php echo date("Y-m-d") ?>">
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
