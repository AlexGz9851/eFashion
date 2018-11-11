<!DOCTYPE html>
<html lang="es">

<?php if(isset($_SESSION['name'])):
        header('Location: ../index.php'); ?>

<?php else:?>
<head>
    <meta charset="utf-8">
    <title>eFashion</title>
    <link href="../dataSource/css/bootstrap.css" rel="stylesheet">
    <link href="../dataSource/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="../dataSource/css/products.css" rel="stylesheet">
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
                            <a class="page-scroll" href="#">Iniciar Sesión</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="../LogUp">Registro</a>
                        </li>
                         
                        <?php else: ?>
                            <li>
                                <a class="page-scroll" href="../myPage">Bienvenido <?php echo $_SESSION['name']?></a>
                            </li>
                            <li>
                                <a class="page-scroll" href="../IDWproyecto/dataSource/php/LogOut.php">Cerrar Sesión</a>
                            </li>

                         <?php if($_SESSION['adm']): ?>                         
                         <li>
                            <a class="page-scroll" href="../myPage">Opciones de admin</a>
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
                    Iniciar Sesión
                    </h2>
                    <h3 class="section-subheading text-muted">
                        Yei, si tenemos usuarios :')
                        <br><br>
                        <br><br>
                    <br><br>
                    </h3>
                </div>
            </div>
        </div>
    </header>
 <!--formulario de inicio-->
    <section id="registro" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                            <form name="logUp" method="POST"  id="logupForm" action="../dataSource/php/LogIn.php">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="btn btn-xl">Iniciar sesión <i class="fa fa-sign-in  fa-2x"></i></button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </section>
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
        <!--jquery -->
       <script src="../dataSource/js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="../dataSource/js/bootstrap.min.js"></script>

    <!-- Validator -->
    <script src="../dataSource/js/validator.min.js"></script>


    <?php
    if(isset($_GET['err']))
                echo('<script>
                        alert("Revise la información introducida");
                        $("#usuario").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                        $("#pass").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
        ?>
</body>
<?php endif;?>
</html>
