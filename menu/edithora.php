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
	<title>Hora clase</title>
    <script src="../include/js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container_menu">
	<?php
	    include '../include/menu_opt.php';
	?>
		</div>
        <div class="row justify-content-center pt-5 mt-5 mr-1" style=" margin-top: 0 !important;">
            <div class="col-md-10 form- div-login pt-4 pb-5">
                <div class="container_select">  
                    <div class="header_title_select">
                        <h3 class="h3_title">Hora clase</h3><hr>
                    </div>
                    <div class="main_menu">
                        <div id="result" class="result">
                            <div class="container_form">
                                <form action="../include/functions/process_hora.php" method="post">
                                        <?php
                                        include '../include/private/conn.php';
                                        session_start();
                                        if(!$_SESSION['verified']){
                                            header("Location: ../index.php");
                                            }
                                        $user = new Database();
                                        $id = $_GET['inf'];
                                        $_SESSION['idhora'] = $id;
                                        $resultado=$user->search("hora","id_hora=".$id);
                                        foreach ($resultado as $row) {
                                        ?>
                                        <div class="seccion_form" style="margin-top: -1%;">
                                            <label class="label_edit">Hora:</label><br>
                                            <input type="text" class="input_edit" name="hora" id="hora" placeholder="<?php echo $row['nombre_hora']; ?>">
                                            
                                            <div class="desc_form" style="margin-top:5%;">
                                                <label class="label_edit">Hora Inicio:</label><br>
                                                <input type="time" class="input_edit" name="horainicio" id="horainicio" placeholder="<?php echo $row['hora_inicio']; ?>" min="7:00" max="21:10" ><br>
                                                <label class="label_edit">Hora Fin:</label><br>
                                                <input type="time" class="input_edit" name="horafin" id="horafin" placeholder="<?php echo $row['hora_fin']; ?>" min="7:50" max="22:00">
                                            </div>
                                        </div>
                                        <div class="container_buttons">
                                        <button class="btn_action opt sep" type="submit" name="volver">Volver</button>
                                        <button class="btn_action opt" type="submit" name="edit">Editar</button>
                                        </div>
                                    </form>
                            </div>
                                    <?php
                                    } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>