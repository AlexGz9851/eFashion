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
    <link href="../dataSource/css/ambiente.css" rel="stylesheet">
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
                                        <a href="../Productos/?tag=salud">Salud </a>
                                    </li>
                                    <li>
                                        <a href="../Productos/?tag=accesorios">accesorios</a>
                                    </li>                                    
                                </ul>
                        </li>
                                     <li>
                                        <a class="page-scroll" href="../cart">Carrito<i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                     
                        <?php if(!isset($_SESSION['name'])): ?>
                        <li>
                                <a class="page-scroll" href="../myPage">Compras</a>
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
                </br></br></br>
                    <h2 class="section-heading"> 
                        <div class="intro-lead-in">
                        <h1>Politica ambiental<h1>
                        </div>
                        </h2>
                        <h3 class="section-subheading text-muted">
                            <p>Porque nos interesa el planeta</p>
                            <span class="fa-stack fa-4x">    
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-globe fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                </div>
            </div>
        </div>
    </header>
    <div class="row terminos">
            <div class="col-md-12"> 
                <div style="width: 900px" class="center-block">  
                  <p style="margin-top:15px;">
                En Bisuteria Michelle estamos comprometidos con la protección del medioambiente, ya que para nosotros es vital el respeto
                 al entorno que nos rodea y queremos ayudar al desarrollo sostenible de la sociedad. Éstas son algunas de las 
                 acciones u objetivos propuestos hasta la fecha dentro del compromiso con el Medioambiente que se incluye dentro
                 de la Responsabilidad Social Corporativa.
                 </p>

                <h3>EN LA TIENDA</h3><br>


                <h4>AHORRAMOS ENERGÍA: TIENDA ECOEFICIENTE</h4>
                <p>Desarrollamos un modelo de gestión ecoeficiente de tienda con el fin de reducir el consumo energético en un 20%,
                 integrando criterios de sostenibilidad y eficiencia energética, desde el diseño de la tienda, las instalaciones
                  de sistemas de iluminación, calefacción o refrigeración, al posible reciclaje del mobiliario y decoración. Así 
                  ayudamos a reducir las emisiones de CO2 y luchamos contra el cambio climático.</p>

                <h4>REDUCIMOS RESIDUOS Y RECICLAMOS: PROGRAMA REÚSEME </h4>

                <p>Bisuteria Michelle realiza una Gestión Integral de Residuos de Tienda. Las perchas y alarmas se recogen de los 
                establecimientos para convertirlos en otros elementos plásticos. Asimismo, todo el cartón y plástico 
                utilizado en los embalajes son reciclados.</p>


                <h4>FORMAMOS Y SENSIBILIZAMOS A NUESTROS EQUIPOS</h4>
                <p>Formamos continuamente a las plantillas para racionalizar el consumo de energía y sensibilizarles 
                medioambientalmente tanto en sus actividades profesionales como en su vida personal. Dichos planes se
                 llevan a cabo tanto a través de campañas de comunicación interna como mediante planes específicos de
                  formación multimedia.
                  </p>
                  

                <h3>EN LOS SERVICIOS AL CLIENTE</h3><br>  


                <h4>BOLSAS MÁS ECOLÓGICAS</h4>
                <p>Todas las bolsas de plástico que entregamos a los clientes son biodegradables, evitando la contaminación
                 que provoca el plástico convencional. El distintivo D2W asegura la biodegradación del 100% del plástico.<br>
                 </p>
                 <p>
                Asimismo, las bolsas de papel tienen el distintivo FSC, que garantiza que todo el proceso de producción,
                 desde la explotación de los bosques de donde proviene la materia prima hasta la entrega en tienda, cumple
                  con un riguroso respeto al medioambiente. </p>
                

                <h4>GENERAMOS INFORMACIÓN RECICLABLE</h4>
                <p>Todos los materiales de comunicación con nuestros clientes, desde los directorios de tiendas a los 
                formularios de búsqueda de personal, se confeccionan con papeles reciclados o con el distintivo FSC
                 o PEFP (certificado de garantía de gestión sostenible de los bosques).
                 </p>


                <h4>CALZADO SIN PVC</h4>

                <p>Nuestro compromiso medioambiental se hace extensivo al producto: trabajamos con materiales respetuosos
                 con el entorno. Un buen ejemplo es la fabricación de calzado libre de PVC.</p>


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
                        <li><a href="../who">¿Quienes somos?</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
</body>

</html>
