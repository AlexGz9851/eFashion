<!DOCTYPE html>
<?php
    if(empty($_SESSION)){
        $_SESSION["count"]=-1;
    }
    include "dataSource/php/DBConnection.php";
    $dbo = new BaseDeDatos();
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>eFashion</title>
    <link href="dataSource/css/bootstrap.css" rel="stylesheet">
    <link href="dataSource/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="dataSource/css/stylesheet.css" rel="stylesheet">
    <script src="dataSource/js/functions.js"></script>
    <link rel='shortcut icon' href='dataSource/img/favicon.ico' type='image/x-icon'/>
</head>

<body id="page-top" class="index">

    <!-- Barra de menu -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#">Bisutería Michelle</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                            <a class="page-scroll dropdown-toggle" href="Productos">Productos</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="Productos/?tag=belleza">Belleza</a>
                                    </li>
                                    <li>
                                        <a href="Productos/?tag=bisuteria">Bisuteria</a>
                                    </li>
                                    <li>
                                        <a href="Productos/?tag=salud">Salud</a>
                                    </li>
                                    <li>
                                        <a href="Productos/?tag=accesorios">Accesorios</a>
                                    </li>                                    
                                </ul>
                        </li>
                                     <li>
                                        <a class="page-scroll" href="cart">Carrito<i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                     
                        <?php if(!isset($_SESSION['name'])): ?>
                        
                        <li>
                            <a class="page-scroll" href="LogIn">Iniciar Sesión</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="LogUp">Registro</a>
                        </li>
                         
                        <?php else: ?>
                            <li>
                                <a class="page-scroll" href="myPage">Compras</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="dataSource/php/LogOut.php">Salir</a>
                            </li>

                         <?php if($_SESSION['adm']): ?>                         
                         <li>
                            <a class="page-scroll" href="inventory">Editar productos</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="LogUp">Registrar Admin</a>
                        </li>

                        <?php endif;?>
                    <?php endif;?>               
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in">Belleza superior, a un click de distancia
                    <br><br><h1> Bisutería Michelle <h1><br>
                    </div>
                    <div class="intro-heading">Bienvenido!</div>
                </div>
        </div>
    </header>
        

    <!-- Seccion de tags -->
    <section id="Tags">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><i class="fa fa-tags"></i>Tags/Etiquetas</h2>
                </div>
            </div>
            <div class="row text-center">
            <div class="col-md-3">
                <a href="Productos?tag=belleza">
                    <div class="hover">
                        <span class="fa-stack fa-4x">
                            <!-- modiicar los icconos -->
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-female fa-stack-1x fa-inverse hover tagsFa"></i>
                        </span>
                        <h4 class="service-heading">Belleza</h4>
                    </div>
                </a>
                </div>
                <div class="col-md-3">
                    <a href="Productos?tag=bisuteria">
                        <div class="hover">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-heart fa-stack-1x fa-inverse tagsFa"></i>
                            </span>
                            <h4 class="service-heading">Bisutería</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="Productos?tag=salud">
                        <div class="hover">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-venus fa-stack-1x fa-inverse tagsFa"></i>
                            </span>
                            <h4 class="service-heading">Salud</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="Productos?tag=accesorios">
                        <div class="hover">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-shopping-bag fa-stack-1x fa-inverse tagsFa"></i>
                            </span>
                            <h4 class="service-heading">Accesorios</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php $var = $dbo->seeMost();?>
    <!-- Productos -->
    <section id="Most" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Más populares</h2>
                    <h3 class="section-subheading text-muted">Los productos más vendidos, tal vez algo te guste</h3>
                </div>
            </div>
                <?php for($x=0;$x<8;$x++): ?>
                    <?php if($x==0): echo('<div class="row img-container">'); endif; ?>
                    <div class="col-md-3 col-sm-6 products-item div-img">
                        <?php echo("<a href='#item' onclick="."\"showPopup('popup".$x."','fade".$x."');\""." class='products-link'>"); ?>
                            <?php echo("<img src='dataSource/img/productos/".$var[$x]['img']."' class='img-responsive img' alt='' width='719' height='925'>"); ?>
                        </a>
                                                
                        <div class="products-caption text">
                            <h4><?php echo($var[$x]['name'])?></h4>
                            <p class="text-muted">MXN $<?php echo($var[$x]['price'])?></p>
                        </div>
                    </div>
                    
                    <?php if(($x+1)%4==0): echo('</div><div class="row img-container">'); endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </section>
    <!--contacto -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contactanos!!!</h2>
                    <h3 class="section-subheading text-muted">Estamos ansiosos por conocerte. Llamanos al (+52) 332 312 2323</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" data-toggle="validator" role="form" action="index.php" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombre" id="name" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Correo (nombre@servidor.dominio)" id="email" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Telefono (10 digitos 1234567890)" id="phone" pattern="[0-9]{2}\d{8}" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="¿Que nos tienes que decir?" id="message" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-xl">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- mapita -->
    <section class="mapping">
            <div class="row ubicacion">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Sucursal Única</h2>
                    <h3 class="section-subheading text-muted">En el corazón de Guadalajara, en pleno Saint Jean de Deus</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 map" id="map">
                    <!--API DE GOOGLE-->
                    <script async defer 
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUEI_T5-7lkH0zRdHWsJ3gpbv1Dkw4mBc&callback=initMap">
                    </script>
                </div>
            </div>
    </section>

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
                        <li><a href="Privacidad">Politica de privacidad</a>
                        </li>
                        <li><a href="Ambiente">Politica ambiental</a>
                        </li>
                        <li><a href="who">¿Quienes somos?</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php for($x=0;$x<8;$x++): ?>
        <?php echo('<div class="popup" id="popup'.$x.'">') ?>
                <?php echo("<img src='dataSource/img/productos/".$var[$x]['img']."' class='img-responsive img' alt='' width='719' height='925'>"); ?>
                                    
            <div class="products-caption text">
                <h4><?php echo($var[$x]['name'])?></h4>
                <p class="small">En inventario: <?php echo((int)$var[$x]['inv'])?></p>
                <p class="text-muted"><?php echo ($var[$x]['descrip'])?></p>
                <p class="text-muted"><strong>MXN $<?php echo($var[$x]['price'])?></strongs></p>
                <?php echo('<form action="cart/index.php" method="post" id="form'.$x.'" onSubmit="return cart'.$x.'(document.getElementById(\'quantity'.$x.'\').value,document.getElementById(\'id'.$x.'\').value)">') ?>
                <?php echo('<input type="hidden" name="id" id="id'.$x.'" class="id" value="'.$var[$x]['id_prod'].'">'); ?></input>
                <?php if(!isset($_SESSION['my_cart'][$var[$x]['id_prod']])):?>                        
                        <div class="form-group">
                            <?php echo('<input type="number" name="quantity" id="quantity'.$x.'" class="quantity" min="1" max="'.(int)$var[$x]['inv'].'" placeholder="Cantidad" required>');  ?></input>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="submit" name="send" id="send" class="btn btn-xl" value="agregar al carrito"></input>
                    </form>
                <?php else: ?>
                        <table>
                            <tr>
                                <td class="cell" rowspan="2" width="50%" align="right">
                                    <div class="form-group">
                                        <?php echo('<input type="number" name="quantity" id="quantity'.$x.'" class="quantity" min="1" max="'.(int)$var[$x]['inv'].'" placeholder="Cantidad" value="'.$_SESSION['my_cart'][$var[$x]['id_prod']].'" required>');  ?></input>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </td>
                                <?php echo '<td><input type="submit" name="send" id="send'.$x.'" class="btn btn-primary modify" value="Modificar cantidad"></input></td>' ?>
                            </tr> 
                            <tr>                         
                                <?php echo '<td><input type="submit" name="send" id="send'.$x.'" class="btn btn-primary del" value="Quitar del carrito"></input></td>' ?>
                            </tr>
                        </table>
                    </form>
                <?php endif ?>
                <?php
                    echo("<script>");
                    echo('function cart'.$x.'(var1,var2){
                            var1 = parseInt(var1);
                            var2 = parseInt(var2);
                            if(Number.isInteger(var1) && var1<='.(int)$var[$x]['inv'].' && var2=='.$var[$x]['id_prod'].')
                                return true;
                            else{
                                alert("Porfavor actualice la pagina y vuelva a intentarlo");
                                return false;
                                }
                        }');
                    echo("</script>");
                ?> 
            </div>
        </div>
    <?php endfor; ?>
    <?php for($x=0;$x<8;$x++): ?>
        <?php echo('<div id="fade'.$x.'" class="fade" onClick="hidePopup(\'popup'.$x.'\',\'fade'.$x.'\');"></div>') ?>
    <?php endfor; ?> 

        <!-- jQuery -->
    <script src="dataSource/js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="dataSource/js/bootstrap.min.js"></script>

    <!-- Validator 
    <script src="dataSource/js/validator.min.js"></script>
    <script>
        $('#contactForm').validator();
        <?php //for($x=0;$x<8;$x++): echo("$('#form".$x."').validator();"); endfor;?>
    </script>-->
</body>

</html>
