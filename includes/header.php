	<!-- HEADER -->
	<?php
	if (!isset($_SESSION)) {
		session_start();
	  }
	  $uno='';
	if (isset($_SESSION['usuario']) && ($_SESSION['usuario']!='') && 
	isset($_SESSION['ide']) &&($_SESSION['ide']!='') && 
	isset($_SESSION['acceso'])
	) {
		$uno="<li class='derecha'><a href='controlador/logout.php' class='btn btn-info' type='button'>Cerrar Seccion</a></li>
		<li class='userr'><i class='fa fa-user-circle'></i>  ".$_SESSION['usuario']."</li>
		";
	}
	else{
		$uno= "<li class='derecha'><button class='btn btn-info' data-toggle='modal' data-target='#iniciar_seccion' type='button'>Iniciar Seccion</button></li>";
		$uno=$uno."<li class='derecha'><button class='btn btn-info' data-toggle='modal' data-target='#registrarse' type='button'>Registrarse</button></li>";
	}
	require_once('modales.php');
	?>
    <header>
			<section class="wrapper">
				<nav>
					<ul>
						<li><a href="#">Acerca de Nosotros</a></li>
						<li><a href="index.php">Productos</a></li>
						<?php
						echo $uno;
						?>
						
					</ul>
				</nav>
				</section>
		</header>

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							
								<a href="#" class="logo">
									<img class="img-logo" src="./img/SI_20190212_114305.jpg" alt="">
								</a>
							
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
												<i class="fa fa-shopping-cart"></i>
												<span>Your Cart</span>
												<div class="qty">3</div>
									</a>
									
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">comal grande </a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">comal chico</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

							
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
	
		<!-- /HEADER -->
