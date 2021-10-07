<?php 
include "../include/private/conn.php";
$user = new Database();
session_start();
if($_SESSION['geti'] == 9){
    $optionselect = "distribucion";
}
if(!$_SESSION['verified']){
    header("Location: ../index.php");
}
$count=$user->searchcount($optionselect);
if ($count) {
    $totalcount = $count;
    $totalperpag = 3;
    if ($totalcount == 0) {
        $totalcount = 1;
    }
    if ($totalcount<3) {
        $totalperpag = 2;
    } elseif ($totalcount<2) {
        $totalperpag = 1;
    }

    $total_page = $totalcount/3;
    $total_page = ceil($total_page);
    $init = ($_GET['page']-1)*$totalperpag;
    if ($_GET['page']>$total_page || $_GET['page']<=0) {
        header('Location: distribuciones.php?page=1');
    }                      /* Cambia location y la sentencias */
    $resultado=$user->search($optionselect, " id_distribucion != 0 LIMIT $init,$totalperpag"); ?>
    <div>
        <table class="table" style = "margin-top: -3%;">
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
                    <th class="sh_dist"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr"><!-- Cambia name e id -->
                <?php
                    foreach ($resultado as $row) {
                        $plan = $row['plan'];
                        $id_plan = $user->search("plan", "id_plan = $plan");
                        foreach ($id_plan as $plans) { ?>
                            <td class="td_dist"><p class="value vdist"><?php echo $plans["clave_plan"]; ?></p></td>;
                            <?php
                        }
                        $clave = $row['clavemateria'];
                        $id_clave = $user->search("clavemateria", "id_clavemateria = $clave");
                        foreach($id_clave as $clavemateria){ ?>
                            <td class="td_dist"><p class="value vdist"><?php echo $clavemateria["nombre_clave"]; ?></p></td>
                            <?php
                        }
                        $materia = $row['materia'];
                        $id_materia = $user->search("materia", "id_materia = $materia");
                        foreach($id_materia as $mat){
                        ?>
                            <td class="td_dist"><p class="value vdist"><?php echo $mat["nombre_materia"]; ?></p></td>
                        <?php
                        }
                        $grupo = $row['grupo'];
                        $id_grupo = $user->search("grupo", "id_grupo = $grupo");
                        foreach($id_grupo as $gruposelect){
                            ?>
                            <td class="td_dist"><p class="value vdist"><?php echo $gruposelect["numero_grupo"]; ?></p></td>
                            <?php
                        }
                        $semestre = $row['semestre'];
                        $id_semestre = $user->search("semestre", "id_semestre = $semestre");
                        foreach($id_semestre as $semestreselect){
                            ?>
                            <td class="td_dist"><p class="value vdist"><?php echo $semestreselect["semestre"]; ?></p></td>
                            <?php
                        }
                        $hora = $row['hora'];
                        $id_hora = $user->search("hora", "id_hora = $hora");
                        foreach($id_hora as $horaselect){
                            ?>
                            <td class="td_dist"><p class="value vdist"><?php echo $horaselect["nombre_hora"]; ?></p></td>
                            <?php
                        }
                        $dia = $row['dia'];
                        $id_dia = $user->search("dia", "id_dia = $dia");
                        foreach($id_dia as $diaselect){
                            ?>
                            <td class="td_dist"><p class="value vdist"><?php echo $diaselect["clave_dia"]; ?></p></td>
                            <?php
                        }
                        $salon = $row['salon'];
                        $id_salon = $user->search("salon", "id_salon = $salon");
                        foreach($id_salon as $salonselect){
                            ?>
                            <td class="td_dist"><p class="value vdist"><?php echo $salonselect["nombre_salon"]; ?></p></td>
                            <?php
                        }
                        ?>
                        <td class="td" style="padding-left:3px !important; padding-right:3px !important;">
                        <a id="edit" name="edit" class="btn_action" href="editdistribuciones.php?inf=<?php echo $row['id_distribucion']; ?>">Editar</a>
                        <a id="delete" name="delete" class="btn_action" href="../include/functions/process_distribucion.php?inf=<?php echo $row['id_distribucion']; ?>" onclick="return confirm('¿Seguro que desea eliminarlo?')">Eliminar</a></td>
                        </tr>
                        <?php
                    }
                        ?>
                <tr>
                    <!-- Funcion agregar -->
                    <form action="../include/functions/process_distribucion.php" method="post">

                    <?php $id_plan = $user->search("plan", "id_plan != 0"); ?>
                    <td class="td_dist"><select name="addplan" id="addplan" class="addnombredia" required>
                            <?php foreach ($id_plan as $plans){ ?>
                                <option value='<?php echo $plans["id_plan"]; ?>'><?php echo $plans["clave_plan"]; ?></option>
                            <?php } ?>
                        </select></td>

                    <?php $id_clave = $user->search("clavemateria", "id_clavemateria != 0"); ?>
                    <td class="td_dist"><select name="addclavemateria" id="addplan" class="addnombredia" required>
                            <?php foreach($id_clave as $clavemateria){ ?>
                                <option value='<?php echo $clavemateria["id_clavemateria"]; ?>'><?php echo $clavemateria["nombre_clave"]; ?></option>
                            <?php } ?>
                        </select></td>
                        
                        <?php $id_materia = $user->search("materia", "id_materia != 0"); ?>
                        <td class="td_dist"><select name="addmateria" id="addplan" class="addnombredia" required>
                            <?php foreach($id_materia as $materia){ ?>
                                <option value='<?php echo $materia["id_materia"]; ?>'><?php echo $materia["nombre_materia"]; ?></option>
                            <?php } ?>
                        </select></td>

                        <?php $id_grupo = $user->search("grupo", "id_grupo != 0"); ?>
                        <td class="td_dist"><select name="addgrupo" id="addplan" class="addnombredia" required>
                            <?php foreach($id_grupo as $gruposelect){ ?>
                                <option value='<?php echo $gruposelect["id_grupo"]; ?>'><?php echo $gruposelect["numero_grupo"]; ?></option>
                            <?php } ?>
                        </select></td>

                        <?php $id_semestre = $user->search("semestre", "id_semestre != 0"); ?>
                        <td class="td_dist"><select name="addsemestre" id="addplan" class="addnombredia" required>
                            <?php foreach($id_semestre as $smestre){ ?>
                                    <option value='<?php echo $smestre["id_semestre"]; ?>'><?php echo $smestre["semestre"]; ?></option>
                                <?php } ?>
                        </select></td>

                        <?php $id_hora = $user->search("hora", "id_hora != 0"); ?>
                        <td class="td_dist"><select name="addhora" id="addplan" class="addnombredia" required>
                            <?php foreach($id_hora as $horaselect){ ?>
                                    <option value='<?php echo $horaselect["id_hora"]; ?>'><?php echo $horaselect["nombre_hora"]; ?></option>
                                <?php } ?>
                        </select></td>

                        <?php $id_dia = $user->search("dia", "id_dia != 0"); ?>
                        <td class="td_dist"><select name="adddia" id="addplan" class="addnombredia" required>
                            <?php foreach($id_dia as $diaselect){ ?>
                                    <option value='<?php echo $diaselect["id_dia"]; ?>'><?php echo $diaselect["clave_dia"]; ?></option>
                                <?php } ?>
                        </select></td>

                        <?php $id_salon = $user->search("salon", "id_salon != 0"); ?>
                        <td class="td_dist"><select name="addsalon" id="addplan" class="addnombredia" required>
                            <?php foreach($id_salon as $salonselect){ ?>
                                    <option value='<?php echo $salonselect["id_salon"]; ?>'><?php echo $salonselect["nombre_salon"]; ?></option>
                                <?php } ?>
                        </select></td>

                    <td class="td">
                        <button id="add" name="add" class="btn_action">Agregar</button>
                        <a style="padding-top: 2.7px; padding-bottom: 2.7px;" id="add" name="report" class="btn_action" href="../include/functions/report.php" target="blank">Reporte</a>
                    </td>
                    </form>
                </tr>
                </form>
            </tbody>
        </table>
    </div>
    <div>
        <nav class="pagination div_nav" style="margin-left: 0 !important;">
            <ul class="pagination">                                                                                <!-- Cambia direcciones -->
                <li class="page-item pos <?php echo $_GET['page']<=1 ? 'disable' : ''?>"><a class="btn_option siz" href='distribuciones.php?page=<?php echo $_GET['page']-1; ?>'>Anterior</a></li>
                        
                <?php for ($i=0; $i<$total_page; $i++) { ?>
                            
                    <li class="page-item pos">                                                  <!-- Cambia direcciones -->
                    <a class="btn_option siz <?php echo $_GET['page']==$i+1 ? 'active' : '' ?>" href="distribuciones.php?page=<?php echo $i+1;?>"><?php echo$i+1; ?></a></li>
                <?php } ?>
                                                                                                <!-- Cambia direcciones -->
                <li class="page-item pos <?php echo $_GET['page']>=$total_page ? 'disable' : '' ?>"><a class="btn_option siz" href='distribuciones.php?page=<?php echo $_GET['page']+1; ?>'>Siguiente</a></li>
            </ul>
        </nav>
    </div>
<?php
}
else{
    echo "<p class='advice_not'>No hay Registros</p>";
    ?>
    <div class="sizedata">
    <!-- Funcion agregar -->
    <div>
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
                    <th class="sh_dist"></th>
                </tr>
            </thead>
            <tbody>
    <form action="../include/functions/process_distribucion.php" method="post">

        <?php $id_plan = $user->search("plan", "id_plan != 0"); ?>
        <td class="td_dist"><select name="addplan" id="addplan" class="addnombredia" required>
                <?php foreach ($id_plan as $plans){ ?>
                    <option value='<?php echo $plans["id_plan"]; ?>'><?php echo $plans["clave_plan"]; ?></option>
                <?php } ?>
            </select></td>

        <?php $id_clave = $user->search("clavemateria", "id_clavemateria != 0"); ?>
        <td class="td_dist"><select name="addclavemateria" id="addplan" class="addnombredia" required>
                <?php foreach($id_clave as $clavemateria){ ?>
                    <option value='<?php echo $clavemateria["id_clavemateria"]; ?>'><?php echo $clavemateria["nombre_clave"]; ?></option>
                <?php } ?>
            </select></td>
            
            <?php $id_materia = $user->search("materia", "id_materia != 0"); ?>
            <td class="td_dist"><select name="addmateria" id="addplan" class="addnombredia" required>
                <?php foreach($id_materia as $materia){ ?>
                    <option value='<?php echo $materia["id_materia"]; ?>'><?php echo $materia["nombre_materia"]; ?></option>
                <?php } ?>
            </select></td>

            <?php $id_grupo = $user->search("grupo", "id_grupo != 0"); ?>
            <td class="td_dist"><select name="addgrupo" id="addplan" class="addnombredia" required>
                <?php foreach($id_grupo as $gruposelect){ ?>
                    <option value='<?php echo $gruposelect["id_grupo"]; ?>'><?php echo $gruposelect["numero_grupo"]; ?></option>
                <?php } ?>
            </select></td>

            <?php $id_semestre = $user->search("semestre", "id_semestre != 0"); ?>
            <td class="td_dist"><select name="addsemestre" id="addplan" class="addnombredia" required>
                <?php foreach($id_semestre as $smestre){ ?>
                        <option value='<?php echo $smestre["id_semestre"]; ?>'><?php echo $smestre["semestre"]; ?></option>
                    <?php } ?>
            </select></td>

            <?php $id_hora = $user->search("hora", "id_hora != 0"); ?>
            <td class="td_dist"><select name="addhora" id="addplan" class="addnombredia" required>
                <?php foreach($id_hora as $horaselect){ ?>
                        <option value='<?php echo $horaselect["id_hora"]; ?>'><?php echo $horaselect["nombre_hora"]; ?></option>
                    <?php } ?>
            </select></td>

            <?php $id_dia = $user->search("dia", "id_dia != 0"); ?>
            <td class="td_dist"><select name="adddia" id="addplan" class="addnombredia" required>
                <?php foreach($id_dia as $diaselect){ ?>
                        <option value='<?php echo $diaselect["id_dia"]; ?>'><?php echo $diaselect["clave_dia"]; ?></option>
                    <?php } ?>
            </select></td>

            <?php $id_salon = $user->search("salon", "id_salon != 0"); ?>
            <td class="td_dist"><select name="addsalon" id="addplan" class="addnombredia" required>
                <?php foreach($id_salon as $salonselect){ ?>
                        <option value='<?php echo $salonselect["id_salon"]; ?>'><?php echo $salonselect["nombre_salon"]; ?></option>
                    <?php } ?>
            </select></td>

        <td class="td"><button id="add" name="add" class="btn_action">Agregar</button></td>
        </form>
        </div>
    <?php
    }

    ?>