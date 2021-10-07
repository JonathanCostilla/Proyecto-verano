<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']) {
        $searchdelete = $user->search("distribucion", "salon =".$_GET['inf']);
        if($searchdelete){
            echo "<script type='text/javascript'>alert('No se puede ELIMINAR, porque esta en uso, vaya a la opción Distribución y cambielo luego vuelva a intentar.');</script>";
            echo "<script> window.location.href = '../../menu/salon.php?page=1'</script>";
        }
        $resultado=$user->delete("salon", "id_salon = ".$_GET['inf']);
        if ($resultado) {
            echo "<script type='text/javascript'>alert('Se ha eliminado con exito');</script>";
            header("Location: ../../menu/salon.php?page=1");
        } else {
            echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
            header("Location: ../../menu/salon.php?page=1");
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/salon.php?page=1');
}else
if(isset($_POST['edit'])){
    $salon = $_POST['salon'];
    $capacidad = $_POST['capacidad'];
    $ubicacion = $_POST['ubicacion'];
    $idedit = $_SESSION['idsalon'];
    $busqueda=$user->search("salon","id_salon = '$idedit'");
    foreach ($busqueda as $busq) {
        if ($salon == null) {
            $salon = $busq['nombre_salon'];
        }
        if ($capacidad == null){
            $capacidad = $busq['capacidad'];
        }if ($ubicacion == null) {
            $ubicacion = $busq['ubicacion'];
        }
    }   
    $resultado=$user->update("salon","nombre_salon = '$salon', capacidad = '$capacidad', ubicacion = '$ubicacion'","id_salon = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        echo "<script> window.location.href = '../../menu/salon.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Ha ocurrido un error, por favor vuelva a intentar');</script>";
        echo "<script> window.location.href = '../../menu/salon.php?page=1'</script>";
    }
}
if(isset($_POST['add'])){
    $salon = $_POST['addnombresalon'];
    $capacidad = $_POST['addcapacidad'];
    $ubicacion = $_POST['addubicacion'];
    $resultado=$user->insert("salon", "'$salon', '$capacidad', '$ubicacion'");
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha ingresado con exito');</script>";
        echo "<script> window.location.href = '../../menu/salon.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('No se ha podido ingresar');</script>";
        echo "<script> window.location.href = '../../menu/salon.php?page=1'</script>";
    }
}
?>