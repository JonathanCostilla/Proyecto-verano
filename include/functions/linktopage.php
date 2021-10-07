<?php
    session_start();
    if(!$_SESSION['verified']){
        header("Location: ../../index.php");
        }
    if(isset($_POST['clave'])){
        $_SESSION["geti"] = 1;
        header("Location: ../../menu/clavedemateria.php?page=1");
    }elseif(isset($_POST['dias_clase'])){
        $_SESSION["geti"] = 2;
        header("Location: ../../menu/diasclase.php?page=1");
    }elseif(isset($_POST['grupos'])){
        $_SESSION["geti"] = 3;
        header("Location: ../../menu/grupo.php?page=1");
    }elseif(isset($_POST['horas_clase'])){
        $_SESSION["geti"] = 4; 
        header("Location: ../../menu/hora.php?page=1");
    }elseif(isset($_POST['materias'])){
        $_SESSION["geti"] = 5;
        header("Location: ../../menu/materia.php?page=1");
    }elseif(isset($_POST['plan'])){
        $_SESSION["geti"] = 6;
        header("Location: ../../menu/plan.php?page=1"); 
    }elseif(isset($_POST['salones'])){
        $_SESSION["geti"] = 7;
        header("Location: ../../menu/salon.php?page=1");
    }elseif(isset($_POST['semestre'])){
        $_SESSION["geti"] = 8;
        header("Location: ../../menu/semestre.php?page=1"); // ------------------- Checkpoint -------------------- //
    }elseif(isset($_POST['distribuciones'])){
        $_SESSION["geti"] = 9;
        header("Location: ../../menu/distribuciones.php?page=1");
    }
    if(isset($_POST['exit'])){
        session_destroy();
        echo 'alert("Esta a punto de salir")';
        header("Location: ../../index.php");
    }
?>