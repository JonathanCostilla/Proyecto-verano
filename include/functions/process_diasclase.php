<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']) {
        $searchdelete = $user->search("distribucion", "dia =".$_GET['inf']);
        if($searchdelete){
            echo "<script type='text/javascript'>alert('No se puede ELIMINAR, porque esta en uso, vaya a la opción Distribución y cambielo luego vuelva a intentar.');</script>";
            echo "<script> window.location.href = '../../menu/diasclase.php?page=1'</script>";
        }
        else{
            $resultado=$user->delete("dia", "id_dia = ".$_GET['inf']);
            if ($resultado) {
                echo "<script type='text/javascript'>alert('Se ha eliminado con exito');</script>";
                echo "<script> window.location.href = '../../menu/diasclase.php?page=1'</script>";
            } else {
                echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
                echo "<script> window.location.href = '../../menu/diasclase.php?page=1'</script>";
            }
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/diasclase.php?page=1');
}else
if(isset($_POST['edit'])){
    $dia = $_POST['dia'];
    $desc = $_POST['desc'];
    $idedit = $_SESSION['iddias'];
    $busqueda=$user->search("dia","id_dia = '$idedit'");
    foreach ($busqueda as $busq) {
        if ($dia == null) {
            $dia = $busq['clave_dia'];
        } elseif ($desc == null) {
            $desc = $busq['descripcion'];
        }
    }   
    $resultado=$user->update("dia","clave_dia = '$dia', descripcion = '$desc'","id_dia = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        echo "<script> window.location.href = '../../menu/diasclase.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Ha ocurrido un error, por favor vuelva a intentar');</script>";
        echo "<script> window.location.href = '../../menu/diasclase.php?page=1'</script>";
    }
}
if(isset($_POST['add'])){
    $dia = $_POST['addnombredia'];
    $descripcion = $_POST['adddescripcion'];
    $resultado=$user->insert("dia", "'$dia', '$descripcion'");
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha ingresado con exito');</script>";
        echo "<script> window.location.href = '../../menu/diasclase.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('No se ha podido ingresar');</script>";
        echo "<script> window.location.href = '../../menu/diasclase.php?page=1'</script>";
    }
}
?>