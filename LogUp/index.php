<?php session_start(); ?>
!DOCTYPE html>
<html lang="es">





<head>
    <meta charset="utf-8">
    <title>eFashion</title>
    <link href="../dataSource/css/bootstrap.css" rel="stylesheet">
    <link href="../dataSource/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="../dataSource/css/logup.css" rel="stylesheet">
    <link rel='shortcut icon' href='../dataSource/img/favicon.ico' type='image/x-icon'/>

    <script type="text/javascript" src="../dataSource/js/jvalidacion.js"> </script>
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
                                        <a href="?tag=belleza">Belleza</a>
                                    </li>
                                    <li>
                                        <a href="?tag=bisuteria">Bisuteria</a>
                                    </li>
                                    <li>
                                        <a href="?tag=salud">Salud</a>
                                    </li>
                                    <li>
                                        <a href="?tag=accesorios">Accesorios</a>
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
                            <a class="page-scroll" href="#">Registro</a>
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
                            <a class="page-scroll" href="#">Registrar Admin</a>
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
                    <?php if(!isset($_SESSION['adm'])): ?>
                    Registrate :D
                    <br><br><br>
                    </h2>
                    <h3 class="section-subheading text-muted">
                        Porfavor, te lo rogamos ;-;
                        <br><br>
                        <br><br>
                    </h3>
                    <?php else: ?>
                    Registrar a un nuevo administrador
                    <br><br><br>
                    </h2>
                    <h3 class="section-subheading text-muted">
                        ¿Alguien nuevo? Agregalo al sistema :D
                        <br><br>
                        <br><br>
                    </h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    </nav>
    <!--formulario de registro-->
    <section id="registro" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <form name="logUp" id="logupForm" method="POST" onsubmit="return validacion()" action="../dataSource/php/Registro.php">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" placeholder="Usuario" id="user" name="user">
                        <input type="email" class="form-control" placeholder="Correo"  id="email" name="email">
                        <input type="password" class="form-control" placeholder="Contraseña (8 caracteres minimo con minimo 1 mayuscula, minuscula, un numero y un guión)" id="pass" name="pass">
                        <input type="password" class="form-control" placeholder="Repite tu Contraseña" id="pass2" name="pass2">
                        <input type="text" class="form-control" placeholder="Nombre" id="name" name="name">
                        <input type="text" class="form-control" placeholder="Apellido" id="Ap" name="Ap">
                        <input type="text" class="form-control" placeholder="Domicilio" id="adress" name="adress">
                        <input type="text" class="form-control" placeholder="Estado" id="estado" name="Estado">
                        <input type="text" class="form-control" placeholder="Municipio" id="municipio" name="Municipio">    
                        <p><label id="bancaria">Información bancaria:</label></p>
                        <select  name="banco" style="margin-bottom: 20px;" class="form-control">
                                <option value="0"> Seleccione un tipo de tarjeta </option>
                                <option value="1"> American Express </option>
                                <option value="2"> VISA </option>
                                <option value="3"> Master Card </option>
                                    
                        </select>
                        <!--<input type="Text" class="form-control" id="banco" placeholder="Banco" name="banco">-->
                        
                        <input type="text" class="form-control" id="Tarjeta" placeholder="Numero de tarjeta de crédito" name="Tarjeta" pattern="^[1-9][0-9]{14}[0-9]$">


                        <input type="number" class="form-control" id="CSV" placeholder="CSV" name="CSV" min="000" max="999" pattern="^[0-9][0-9]{1}[0-9]$">
                        <input type="number" class="form-control" id="mesV" placeholder="Mes de vencimiento" name="Mes" min="01" max="12" pattern="^[0-9][0-9]{1}[0-9]$">
                        <input type="number" class="form-control" id="yearV" placeholder="Año de vencimiento" name="Year" min="2016" max="2030" pattern="^[0-9][0-9]{1}[0-9]$">

                       
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-xl">Registrarse <i class="fa fa-user-plus text-primary fa-2x"></i></button>
                    </div>
                </form>
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
            if(isset($_GET['userex']))
                echo('<script>
                        $("#user").attr("placeholder", "Usuario ya registrado, intente con otro").val("").focus().blur();
                        $("#user").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['emailex']))
                echo('<script>
                        $("#email").attr("placeholder", "Correo ya registrado, intente con otro").val("").focus().blur();
                        $("#email").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['name']))
                echo('<script>
                        $("#name").attr("placeholder", "Por favor revise el nombre introducido").val("").focus().blur();
                        $("#name").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['ln']))
                echo('<script>
                        $("#Ap").attr("placeholder", "Por favor revise el apellido introducido").val("").focus().blur();
                        $("#Ap").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['dom']))
                echo('<script>
                        $("#adress").attr("placeholder", "Porfavor revise el domicilio introducido").val("").focus().blur();
                        $("#adress").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['est']))
                echo('<script>
                        $("#estado").attr("placeholder", "Por favor revise el estado introducido").val("").focus().blur();
                        $("#estado").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['mun']))
                echo('<script>
                        $("#municipio").attr("placeholder", "Porfavor revise el municipio introducido").val("").focus().blur();
                        $("#municipio").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['usr']))
                echo('<script>
                        $("#user").attr("placeholder", "No se aceptan caracteres especiales").val("").focus().blur();
                        $("#user").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['mail']))
                echo('<script>
                        $("#email").attr("placeholder", "Porfavor revise el correo introducido").val("").focus().blur();
                        $("#email").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['psd']))
                echo('<script>
                        $("#pass").attr("placeholder", "Contraseña invalida (8 caracteres minimo, minimo una mayuscula, minuscula, un numero y un guión)").val("").focus().blur();
                        $("#pass").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['conf']))
                echo('<script>
                        $("#pass2").attr("placeholder", "Revise que la confirmación sea correcta").val("").focus().blur();
                        $("#pass2").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                        $("#pass").attr("style", "background-color:#ff9e9e;").val("").focus().blur();
                    </script>');
            if(isset($_GET['bnc']))
                echo('<script>
                        alert("Revise la información banaria introducida");
                        $("#bancaria").attr("style", "color:#ff9e9e;").val("").focus().blur();
                    </script>');
        ?>
</body>

</html>
