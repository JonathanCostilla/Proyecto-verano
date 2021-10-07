<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']) {
        $searchdelete = $user->search("distribucion", "materia =".$_GET['inf']);
        if($searchdelete){
            echo "<script type='text/javascript'>alert('No se puede ELIMINAR, porque esta en uso, vaya a la opción Distribución y cambielo luego vuelva a intentar.');</script>";
            echo "<script> window.location.href = '../../menu/materia.php?page=1'</script>";
        }
        $resultado=$user->delete("materia", "id_materia = ".$_GET['inf']);
        if ($resultado) {
            echo "<script type='text/javascript'>alert('Se ha eliminado con exito');</script>";
            header("Location: ../../menu/materia.php?page=1");
        } else {
            echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
            header("Location: ../../menu/materia.php?page=1");
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/materia.php?page=1');
}else
if(isset($_POST['edit'])){
    $materia = $_POST['materia'];
    $desc = $_POST['desc'];
    $idedit = $_SESSION['idmateria'];
    $busqueda=$user->search("materia","id_materia = '$idedit'");
    foreach ($busqueda as $busq) {
        if ($materia == null) {
            $materia = $busq['nombre_materia'];
        } elseif ($desc == null) {
            $desc = $busq['descripcion'];
        }
    }   
    $resultado=$user->update("materia","nombre_materia = '$materia', descripcion = '$desc'","id_materia = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        echo "<script> window.location.href = '../../menu/materia.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Ha ocurrido un error, por favor vuelva a intentar');</script>";
        echo "<script> window.location.href = '../../menu/materia.php?page=1'</script>";
    }
}
if(isset($_POST['add'])){
    $materia = $_POST['addnombremateria'];
    $descripcion = $_POST['adddescripcion'];
    $resultado=$user->insert("materia", "'$materia', '$descripcion'");
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha ingresado con exito');</script>";
        echo "<script> window.location.href = '../../menu/materia.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('No se ha podido ingresar');</script>";
        echo "<script> window.location.href = '../../menu/materia.php?page=1'</script>";
    }
}
?>