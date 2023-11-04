<?php 
 include 'templates/Header.php';  
 
?>


<!-- NAVEGACION ---- pestañas de navegación-->
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Inicio</a></li>
                <li><a href="#">Aceites</a></li>
                <li><a href="#">Accesorios</a></li>
                <li><a href="#">Componentes</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- /NAVEGACION -->

<!-- SECTION -------- panel donde se muestra todos los productos -->
<div class="section">
    <div class="container">
        <div class="row">
            <!-- PRODUCTO -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img"> 
                        <img src="img/aceite3.jpeg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Aceites<br>Colección</h3>
                        <a href="#tab1" class="cta-btn">Comprar ya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /PRODUCTO -->

            <!-- PRODUCTO -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="img/filtros1.jpeg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Accesorios<br>Colección</h3>
                        <a href="#tab1" class="cta-btn">Comprar ya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /PRODUCTO -->

            <!-- PRODUCTO -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="img/recolector2.jpeg" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>Componentes<br>Colección</h3>
                        <a href="#tab1" class="cta-btn">Comprar ya <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /PRODUCTO -->
        </div>
    </div>
</div>
<!-- /SECTION ---- /panel donde se muestran todos los productos-->



<?php
include 'templates/Footer.php';
?>


