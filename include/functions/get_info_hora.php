<?php 
include "../include/private/conn.php";
$user = new Database();
session_start();
if($_SESSION['geti'] == 4){
    $optionselect = "hora";
}
if(!$_SESSION['verified']){
    header("Location: ../index.php");
}
    $count=$user->searchcount($optionselect);
    if ($count) {
        $totalcount = $count;
        if ($totalcount == 0) {
            $totalcount = 1;
        }
        if ($totalcount<3) {
            $totalperpag = 2;
        } elseif ($totalcount<2) {
            $totalperpag = 1;
        }
        $totalperpag = 3;
        $total_page = $totalcount/3;
        $total_page = ceil($total_page);
        $init = ($_GET['page']-1)*$totalperpag;
        if ($_GET['page']>$total_page || $_GET['page']<=0) {
            header('Location: hora.php?page=1');
        }                      /* Cambia location y la sentencias */
        $resultado=$user->search($optionselect, "id_hora != 0 LIMIT $init,$totalperpag"); ?>
    <div class="table">
        <table class="table">
            <thead>
                <tr>
                    <th class="sh">Hora:</th>
                    <th class="sh">Hora Inicio:</th>
                    <th class="sh">Hora Fin:</th>
                    <th class="sh"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($resultado as $row) {
                        ?>
                <tr class="tr"><!-- Cambia name e id -->
                    <td class="td"><p class="value"><?php echo $row['nombre_hora']; ?></p></td>
                    <td class="td"><p class="value"><?php echo $row['hora_inicio']; ?></p></td>
                    <td class="td"><p class="value"><?php echo $row['hora_fin']; ?></p></td>
                    <td class="td"><a id="edit" name="edit" class="btn_action" href="edithora.php?inf=<?php echo $row['id_hora']; ?>">Editar</a><a id="delete" name="delete" class="btn_action" href="../include/functions/process_diasclase.php?inf=<?php echo $row['id_hora']; ?>" onclick="return confirm('¿Seguro que desea eliminarlo?')">Eliminar</a></td>
                </tr>
                <?php
                    } ?>
                <tr>
                    <form action="../include/functions/process_hora.php" method="post">
                    <td class="td data"><input type="text" class="input_edit inhora" name="addnombrehora"  id="addnomberehora" placeholder="Hora" required></td>
                    <td class="td data"><input type="time"  class="input_edit inhora" name="addnombrehorainicio" id="addnombrehorainicio" min="7:00" max="21:10" placeholder="Hora Inicio"></td>
                    <td class="td data"><input type="time" class="input_edit inhora" name="addnombrehorafin" id="addnombrehorafin" placeholder="Hora Fin" min="7:50" max="22:00" required></td>
                    <td class="td"><button id="add" name="add" class="btn_action">Agregar</button></td>
                    </form>
                </tr>
                </form>
            </tbody>
        </table>
    </div>
    <div>
        <nav class="pagination div_nav" style="margin-left: 0 !important;">
            <ul class="pagination">                                                                                <!-- Cambia direcciones -->
                <li class="page-item pos <?php echo $_GET['page']<=1 ? 'disable' : ''?>"><a class="btn_option siz" href='hora.php?page=<?php echo $_GET['page']-1; ?>'>Anterior</a></li>
                        
                <?php for ($i=0; $i<$total_page; $i++) { ?>
                            
                    <li class="page-item pos">                                                  <!-- Cambia direcciones -->
                    <a class="btn_option siz <?php echo $_GET['page']==$i+1 ? 'active' : '' ?>" href="hora.php?page=<?php echo $i+1;?>"><?php echo$i+1; ?></a></li>
                <?php } ?>
                                                                                                <!-- Cambia direcciones -->
                <li class="page-item pos <?php echo $_GET['page']>=$total_page ? 'disable' : '' ?>"><a class="btn_option siz" href='hora.php?page=<?php echo $_GET['page']+1; ?>'>Siguiente</a></li>
            </ul>
        </nav>
    </div>
    <?php
    } else {
        echo "<p class='advice_not'>No hay Registros</p>"; ?>
    <div class="sizedata">
    <div><p style="color: whitesmoke;">Agregar:</p></div>
    <form action="../include/functions/process_hora.php" method="post">
    <td class="td data"><input type="text" name="addnombrehora"  id="addnomberehora" placeholder="Hora" required></td>
    <td class="td data"><input type="time" class="input_edit hora" name="addnombrehorainicio" id="addnombrehorainicio" min="7:00" max="21:10" placeholder="Hora Inicio"></td>
    <td class="td data"><input type="time" class="input_edit hora" name="addnombrehorafin" id="addnombrehorafin" placeholder="Hora Fin" min="7:50" max="22:00" required></td>
    <td class="td"><button id="add" name="add" class="btn_action">Agregar</button></td>
    </div>
<?php
    }

?>