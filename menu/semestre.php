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
	<title>Semestre</title>
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
                        <h3 class="h3_title">Semestre</h3><hr>
                    </div>
                    <div class="main_menu">
                        <div id="result" class="result"><?php include '../include/functions/get_info_semestre.php'; ?></div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>