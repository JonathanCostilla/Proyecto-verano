<?php
include '../private/conn.php';
session_start();
$user = new Database();
if ($_GET) {
    if ($_GET['inf']) {
        $resultado=$user->delete("distribucion", "id_distribucion = ".$_GET['inf']);
        if ($resultado) {
            echo "<script type='text/javascript'>alert('Se ha eliminado con exito');</script>";
            header("Location: ../../menu/distribuciones.php?page=1"); // Cambiar direccion
        } else {
            echo "<script type='text/javascript'>alert('Ha ocurrido un error, vuelve a intentarlo');</script>";
            header("Location: ../../menu/distribuciones.php?page=1"); // Cambiar direccion
        }
    }
}
if(isset($_POST['volver'])){
    header('Location: ../../menu/distribuciones.php?page=1');
}else
if(isset($_POST['edit'])){
    $plan = $_POST['addplan'];
    $clave = $_POST['addclavemateria'];
    $materia = $_POST['addmateria'];
    $grupo = $_POST['addgrupo'];
    $semestre = $_POST['addsemestre'];
    $hora = $_POST['addhora'];
    $dia = $_POST['adddia'];
    $salon = $_POST['addsalon'];
    $idedit = $_SESSION['iddistribucion'];
    $busqueda=$user->search("distribucion","id_distribucion = '$idedit'");
    foreach ($busqueda as $busq) {
        if ($plan == null) {
            $plan = $busq['plan'];
        }
        if ($clave == null) {
            $clave = $busq['clavemateria'];
        }
        if ($materia == null) {
            $materia = $busq['materia'];
        }
        if ($grupo == null) {
            $grupo = $busq['grupo'];
        }
        if ($semestre == null) {
            $semestre = $busq['id_semestre'];
        }
        if ($hora == null) {
            $hora = $busq['hora'];
        }
        if ($dia == null) {
            $dia = $busq['dia'];
        }
        if ($salon == null) {
            $salon = $busq['salon'];
        }
    }

    $resultado=$user->update("distribucion","plan = $plan, clavemateria = $clave, materia = $materia, grupo = $grupo, semestre = $semestre, hora = $hora, dia = $dia, salon = $salon","id_distribucion = ".$idedit);
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha editado con exito');</script>";
        echo "<script> window.location.href = '../../menu/distribuciones.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Ha ocurrido un error, por favor vuelva a intentar');</script>";
        echo "<script> window.location.href = '../../menu/distribuciones.php?page=1'</script>";
    }
}
if(isset($_POST['add'])){
    $plan = $_POST['addplan'];
    $clave = $_POST['addclavemateria'];
    $materia = $_POST['addmateria'];
    $grupo = $_POST['addgrupo'];
    $semestre = $_POST['addsemestre'];
    $hora = $_POST['addhora'];
    $dia = $_POST['adddia'];
    $salon = $_POST['addsalon'];
    $searchclave=$user->search("distribucion", "clavemateria = $clave");
    if($searchclave){
        echo "<script type='text/javascript'>alert('¡¡¡¡ERROR!!!! NO se puede agregar porque la clave ya esta en uso');</script>";
        echo "<script> window.location.href = '../../menu/distribuciones.php?page=1'</script>";
    }
    $resultado=$user->insertdist("distribucion", "$plan, $clave, $materia, $grupo, $hora, $dia, $salon, $semestre");
    if($resultado){
        echo "<script type='text/javascript'>alert('Se ha ingresado con exito');</script>";
        echo "<script> window.location.href = '../../menu/distribuciones.php?page=1'</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('No se ha podido ingresar');</script>";
        echo "<script> window.location.href = '../../menu/distribuciones.php?page=1'</script>";
    }
}

if(isset($_POST{'report'})){
    echo '<script> window.open("report.php", "_blank");';
    echo "<script type='text/javascript'>alert('Su Reporte ha sido generado');</script>";
        echo "<script> window.location.href = '../../menu/distribuciones.php?page=1'</script>";
}
?>