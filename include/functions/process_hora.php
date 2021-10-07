<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']) {
        $searchdelete = $user->search("distribucion", "hora =".$_GET['inf']);
        if($searchdelete){
            echo "<script type='text/javascript'>alert('No se puede ELIMINAR, porque esta en uso, vaya a la opción Distribución y cambielo luego vuelva a intentar.');</script>";
            echo "<script> window.location.href = '../../menu/hora.php?page=1'</script>";
        }
        $resultado=$user->delete("hora", "id_hora = ".$_GET['inf']);
        if ($resultado) {
            echo "<script type='text/javascript'>alert('Se ha eliminado con exito');</script>";
            header("Location: ../../menu/hora.php?page=1"); // Cambiar direccion
        } else {
            echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
            header("Location: ../../menu/hora.php?page=1"); // Cambiar direccion
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/hora.php?page=1');
}else
if(isset($_POST['edit'])){
    $hora = $_POST['hora'];
    $hi = $_POST['horainicio'];
    $hf = $_POST['horafin'];
    $idedit = $_SESSION['idhora'];
    $busqueda=$user->search("hora","id_hora = '$idedit'");
    foreach ($busqueda as $busq) {
        if ($hora == null) {
            $hora = $busq['nombre_hora'];
        }
        if ($hi == null) {
            $hi = $busq['hora_inicio'];
        }
        if ($hf == null) {
            $hf = $busq['hora_fin'];
        }
    }   
    $resultado=$user->update("hora","nombre_hora = '$hora', hora_inicio = '$hi', hora_fin = '$hf'","id_hora = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        echo "<script> window.location.href = '../../menu/hora.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Ha ocurrido un error, por favor vuelva a intentar');</script>";
        echo "<script> window.location.href = '../../menu/hora.php?page=1'</script>";
    }
}
if(isset($_POST['add'])){
    $hora = $_POST['addnombrehora'];
    $hi = $_POST['addnombrehorainicio'];
    $hf = $_POST['addnombrehorafin'];
    $resultado=$user->insert("hora", "'$hora', '$hi', '$hf'");
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha ingresado con exito');</script>";
        echo "<script> window.location.href = '../../menu/hora.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('No se ha podido ingresar');</script>";
        echo "<script> window.location.href = '../../menu/hora.php?page=1'</script>";
    }
}
?>