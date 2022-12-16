<?php
include("db.php");
$marca=$_POST['marca'];
$model=$_POST['model'];

$sql="SELECT * FROM Modelos WHERE Marca = '$marca' ";
$result = mysqli_query($conexion,$sql);

$cadena="<label>Selecciona un modelo</label><br>
            <select id='modelo' name='car_model'>";

while($ver=mysqli_fetch_row($result)){
        $cadena=$cadena.'<option selected=true value='.$ver[1].'>'.utf8_decode($ver[1]).'</option>';
}
echo $cadena."</select>"
?>