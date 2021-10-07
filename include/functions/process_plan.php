<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']){
        $searchdelete = $user->search("distribucion", "plan =".$_GET['inf']);
        if($searchdelete){
            echo "<script type='text/javascript'>alert('No se puede ELIMINAR, porque esta en uso, vaya a la opción Distribución y cambielo luego vuelva a intentar.');</script>";
            echo "<script> window.location.href = '../../menu/plan.php?page=1'</script>";
        }
        $resultado=$user->delete("plan", "id_plan = ".$_GET['inf']);
        if ($resultado) {
            echo "<script type='text/javascript'>alert('Se ha eliminado con exito');</script>";
            header("Location: ../../menu/plan.php?page=1"); // Cambiar direccion
        } else {
            echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
            header("Location: ../../menu/plan.php?page=1"); // Cambiar direccion
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/plan.php?page=1');
}else
if(isset($_POST['edit'])){
    $plan = $_POST['plan'];
    $desc = $_POST['desc'];
    $idedit = $_SESSION['idplan'];
    $busqueda=$user->search("plan","id_plan = '$idedit'");
    foreach ($busqueda as $busq) {
        if ($plan == null) {
            $plan = $busq['clave_plan'];
        }
    }   
    $resultado=$user->update("plan","clave_plan = '$plan', descripcion = '$desc'","id_plan = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        echo "<script> window.location.href = '../../menu/plan.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Ha ocurrido un error, por favor vuelva a intentar');</script>";
        echo "<script> window.location.href = '../../menu/plan.php?page=1'</script>";
    }
}
if(isset($_POST['add'])){
    $plan = $_POST['addnombreplan'];
    $desc = $_POST['addnombredesc'];
    $resultado=$user->insert("plan", "'$plan', '$desc'");
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha ingresado con exito');</script>";
        echo "<script> window.location.href = '../../menu/plan.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('No se ha podido ingresar');</script>";
        echo "<script> window.location.href = '../../menu/plan.php?page=1'</script>";
    }
}
?>