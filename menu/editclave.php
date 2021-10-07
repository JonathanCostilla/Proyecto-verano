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
	<title>Clave de la materia</title>
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
                        <h3 class="h3_title">Clave de la materia</h3><hr>
                    </div>
                    <div class="main_menu">
                        <div id="result" class="result">
                            <div class="container_form">
                                <form action="../include/functions/process_clave.php" method="post">
                                        <?php
                                        include '../include/private/conn.php';
                                        session_start();
                                        if(!$_SESSION['verified']){
                                            header("Location: ../index.php");
                                        }
                                            $user = new Database();
                                            $id = $_GET['inf'];
                                            $_SESSION['idclave'] = $id;
                                            $resultado=$user->search("clavemateria", "$id = id_clavemateria");
                                            foreach ($resultado as $row) {
                                                ?>
                                        <div class="seccion_form">
                                        <label class="label_edit">Clave:</label><br>
                                        <input type="text" class="input_edit" name="clave" id="clave" placeholder="<?php echo $row['nombre_clave']; ?>">
                                        
                                        <div class="desc_form">
                                        <label class="label_edit">Descripción:</label><br>
                                        <input type="text" class="input_edit" name="desc" id="clave" placeholder="<?php echo $row['descripcion']; ?>">
                                        </div>
                                        </div>
                                        <div class="container_buttons">
                                        <button class="btn_action opt sep" type="submit" name="volver">Volver</button>
                                        <button class="btn_action opt" type="submit" name="edit">Editar</button>
                                        </div>
                                    </form>
                            </div>
                                    <?php
                                            }
                                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>