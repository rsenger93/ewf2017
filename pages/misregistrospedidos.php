<?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
include_once("../publicacionfiles/PublicacionCollector.php");
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
include_once("../registropedidofiles/RegistropedidoCollector.php");
include_once("../facturafiles/FacturaCollector.php");
include_once("../registroventafiles/RegistroVentaCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();
$registroPedidoCollectorObj = new RegistropedidoCollector();
$registroventaCollectorObj = new RegistroVentaCollector();
$FacturaCollectorObj = new FacturaCollector();

$us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);
$arrayRegistroPedido=$registroPedidoCollectorObj->showRegistroPedidosByUser($_SESSION['MiSesion']);
$arrayRegistroVenta=$registroventaCollectorObj->showRegistroVentasByUser($_SESSION['MiSesion']);
?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Mis Registros Pedidos</title>
<script src="../js/jquery.min.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kappe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="header">
		<div class="header-left header-left3">
			<div class="logo">
				<a href="index.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav">
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>	
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="publicacionesfavoritas.php" class="black2" > PUBLICACIONES FAVORITAS</a></li>
					<li ><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black3" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black3" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black4" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">
				<li><a href="https://www.facebook.com/Easy-Worthy-Food-1909652592590399/" target="_blank"><i 						class="facebook"> </i></a></li>
				<li><a href="https://twitter.com/ew_food" target="_blank"><i class="twitter"> </i></a></li>
			</ul>
			<p class="footer-class"> Copyright © 2017 Easy Worthy Food </p>
		</div>
		<div class="header-top">
			<div class="logo-in">
				<a href="index.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav-in">
			<span class="menu"><img src="../images/menu.png" alt=""> </span>
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>	
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="publicacionesfavoritas.php" class="black2" > PUBLICACIONES FAVORITAS</a></li>
					<li ><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black3" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black3" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black4" > SALIR</a></li>
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
		<div id="scroll-publi">
			<div class="single">
					<script src="js/responsiveslides.min.js"></script>
					<script>
						$(function () {
						  $("#slider4").responsiveSlides({
							auto: true,
							speed: 500,
							namespace: "callbacks",
				            pager: true,
						  });
						});
					</script>

					<?php if(count($arrayRegistroPedido)>0) { ?>  <!-- Busco si existen mis Pedidos -->
					<div class="comment-grid-top">
                        <h3>Mis Pedidos</h3>
                        <?php
                        foreach ($arrayRegistroPedido as $pedidos){

                        $arraypublicacion= $PublicacionCollectorObj->countPublicacionById($pedidos->getPublicacionId());
                    	if(count($arraypublicacion)>0){

                        
                        $publicacion= $PublicacionCollectorObj->showPublicacionById($pedidos->getPublicacionId());
                        $ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());	
                        $ObjFactura = $FacturaCollectorObj->showFacturaById($pedidos->getFacturaId());
						?>
                        <div class="projects">	
                            <ul>
                            <li> <p> <?php echo ($ObjPlatillo->getNombrePlatillo())?></p></li>
                            <li id="centrar-boton">Cantidad <p><?php echo ($pedidos->getCantidadPedido())?></p></li>
                            <li>Categoria <?php echo "<a class='button' id='btn-regresar' href='../pages/formulariofactura.php?idfactura=".$ObjFactura->getIdFactura()."'>Generar Factura </a>"; ?>
							<p><?php echo ($ObjPlatillo->getCategoriaDescripcion())?></p></li>
                            <li>Fecha <p><?php echo ($pedidos->getFechaPedido())?></p></li>		
                            </ul>
                        <div class="clear"> </div>
                        </div>
                       						  <?php  }            } ?>
				    </div>


													 <?php  } //FIN DEL IF MIS PEDIDOS 
													 	else{
													 ?>

					<div id="scroll-publi">
					<div class="work">
						<p>No hay registro de Pedidos</p>
					</div>
					</div>
												<?php 	  }   ?>
				<?php echo	"<br></br>" ?>

			<?php if(count($arrayRegistroVenta)>0) { ?>  <!-- Busco si existen mis Pedidos -->
					<div class="comment-grid-top">
                        <h3>Mis Ventas</h3>
                        <?php
                		foreach ($arrayRegistroVenta as $ventas){
						$publicacion= $PublicacionCollectorObj->showPublicacionById($ventas->getPublicacionId());
						$ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());
						?>
                        <div class="projects">	
                            <ul>
      				    <li> <p> <?php echo ($ObjPlatillo->getNombrePlatillo())?></p></li>
                        <li id="centrar-boton">Cantidad <p><?php echo ($ventas->getCantidadVenta())?></p></li>	
                        <li>Comprado por <p><?php echo ($ventas->getCUsuario())?></p></li>
                        <li>Fecha <p><?php echo ($ventas->getFechaVenta())?></p></li>	
                            </ul>
                        <div class="clear"> </div>
                        </div>
                       									 <?php   } ?>
				    </div>
													 <?php  } //FIN DEL IF MIS PEDIDOS 
													 	else{
													 ?>

					<div id="scroll-publi">
					<div class="work">
						<p>No hay registro de Ventas</p>
					</div>
					</div>
												<?php 	  }   ?>								
  			</div>
    	 </div>
		<div class="clear"> </div>
    <p class="footer-class-in">Copyright © 2017 Easy Worthy Food </p>
</div>
</body>
</html>
<?php
 }
 else{
header('Location: ../index.php'); //REDIRECCIONA AL INDEX
}
 ?>
