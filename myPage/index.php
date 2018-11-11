<?php 
    include "../dataSource/php/DBConnection.php";
    $db = new BaseDeDatos(); 
?>
<!DOCTYPE html>
<html lang="es">

    <?php if(!isset($_SESSION['name'])):
        header('Location: ../index.php'); ?>

<?php 
else:
    $id = $db->getUserID($_SESSION['user']);
    $id = $id[0]['id'];
?>

<head>
    <meta charset="utf-8">
    <title>eFashion</title>
    <link href="../dataSource/css/bootstrap.css" rel="stylesheet">
    <link href="../dataSource/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="../dataSource/css/myPage.css" rel="stylesheet">
    <script src="../dataSource/js/functions.js"></script>
    <link rel='shortcut icon' href='../dataSource/img/favicon.ico' type='image/x-icon'/>
</head>

<body id="page-top" class="index">

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
                                        <a href="../Productos/?tag=tecnologia">Tecnologia</a>
                                    </li>
                                    <li>
                                        <a href="../Productos/?tag=accesorios">Accesorios</a>
                                    </li>
                                    <li>
                                        <a href="../Productos/?tag=ropa">Ropa</a>
                                    </li>
                                    <li>
                                        <a href="../Productos/?tag=juegos">Juegos</a>
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
                </br></br></br>
                    <h2 class="section-heading"> 
                        <div class="intro-lead-in">
                        <h1>Tu cuenta<h1>
                        </div>
                        </h2>
                        <h3 class="section-subheading text-muted">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-user-secret fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                </div>
            </div>
        </div>
    </header>
    <?php $tickets=$db->myTickets($id); ?>
    <section class="bg-light-gray">
        <div class="container">
            <div class="row">
            <?php foreach ($tickets as $key => $val): $compras=$db->misCompras($val['id_ticket']); ?>
                <div class="col-md-4">
                    <p><b>Detalles de la compra <?php echo($val['id_ticket']); ?>:</b> </p> 
                </div>
                <div class="col-md-3">
                    <p><b>Fecha de compra:</b> <?php echo($val['fecha']); ?></p>
                </div>
                <div class="col-md-3">
                    <p><b>Fecha de recepción:</b> <?php echo($val['fecha_ent']); ?></p>
                </div>
                <div class="col-md-2">
                    <?php echo('<button data-toggle="collapse" data-target="#demo'.$key.'"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>') ?>
                </div>
                <?php echo('<div class="collapse col-md-12" id="demo'.$key.'">') ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th style="width:10%;">Cantidad</th>
                            <th>Precio</th>
                        </tr>
                        <?php foreach($compras as $obj):
                            $item=$db->lookID($obj['id_prod']);
                            $item=$item[0];
                            ?>
                            <tr>
                                <td><?php echo($item['id_prod']); ?></td>
                                <td><?php echo($item['name']); ?></td>
                                <td style="width:15%;"><?php echo($obj['cant']); ?></td>
                                <td><?php echo($item['price']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="width:20%;text-align:right;"><b>Precio Total:&nbsp&nbsp</b></td>
                                <td><?php echo($val['precio_int']); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="width:20%;text-align:right;"><b>Precio Total con descuento:&nbsp&nbsp</b></td>
                                <td><?php echo($val['precio_final']); ?></td>
                            </tr>
                    </table>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Pie de pagina -->
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
            <!-- jQuery -->
    <script src="../dataSource/js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="../dataSource/js/bootstrap.min.js"></script>

    <!-- Validator -->
    <script src="../dataSource/js/validator.min.js"></script>
    

</body>
<?php endif;?>
</html>
