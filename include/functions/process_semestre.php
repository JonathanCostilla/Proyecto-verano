<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']) {
        $searchdelete = $user->search("distribucion", "semestre =".$_GET['inf']);
        if($searchdelete){
            echo "<script type='text/javascript'>alert('No se puede ELIMINAR, porque esta en uso, vaya a la opción Distribución y cambielo luego vuelva a intentar.');</script>";
            echo "<script> window.location.href = '../../menu/semestre.php?page=1'</script>";
        }
        $resultado=$user->delete("semestre", "id_semestre = ".$_GET['inf']);
        if ($resultado) {
            echo "<script type='text/javascript'>alert('Se ha eliminado con exito');</script>";
            header("Location: ../../menu/semestre.php?page=1");
        } else {
            echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
            header("Location: ../../menu/semestre.php?page=1");
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/semestre.php?page=1');
}else
if(isset($_POST['edit'])){
    $semestre = $_POST['semestre'];
    $desc = $_POST['desc'];
    $idedit = $_SESSION['idsemestre'];
    $busqueda=$user->search("semestre","id_semestre = '$idedit'");
    foreach ($busqueda as $busq) {
        if ($semestre == null) {
            $semestre = $busq['semestre'];
        } 
        if ($desc == null) {
            $desc = $busq['descripcion'];
        }
    }   
    $resultado=$user->update("semestre","semestre = $semestre, descripcion = '$desc'","id_semestre = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        echo "<script> window.location.href = '../../menu/semestre.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('El semestre ya existe y/o no es valido, por favor vuelva a intentar');</script>";
        echo "<script> window.location.href = '../../menu/semestre.php?page=1'</script>";
    }
}
if(isset($_POST['add'])){
    $semestre = $_POST['addnombresemestre'];
    $descripcion = $_POST['adddescripcion'];
    $resultado=$user->insert("semestre","'$semestre', '$descripcion'");
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha ingresado con exito');</script>";
        echo "<script> window.location.href = '../../menu/semestre.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('No se ha podido ingresar');</script>";
        echo "<script> window.location.href = '../../menu/semestre.php?page=1'</script>";
    }
}
?>