<?php
include("db.php");
include("includes/navbar.php");
    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];
        $query = "SELECT * FROM Clientes WHERE ID = $ID";
        $result = mysqli_query($conexion, $query);
            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result);
                $Name = $row['Name'];
                $Years = $row['Years'];
                $Telephone = $row['Telephone_Number'];
                $Email = $row['Email'];
                $Car = $row['Car'];
                $Car_Model = $row['Car_model'];
            }
        }
        if(isset($_POST['update'])){
            $ID = $_GET['ID'];
            $Name = $_POST['name'];
            $Years = $_POST['year'];
            $Telephone = $_POST['telephone'];
            $Email = $_POST['email'];
            $Car = $_POST['car'];
            $Car_Model = $_POST['car_model'];

            $query = "UPDATE Clientes set Name = '$Name', Years = '$Years', Telephone_Number = '$Telephone', Email = '$Email', Car = '$Car', Car_model = '$Car_Model' where id = $ID";
            mysqli_query($conexion,$query);
            $_SESSION['mensaje'] = 'Datos actualizados';
            $_SESSION['mensaje_color'] = 'warning';
            header("Location: index.php");
        }
?>

<?php include("includes/header.php")?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update.php?ID=<?php echo $_GET['ID'];?>" method="POST">
                    <h3><center>Actualización de datos</center></h3>
                    <div class="form-group">
                        <input type="text" name="name" value="<?php echo $Name;?>" class="form-control" placeholder="Actualiza el nombre"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" name="year" value="<?php echo $Years;?>" class="form-control" placeholder="Actualiza la edad"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" name="telephone" value="<?php echo $Telephone;?>" class="form-control" placeholder="Actualiza el telefono"><br>
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" value="<?php echo $Email;?>" class="form-control" placeholder="Actualiza el correo"><br>
                    </div>
                    <div class="form-group">
                        <label for="select">Escoge un marca de tu interes</label><br>
                        <select name="car" id="car">
                            <option value="0">Selecciona una opcion</option>
                            <option <?php if($Car == "Honda") echo "selected=true"?> value="Honda">Honda</option>
                            <option <?php if($Car == "KIA") echo "selected=true"?> value="KIA">KIA</option>
                            <option <?php if($Car == "Ford") echo "selected=true"?> value="Ford">Ford</option>
                            <option <?php if($Car == "Nissan") echo "selected=true"?> value="Nissan">Nissan</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group" id="modelo"></div>
                    <br>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
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