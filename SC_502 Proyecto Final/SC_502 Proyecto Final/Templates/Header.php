<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>LubriCentro</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" />

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>





</head>

<body>
    <header>
        <!-- informacion de la empresa -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="tel:50600000000"><i class="fa fa-phone"></i> (+506) 2206-8600</a></li>
                    <li><a href="mailto:Example@outlook.com?Subject=Interested%20in%20the%20products"><i
                                class="fa fa-envelope-o"></i>Example@outlook.com</a></li>
                </ul>
                <ul class="header-links pull-right">
                <?php if(!isset($_SESSION)){
                        session_start();
                        }
                        
                 if(isset($_SESSION['user'])){ ?>
                    <li><a href="DAL/cuenta.php"><i class="fa fa-user-o"></i> Mi cuenta </a></li>
                    <li><a href="DAL/Logout.php"><i class="fa fa-user-o"></i> Cerrar Sesión </a></li>
                <?php }else{?>
                    <li><a href="Login.php"><i class="fa fa-user-o"></i> Iniciar Sesión</a></li>
                    <?php }?>
                </ul>
            
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <div class="container">
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="index.php" class="logo">
                                <h1 style="color: white">Lubri<span style="color: red">C</span>entro</h1>

                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- BARRA BUSQUEDA -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>

                                <input class="input" placeholder="Busque aquí">
                                <button class="search-btn">Buscar</button>
                            </form>
                        </div>
                    </div>
                    <!-- /BARRA BUSQUEDA -->
                </div>
            </div>
        </div>
    </header>