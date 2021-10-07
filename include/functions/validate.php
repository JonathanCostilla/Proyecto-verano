<?php

	if(isset($_POST["submit"])){

		include '../private/conn.php';
			
		// Variables
		$mat 		=		$_POST['user'];
		$password 	= 		$_POST['password'];

		$user = new Database();

		if($resultado=$user->search("admin","matricula = '$mat' AND password = '$password'")){
			
			session_start();

			foreach ($resultado as $res) {
				$_SESSION['matricula']	=	$res['matricula'];
				$_SESSION['nombre']		=	$res['nombre'];
				$_SESSION['apellido']	=	$res['apellido'];
				$_SESSION['var'] 		= 	0;
				$_SESSION['verified']	=	1;
			}

			header("Location: ../../menu/home.php");
			
		}
		else{
			header("Location: ../../index.php?login=1");
		}

	}
	
?>