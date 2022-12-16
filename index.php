<?php include("db.php")?>
<?php include("includes/header.php")?>
<?php include("includes/navbar.php")?>
<div class="p-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body">
                <form action="save.php" method="POST" >
                    <h4>Registro de nuevos usuarios</h4><br>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nombre completo" autocomplete="off" autofocus required><br>
                    </div>

                    <div class="form-group">
                        <input type="number" name="year" class="form-control" placeholder="Edad" autocomplete="off" required><br>
                    </div>

                    <div class="form-group">
                        <input type="number" name="telephone" class="form-control" placeholder="Numero de teléfono" autocomplete="off" required><br>
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Correo electronico" autocomplete="off" required><br>
                    </div>

                    <div class="form-group">
                        <label for="select">Escoge un marca de tu interes</label><br>
                        <select name="car" id="car">
                            <option value="0">Selecciona una opcion</option>
                            <option value="Honda">Honda</option>
                            <option value="KIA">KIA</option>
                            <option value="Ford">Ford</option>
                            <option value="Nissan">Nissan</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group" id="modelo"></div>
                    <br>
                    <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-success" name="registrar" value="Registrar">
                    </div>
                </form>
            </div><br/>
            <?php if(isset($_SESSION['mensaje'])){?>
                    <div class="alert alert-<?= $_SESSION['mensaje_color'];?> alert-dismissible fade show" role="alert">
                    <div>
                        <?= $_SESSION['mensaje']?>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();} ?>
        </div>
                <div class="col-md-8 table-dark">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th class="table-dark">ID</th>
                                <th class="table-dark">Nombre</th>
                                <th class="table-dark">Edad</th>
                                <th class="table-dark">Telefono</th>
                                <th class="table-dark">Correo</th>
                                <th class="table-dark">Auto</th>
                                <th class="table-dark">Modelo</th>
                                <th class="table-dark">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM Clientes";
                            $ver_clientes = mysqli_query($conexion, $query);

                            while($row=mysqli_fetch_array($ver_clientes)){ ?>
                                <tr>
                                    <td class="table-dark"><?php echo $row['ID']?></td>
                                    <td class="table-dark"><?php echo $row['Name']?></td>
                                    <td class="table-dark"><?php echo $row['Years']?></td>
                                    <td class="table-dark"><?php echo $row['Telephone_Number']?></td>
                                    <td class="table-dark"><?php echo $row['Email']?></td>
                                    <td class="table-dark"><?php echo $row['Car']?></td>
                                    <td class="table-dark"><?php echo $row['Car_model']?></td>
                                    <td>
                                        <a href="update.php?ID=<?php echo $row['ID']?>" class="btn btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>&nbsp
                                        <a href="delete.php?ID=<?php echo $row['ID']?>" class="btn btn-danger">
                                            <i class="bi bi-person-x-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        recargarLista();
        $('#car').change(function(){
            recargarLista();
        });
        })
</script>
<script type="text/javascript">
    function recargarLista(){
        $.ajax({
            type:"POST",
            url:"datos.php",
            data:"marca=" + $('#car').val(),
            success:function(r){
                $('#modelo').html(r);
            }
        });
    }
</script>
<?php include("includes/footer.php")?>
