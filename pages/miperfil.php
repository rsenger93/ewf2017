 <?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../amigofiles/AmigoCollector.php");
include_once("../publicacionfiles/PublicacionCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$AmigoCollectorObj = new AmigoCollector();
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();
$us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);
$ArrayAmigo=$AmigoCollectorObj->showAmigosByUser($_SESSION['MiSesion']);


?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Mi Perfil</title>
<!-- jQuery-->
<script src="../js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kappe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
<!--//fonts-->

</head>
<body>
	<div class="header">
		<div class="header-left header-work">
			<div class="logo">
				<a href="home.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav">
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li  ><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="publicacionesfavoritas.php" class="black2"> PUBLICACIONES FAVORITAS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4" > NUEVAPUBLICACION</a></li>
					<li class="active"><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">

			</ul>
			<!--modificado copyright a ewf-2017-->
			<p class="footer-class">Copyright © 2017 Easy Worthy Food</p>
		</div>
		<!---->
		<div class="header-top">
			<div class="logo-in">
				<a href="home.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav-in">
			<span class="menu"><img src="../images/menu.png" alt=""> </span>
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li><a href="home.php">HOME</a></li>
					<li><a href="muro.php" class="black"> MURO</a></li>
					<li><a href="amigos.php" class="black2"> EWF FAVORITOS</a></li>
					<li><a href="publicacionesfavoritas.php" class="black2"> PUBLICACIONES FAVORITAS</a></li>
					<li><a href="mispublicaciones.php" class="black2"> MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4"> NUEVAPUBLICACION</a></li>
					<li class="active"><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
				<script>
					$("span.menu").click(function(){
						$(".top-nav-in ul").slideToggle(500, function(){
						});
					});
			</script>

			</div>
			<div class="clear"> </div>
		</div>
			<!---->
		<div class="content">
			<div class="work">
				<div class="work-top">
				<script src="js/responsiveslides.min.js"></script>
					<script>
						$(function () {
						  $("#slider").responsiveSlides({
							auto: true,
							speed: 500,
							namespace: "callbacks",
								pager: true,
						  });
						});
					</script>
					<div>

						<?php
						//print_r($us->getImgUsuario());
						?>
						<div class="callbacks_container">
						  <ul class="rslides" id="slider">
							<li>
							  <img src="<?php echo '../'.$us->getImgUsuario();?>" alt="" height="200" width="350">

							</li>
						  </ul>
					  </div>
					</div>
					<h2><a href="single.html">¿QUIEN SOY?</a></h2>
					
					<p id="lbl-descrip"><?php echo $us->getUsuarioDescripcion()?></p>

				<div id="scroll-publi"> <!-- DIV SCROLL -->
				<div class="projects">
					<h3>Ewf Favoritos</h3>
					<ul>
				<?php
				foreach ($ArrayAmigo as $amigo){ //TODOS LOS AMIGOS
			    $ObjUsuario = $UsuarioCollectorObj->showUsuarioById($amigo->getUSuarioId());// CARGO LOS DATOS DEL USUARIO
			    ?>
			    <?php echo "<li><a href='../pages/publicacionesamigo.php?idusuario=".$ObjUsuario->getIdUsuario()."'> <img id='img-perfilamigo' src='../".$ObjUsuario->getImgUsuario()."' alt='wo' /></a></li>"; ?>



				<?php  } ?> <!-- FIN DEL FOREACH TODOS LOS AMIGOS -->
					</ul>
                    <div class="clear"> </div>
				</div>
				</div>
				</div>
				<div class="work-in">
					<div class="info">
					<h3>Datos Generales</h3>
						<ul class="likes">
							<li><p><i > </i>Nombre</p>
							<p > <?php echo $us->getNombreCompleto() ?></p>
							</li>
							<li><p><i class="like"> </i>Nombre de usuario</p>
							<p > <?php echo $us->getNombreUsuario() ?></p>
							</li>
							<li><p><i class="like"> </i>Edad</p>
							<p > <?php echo $us->getEdad() ?></p>
							</li>
							<li><p><i class="dec"> </i>Correo</p>
							<p > <?php print_r($us->getCorreo()); ?></p>
							</li>
							<li><p href="#"><i class="comment"> </i>Telefono</p>
							<p > <?php echo $us->getTelefono() ?></p>
							</li>
							<li><p href="#"><i class="comment"> </i>Direccion</p>
							<p > <?php echo $us->getDireccionDescripcion() ?></p>
							</li>
							<li>
							<a id="btn-re" href="formularioeditarusuario.php" class="button">Editar</a>
							</li>


						</ul>
					</div>

					<div class="gallery">
					<h3>Mis Publicaciones</h3>
						<ul class="gallery-grid">
								<?php
							$arrayPublicacionPorUsuario = $PublicacionCollectorObj->showPublicacionByIdUser($us->getIdUsuario());
							foreach ($arrayPublicacionPorUsuario as $publicacionporusuario){
							$ObjPlatilloUser = $PlatilloCollectorObj->showPlatilloById($publicacionporusuario->getPlatilloId());// CARGO LOS DATOS DEL PLATILLO
			    			?>
							<li><a href="miperfil.php"><img  id="mini-publicacion" src="<?php echo '../'.$ObjPlatilloUser->getImgPlatillo();?>" alt="3" /></a></li>

							<?php  } ?> <!-- FIN DEL FOREACH PUBLICACIONES POR USUARIO-->
						</ul>
                        <div class="clear"> </div>
					</div>

				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="clear"> </div>
		<!--modificado copyright a ewf-2017-->
		<p class="footer-class-in">Copyright © 2017 Easy Worthy Food</p>
	</div>
</body>
</html>
<?php
 }
 else{
header('Location: ../index.php'); //REDIRECCIONA AL INDEX
}
 ?>
