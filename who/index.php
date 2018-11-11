<!DOCTYPE html>
<html lang="es">
<?php
    session_start();?>

<head>
    <meta charset="utf-8">
    <title>eFashion</title>
    <link href="../dataSource/css/bootstrap.css" rel="stylesheet">
    <link href="../dataSource/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="../dataSource/css/privacidad.css" rel="stylesheet">
    <link rel='shortcut icon' href='../dataSource/img/favicon.ico' type='image/x-icon'/>
</head>

<body id="page-top" class="index" style="text-align: justify">

<!-- Barra de menu -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="../">Bisutería Michelle</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                            <a class="page-scroll dropdown-toggle" href="../Productos">Productos</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="../Productos/?tag=belleza">Belleza</a>
                                    </li>
                                    <li>
                                        <a href="../Productos/?tag=bisuteria">Bisuteria</a>
                                    </li>
                                    <li>
                                        <a href="../Productos/?tag=salud">Salud</a>
                                    </li>
                                    <li>
                                        <a href="../Productos/?tag=accesorios">Accesorios</a>
                                    </li>                                    
                                </ul>
                        </li>
                                     <li>
                                        <a class="page-scroll" href="../cart">Carrito<i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                     
                        <?php if(!isset($_SESSION['name'])): ?>
                        
                        <li>
                            <a class="page-scroll" href="../LogIn">Iniciar Sesión</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="../LogUp">Registro</a>
                        </li>
                         
                        <?php else: ?>
                            <li>
                                <a class="page-scroll" href="../myPage">Compras</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="../dataSource/php/LogOut.php">Salir</a>
                            </li>

                         <?php if($_SESSION['adm']): ?>                         
                         <li>
                            <a class="page-scroll" href="../inventory">Editar productos</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="../LogUp">Registrar Admin</a>
                        </li>

                        <?php endif;?>
                    <?php endif;?>                
                </ul>
            </div>
        </div>
    </nav>


     <!--Cabecera-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"> 
                    <br><br>
                    <br><br>
                    ¿Quienes somos?
                    </h2>
                        <h3 class="section-subheading text-muted">
                            <p>Porque sabemos que nos quieres conocer</p>
                            <span class="fa-stack fa-4x">    
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-shopping-bag fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                </div>
            </div>
        </div>
    </header>
    <div class="row terminos">
        <div class="col-md-12"> 
            <div style="width: 900px" class=" center-block" >
                <p style="margin-top:20px;">
                    <b>LA EMPRESA:</b> Somos una distribuidora 100% Mexicana, que ofrece los mejores productos de belleza y bisutería del mercado.
                </p>
                <p>
                    <b>LA CALIDAD:</b> Las operaciones de comercio se presentan de forma dinámica, lo que implica un proceso de evolución y cambio constante, lo cual asumimos en cada embarque, estableciendo procesos abiertos y prácticos que nos permiten atender las particularidades en cada operación con un alto sentido de calidad y responsabilidad, cuidando los detalles y las actualizaciones en cada una de las operaciones.
                </p>
                <p>
                    <b>LOS COSTOS:</b> Representa la columna vertebral en los procesos de operación. Estamos concientes de la importancia que reviste y sus impactos en la competitividad de nuestros clientes, por lo cual, nos ocupamos de buscar las mejores alternativas de precios que puedan reflejarse en costos más bajos.
                </p>
                <p>
                    <b>LA ATENCIÓN:</b> El seguimiento puntual y personalizado de las operaciones, nos permite generar información confiable y actualizada del estatus de cada embarque, manteniendo un puente de comunicación activa con nuestros clientes, para responder a las necesidades y exigencias que requieran ser atendidas en cada caso y proceso. La Dirección de nuestra empresa es ejecutada por profesionales capacitados y con reconocida experiencia en el ramo.
                </p>
                <p>
                    <b>LOS RESULTADOS:</b> Ofrecemos que cada operación responda a las expectativas del cliente, estableciendo una constante evaluación entre el servicio ofrecido y los resultados obtenidos, detectando áreas que puedan mejorarse y responder con mayor eficiencia y eficacia a los requerimientos de nuestros clientes.
                </p>

            </div>
        </div>
    </div>





    <!--Pie de pagina-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; eFashion</span>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <ul class="list-inline quicklinks">
                        <li><a href="../Privacidad">Politica de privacidad</a>
                        </li>
                        <li><a href="../Ambiente">Politica ambiental</a>
                        </li>
                        <li><a href="#">¿Quienes somos?</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
</body>

</html