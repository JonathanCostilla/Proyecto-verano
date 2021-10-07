 <!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../include/css/home.css">

	<title>Home | Inicio</title>
</head>
<body class="body">
	<div class="header">
		<div class="img_slogan"><img src="../include/css/img/slogan.png" alt="" class="img"></div>
		<div class="container_menu">
		<?php
		include '../include/menu_opt.php';
		?>
		</div>
	</div>
	<?php  
	session_start();
	if($_SESSION['verified'] == 0){
		header('Location: ../index.php');
	}
	if($_SESSION['var'] == 0){
	?>
	<div class="welcome">
		<div class="row justify-content-center pt-5 mt-5 mr-1">
			<div class="col-md-12 form- div-login pt-4 pb-5">
				<h1 class="h2_welcome">Bienvenido
		<?php
        echo $_SESSION['nombre'];
		?>
				</h1>
			</div>
		</div>
	</div>
	<?php
	}
	?>
</body>
</html>