 <?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
	header('Location: pages/home.php'); //REDIRECCIONA AL HOME
 									}
 								else{
?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | index</title>
<script src="js/jquery.min.js"></script>
<link href="css/style-index2.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kappe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body >
		<header id="index-header">
			<input type="checkbox" id ="btn-menu">
			<label for="btn-menu"> <img src="../images/menu.png" alt="menu"></label>
			<nav class="menu">
				<ul>
          			<li> <a href="pages/registrarse.php">Registrarse</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container-fluid">
               <!--FORMULARIO DE LOGIN -->
        <div class="single" id="index-login">
          <div class="top-single">
          	<center><img src="images/logo.png"></center>
				<h3>Iniciar sesión</h3>
				<div class="grid-single">
					<form action="pages/login.php" method="post">
						<div id="label-login">
						<p>Usuario</p>
						<div class="your-single">
							<i> </i>
							<input type="text" name="nombreusuario">
							<div class="clear"> </div>
						</div>
						<p>Contraseña</p>
						<div class="your-single">
							<i> </i>
							<input type="password" name="clave" >
							<div class="clear"> </div>
						</div>
						 
	                   	 <div>
	                   	 <input  id="btn-re"  class="button" type="submit" name="Enviar" value="Enviar">
	                   	
				    	</div>
						
						</div>
				     	</form>
				</div>
				<div class="clear"> </div>
			</div>			
    </div>
</body>
</html>
<?php 								}
?>
