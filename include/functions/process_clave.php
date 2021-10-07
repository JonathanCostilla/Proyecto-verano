<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']) {
        $searchdelete = $user->search("distribucion", "clavemateria =".$_GET['inf']);
        if($searchdelete){
            echo "<script type='text/javascript'>alert('No se puede ELIMINAR, porque esta en uso, vaya a la opción Distribución y cambielo luego vuelva a intentar.');</script>";
            echo "<script> window.location.href = '../../menu/clavedemateria.php?page=1'</script>";
        }
        $resultado=$user->delete("clavemateria", "id_clavemateria = ".$_GET['inf']);
        if ($resultado) {
            echo "<script type='text/javascript'>alert('Se ha eliminado con exito');</script>";
            header("Location: ../../menu/clavedemateria.php?page=1");
        } else {
            echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
            header("Location: ../../menu/clavedemateria.php?page=1");
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/clavedemateria.php?page=1');
}else
if(isset($_POST['edit'])){
    $clave = $_POST['clave'];
    $desc = $_POST['desc'];
    $idedit = $_SESSION['idclave'];
    $busqueda=$user->search("clavemateria","id_clavemateria = '$idedit'");
    foreach ($busqueda as $busq) {
        if ($clave == null) {
            $clave = $busq['nombre_clave'];
        } elseif ($desc == null) {
            $desc = $busq['descripcion'];
        }
    }   
    $resultado=$user->update("clavemateria","nombre_clave = '$clave', descripcion = '$desc'","id_clavemateria = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        echo "<script> window.location.href = '../../menu/clavedemateria.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Ha ocurrido un error, por favor vuelva a intentar');</script>";
        echo "<script> window.location.href = '../../menu/clavedemateria.php?page=1'</script>";
    }
}
if(isset($_POST['add'])){
    $clave = $_POST['addnombreclave'];
    $descripcion = $_POST['adddescripcion'];
    $resultado=$user->insert("clavemateria", "'$clave', '$descripcion'");
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha ingresado con exito');</script>";
        echo "<script> window.location.href = '../../menu/clavedemateria.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('No se ha podido ingresar');</script>";
        echo "<script> window.location.href = '../../menu/clavedemateria.php?page=1'</script>";
    }
}
?>