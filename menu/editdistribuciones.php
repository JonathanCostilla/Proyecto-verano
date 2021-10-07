<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../include/css/home.css">
    <link rel="stylesheet" href="../include/css/clave.css">
    <link rel="stylesheet" href="../include/css/table.css">
	<title>Distribución</title>
    <script src="../include/js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container_menu"> <?php include '../include/menu_opt.php'; ?> </div>
    <div class="row justify-content-center pt-5 mt-5 mr-1" style=" margin-top: 0 !important;">
        <div class="col-md-10 form- div-login pt-4 pb-5">
            <div class="container_select">  
                <div class="header_title_select"><h3 class="h3_title h3_group" style="margin-left: 38% !important;">Distribución</h3><hr></div>
                <div class="main_menu">
                <div id="result" class="result">
                <div class="container_form">
                <form action="../include/functions/process_distribucion.php" method="post">
                    <?php
                    include '../include/private/conn.php';
                    session_start();
                    if(!$_SESSION['verified']){
                    header("Location: ../index.php");
                    }
                    $user = new Database();
                    $id = $_GET['inf'];
                    $_SESSION['iddistribucion'] = $id;
                    $resultado=$user->search("distribucion","$id = id_distribucion");
                    ?>
                        <div style="width: 100% !important;">
                        <table class="table">
                            <thead class="table">
                                <tr class="table">
                                    <th class="sh_dist" style="padding-left:5px !important; padding-right:5px !important;">Plan:</th>
                                    <th class="sh_dist" style="padding-left:3px !important; padding-right:3px !important;">Clave:</th>
                                    <th class="sh_dist" style="padding-left:3px !important; padding-right:3px !important;">Materia:</th>
                                    <th class="sh_dist" style="padding-left:3px !important; padding-right:3px !important;">Grupo:</th>
                                    <th class="sh_dist" style="padding-left:3px !important; padding-right:3px !important;">Semestre:</th>
                                    <th class="sh_dist" style="padding-left:3px !important; padding-right:3px !important;">Hora:</th>
                                    <th class="sh_dist" style="padding-left:3px !important; padding-right:3px !important;">Día:</th>
                                    <th class="sh_dist" style="padding-left:3px !important; padding-right:3px !important;">Salón:</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="tr"><!-- Cambia name e id -->
                                <?php
                                foreach ($resultado as $row) {
                                    $plan = $row['plan'];
                                    $clave = $row['clavemateria'];
                                    $materia = $row['materia'];
                                    $grupo = $row['grupo'];
                                    $semestre = $row['semestre'];
                                    $hora = $row['hora'];
                                    $dia = $row['dia'];
                                    $salon = $row['salon'];
                                }
                                ?>
                                <?php $id_plan = $user->search("plan", "id_plan != 0"); ?>
                                <td class="td_dist"><select name="addplan" id="addplan" class="addnombredia">
                                        <?php foreach ($id_plan as $plans){ ?>
                                            <option <?php if($plan == $plans["id_plan"]){ echo "selected"; } else { echo ""; } ?> value='<?php echo $plans["id_plan"]; ?>'><?php echo $plans["clave_plan"]; ?></option>
                                        <?php } ?>
                                    </select></td>

                                <?php $id_clave = $user->search("clavemateria", "id_clavemateria != 0"); ?>
                                <td class="td_dist"><select name="addclavemateria" id="addplan" class="addnombredia">
                                        <?php foreach($id_clave as $clavemateria){ ?>
                                            <option <?php if($clave == $clavemateria["id_clavemateria"]){ echo "selected"; } else { echo ""; } ?> value='<?php echo $clavemateria["id_clavemateria"]; ?>'><?php echo $clavemateria["nombre_clave"]; ?></option>
                                        <?php } ?>
                                    </select></td>
                                    
                                    <?php $id_materia = $user->search("materia", "id_materia != 0"); ?>
                                    <td class="td_dist"><select name="addmateria" id="addplan" class="addnombredia">
                                        <?php foreach($id_materia as $materias){ ?>
                                            <option <?php if($materia == $materias["id_materia"]){ echo "selected"; } else { echo ""; } ?> value='<?php echo $materias["id_materia"]; ?>'><?php echo $materias["nombre_materia"]; ?></option>
                                        <?php } ?>
                                    </select></td>

                                    <?php $id_grupo = $user->search("grupo", "id_grupo != 0"); ?>
                                    <td class="td_dist"><select name="addgrupo" id="addplan" class="addnombredia">
                                        <?php foreach($id_grupo as $gruposelect){ ?>
                                            <option <?php if($grupo == $gruposelect["id_grupo"]){ echo "selected"; } else { echo ""; } ?> value='<?php echo $gruposelect["id_grupo"]; ?>'><?php echo $gruposelect["numero_grupo"]; ?></option>
                                        <?php } ?>
                                    </select></td>

                                    <?php $id_semestre = $user->search("semestre", "id_semestre != 0"); ?>
                                    <td class="td_dist"><select name="addsemestre" id="addplan" class="addnombredia">
                                        <?php foreach($id_semestre as $smestre){ ?>
                                                <option <?php if($semestre == $smestre["id_semestre"]){ echo "selected"; } else { echo ""; } ?> value='<?php echo $smestre["id_semestre"]; ?>'><?php echo $smestre["semestre"]; ?></option>
                                            <?php } ?>
                                    </select></td>

                                    <?php $id_hora = $user->search("hora", "id_hora != 0"); ?>
                                    <td class="td_dist"><select name="addhora" id="addplan" class="addnombredia">
                                        <?php foreach($id_hora as $horaselect){ ?>
                                                <option <?php if($hora == $horaselect["id_hora"]){ echo "selected"; } else { echo ""; } ?> value='<?php echo $horaselect["id_hora"]; ?>'><?php echo $horaselect["nombre_hora"]; ?></option>
                                            <?php } ?>
                                    </select></td>

                                    <?php $id_dia = $user->search("dia", "id_dia != 0"); ?>
                                    <td class="td_dist"><select name="adddia" id="addplan" class="addnombredia">
                                        <?php foreach($id_dia as $diaselect){ ?>
                                                <option <?php if($dia == $diaselect["id_dia"]){ echo "selected"; } else { echo ""; } ?> value='<?php echo $diaselect["id_dia"]; ?>'><?php echo $diaselect["clave_dia"]; ?></option>
                                            <?php } ?>
                                    </select></td>

                                    <?php $id_salon = $user->search("salon", "id_salon != 0"); ?>
                                    <td class="td_dist"><select name="addsalon" id="addplan" class="addnombredia">
                                        <?php foreach($id_salon as $salonselect){ ?>
                                                <option <?php if($salon == $salonselect["id_salon"]){ echo "selected"; } else { echo ""; } ?> value='<?php echo $salonselect["id_salon"]; ?>'><?php echo $salonselect["nombre_salon"]; ?></option>
                                            <?php } ?>
                                    </select></td>
                                        </tr>
                                    <tr>
                                    <td class="td_dist" colspan="8">
                                    <div class="container_buttons" style="margin-left: 0 !important;">
                                        <button class="btn_action opt sep" type="submit" name="volver">Volver</button>
                                        <button class="btn_action opt" type="submit" name="edit">Editar</button>
                                    </div>
                                        </td>
                                        </tr>
                                </form>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>