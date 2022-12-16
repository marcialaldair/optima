<?php
include("db.php");

    if(isset($_GET['ID'])) {
        $ID = $_GET['ID'];
        $query = "DELETE FROM Clientes WHERE ID=$ID";
        $result=mysqli_query($conexion,$query);
        if(!$result){
            die("Fallo la eliminación");
        }
        $_SESSION['mensaje'] = 'Cliente eliminado';
        $_SESSION['mensaje_color'] = 'danger';
        header("Location: index.php");
    }
?>
