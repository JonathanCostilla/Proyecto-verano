<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']) {
        $searchgroup = $user->search("distribucion", "grupo =".$_GET['inf']);
        if($searchdelete){
            echo "<script type='text/javascript'>alert('No se puede ELIMINAR, porque esta en uso, vaya a la opción Distribución y cambielo luego vuelva a intentar.');</script>";
            echo "<script> window.location.href = '../../menu/grupo.php?page=1'</script>";
        }
        $resultado=$user->delete("grupo", "id_grupo = ".$_GET['inf']);
        if ($resultado) {
            echo "<script type='text/javascript'>alert('Se ha eliminado con exito');</script>";
            header("Location: ../../menu/grupo.php?page=1"); // Cambiar direccion
        } else {
            echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
            header("Location: ../../menu/grupo.php?page=1"); // Cambiar direccion
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/grupo.php?page=1');
}else
if(isset($_POST['edit'])){
    $grupo = $_POST['grupo'];
    $idedit = $_SESSION['idgrupos'];
    $busqueda=$user->search("grupo","id_grupo = '$idedit'");
    foreach ($busqueda as $busq) {
        if ($grupo == null) {
            $grupo = $busq['numero_grupo'];
        }
    }   
    $resultado=$user->update("grupo","numero_grupo = '$grupo'","id_grupo = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        echo "<script> window.location.href = '../../menu/grupo.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Ha ocurrido un error, por favor vuelva a intentar');</script>";
        echo "<script> window.location.href = '../../menu/grupo.php?page=1'</script>";
    }
}
if(isset($_POST['add'])){
    $grupo = $_POST['addnombregrupo'];
    $resultado=$user->insert("grupo", "'$grupo'");
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha ingresado con exito');</script>";
        echo "<script> window.location.href = '../../menu/grupo.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('No se ha podido ingresar');</script>";
        echo "<script> window.location.href = '../../menu/grupo.php?page=1'</script>";
    }
}
?>