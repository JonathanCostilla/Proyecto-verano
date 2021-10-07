<?php 
include "../include/private/conn.php";
$user = new Database();
session_start();
if($_SESSION['geti'] == 7){
    $optionselect = "salon";
}
if(!$_SESSION['verified']){
    header("Location: ../index.php");
}else{
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
        header('Location: salon.php?page=1');
    }                      /* Cambia location y la sentencias */
    $resultado=$user->search($optionselect, "id_salon != 0 LIMIT $init,$totalperpag"); ?>
    <div class="table">
        <table class="table">
            <thead>
                <tr>
                    <th class="sh">Salón</th>
                    <th class="sh">Capacidad</th>
                    <th class="sh">Ubicación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($resultado as $row) {
                        ?>
                <tr class="tr"><!-- Cambia name e id -->
                    <td class="td"><p class="value"><?php echo $row['nombre_salon']; ?></p></td>
                    <td class="td"><p class="value"><?php echo $row['capacidad']; ?></p></td>
                    <td class="td"><p class="value"><?php echo $row['ubicacion']; ?></p></td>
                    <td class="td"><a id="edit" name="edit" class="btn_action" href="editsalon.php?inf=<?php echo $row['id_salon']; ?>">Editar</a><a id="delete" name="delete" class="btn_action" href="../include/functions/process_salon.php?inf=<?php echo $row['id_salon']; ?>" onclick="return confirm('¿Seguro que desea eliminarlo?')">Eliminar</a></td>
                </tr>
                <?php
                    } ?>
                <tr>
                    <form action="../include/functions/process_salon.php" method="post">
                    <td class="td data"><input type="text" name="addnombresalon" id="addnombresalon" placeholder="salón" required></td>
                    <td class="td data"><input type="text" name="addcapacidad"  id="addcapacidad" placeholder="capacidad" required></td>
                    <td class="td data"><input type="text" name="addubicacion"  id="addubicacion" placeholder="ubicación" required></td>
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
                <li class="page-item pos <?php echo $_GET['page']<=1 ? 'disable' : ''?>"><a class="btn_option siz" href='salon.php?page=<?php echo $_GET['page']-1; ?>'>Anterior</a></li>
                        
                <?php for ($i=0; $i<$total_page; $i++) { ?>
                            
                    <li class="page-item pos">                                                  <!-- Cambia direcciones -->
                    <a class="btn_option siz <?php echo $_GET['page']==$i+1 ? 'active' : '' ?>" href="salon.php?page=<?php echo $i+1;?>"><?php echo$i+1; ?></a></li>
                <?php } ?>
                                                                                                <!-- Cambia direcciones -->
                <li class="page-item pos <?php echo $_GET['page']>=$total_page ? 'disable' : '' ?>"><a class="btn_option siz" href='salon.php?page=<?php echo $_GET['page']+1; ?>'>Siguiente</a></li>
            </ul>
        </nav>
    </div>
<?php
}
else{
    echo "<p class='advice_not' style='margin-top: -1%;'>No hay Registros</p>";
    ?>
    <div class="sizedata">
    <div><p style="color: whitesmoke;">Agregar:</p></div>
    <form action="../include/functions/process_salon.php" method="post">
    <td class="td data"><input type="text" name="addnombresalon" id="addnombresalon" placeholder="salón" required></td>
    <td class="td data"><input type="text" name="addcapacidad"  id="addcapacidad" placeholder="capacidad" required></td>
    <td class="td data"><input type="text" name="addubicacion"  id="addubicacion" placeholder="ubicación" required></td>
    <td class="td"><button id="add" name="add" class="btn_action">Agregar</button></td>
    </form>
    </div>
<?php
}
}
?>