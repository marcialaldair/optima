<?php
include("db.php");
if(isset($_POST['registrar'])){
    $Name = $_POST['name'];
    $Years = $_POST['year'];
    $Telephone = $_POST['telephone'];
    $Email = $_POST['email'];
    $Car = $_POST['car'];
    $Car_Model = $_POST['car_model'];
    $query = "INSERT INTO Clientes(Name, Years, Telephone_Number, Email, Car, Car_model) VALUES ('$Name', '$Years', '$Telephone', '$Email', '$Car', '$Car_Model')";
    $result = mysqli_query($conexion, $query);
    if(!$result){
        die("Error al insertar");
    }
    $_SESSION['mensaje'] = 'Cliente registrado';
    $_SESSION['mensaje_color'] = 'success';
    header("Location: index.php");
}
?>

