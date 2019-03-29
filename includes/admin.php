<?php
require_once('modal_agregar.php');
?>
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->

				<div class="row">
						<div class="col-md-6" style="margin-left: 22%;">
								<div class="header-search">
									<form action='#' id='buscarp'>
										<select id='categ' name='categ' class="input-select">
											<option value="">Todas las categorías</option>
											<option value="1">BARRO</option>
											<option value="2">PALMA</option>
											<option value="3">PIEDRAS</option>
											<option value="4">CUERO</option>
										</select>
										<input id='busca' name='busca' class="input" placeholder="Buscar">
										<button type='submit' name='bsc' id='bsc' class="search-btn">Buscar</button>
									</form>
								</div>
							</div>

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
                            <center><h3 class="title" >PANEL ADMINISTRADOR</h3><br></center>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li><a id='barro'  href="javascript:cargar_data();">BARRO</a></li>
									<li><a id='palma' href="javascript:cargar_data(2);">PALMA</a></li>
									<li><a id='piedras'  href="javascript:cargar_data(3);">PIEDRAS</a></li>
									<li><a id='cuero'  href="javascript:cargar_data(4);">CUERO</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
					<button type='button' data-opp=1 class='btn btn-primary' data-toggle="modal" data-target="#nuevo">Agregar Nuevo</button>
						<div class="row">
							<div id="cont">
								
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<script>
$(document).ready(function () {
	cargar_data();
	
});
function cargar_data(op=1) {
	$.ajax({
        url:'controlador/cargar_articulos.php',
        type:'POST',
		dataType:'html',
        data:{
			cargar:op
		},
        success:function (msj) {

		  $('#cont').html(msj);   
		  reload();   
        }
    }) 
}



function reload() {
		// Products Slick
		$('.products-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			infinite: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
			responsive: [{
	        breakpoint: 991,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 1,
	        }
	      },
	      {
	        breakpoint: 480,
	        settings: {
	          slidesToShow: 1,
	          slidesToScroll: 1,
	        }
	      },
	    ]
		});
	});

	// Products Widget Slick
	$('.products-widget-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			infinite: true,
			autoplay: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
		});
	});

	/////////////////////////////////////////

	// Product Main img Slick
	$('#product-main-img').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#product-imgs',
  });

	// Product imgs Slick
  $('#product-imgs').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
		centerPadding: 0,
		vertical: true,
    asNavFor: '#product-main-img',
		responsive: [{
        breakpoint: 991,
        settings: {
					vertical: false,
					arrows: false,
					dots: true,
        }
      },
    ]
  });

}

$('#buscarp').submit(function (event) {
	event.preventDefault();
	if (($('#categ').val()!='') && ($('#busca').val()!='')) {
		let Dat=$(this).serialize();
			$.ajax({
					url:'controlador/buscar_producto.php',
					type:'POST',
					data:Dat,
					success:function (msj) {
						$('#cont').html(msj);  
						reload(); 
					}
			});
	}
	else{
		alert('nesecita ingresar datos para poder buscar');
	}
});

</script>