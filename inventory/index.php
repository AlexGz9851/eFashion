<?php 
    include "../dataSource/php/DBConnection.php";
    $db = new BaseDeDatos(); 
?>
<!DOCTYPE html>
<html lang="es">

    <?php if(!isset($_SESSION['name'])):
        header('Location: ../index.php');
    elseif($_SESSION['adm']==0):
        header('Location: ../index.php');
         ?>

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
                                        <a href="../productos/?tag=accesorios">Accesorios</a>
                                    </li>
                                    <li>
                                        <a href="../productos/?tag=salud">Salud</a>
                                    </li>
                                    <li>
                                        <a href="../productos/?tag=bisuteria">Bisuteria</a>
                                    </li>
                                    <li>
                                        <a href="../productos/?tag=belleza">Belleza</a>
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
                            <a class="page-scroll" href="#">Editar productos</a>
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
                        <br>
                        <h1>Inventario tienda<h1>
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
<!--   <?php $products=$db->AllProducts(); var_dump($products);?>-->
    <section class="bg-light-gray">
        <div class="container">
            <div class="row" style="background-color:lightgray;">
                <div class="col-md-4" >
                    <p><b>Agregar nuevo producto:</b> </p> 
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-2 text-right">
                    <button data-toggle="collapse" data-target="#demo-5"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="row" style="background-color:#bdbdbd;">
                <div class="collapse col-md-12" id="demo-5">
                    <form name="newProduct" method="POST" enctype="multipart/form-data" action="../dataSource/php/newProduct.php">
                        <input type="text" class="form-control" id="name" name="name" tabindex="1" placeholder="Nombre" required><br>
			    	    <textarea class="form-control" name="Descripcion" rows="5" cols="30" tabindex="2" placeholder="Descripción del producto"></textarea></br>
	    			    <input type="number" class="form-control" id="precio" name="precio" tabindex="3" placeholder="Precio" min="000" required><br>
                        <input type="number" class="form-control" id="Cantidad" name="Cantidad" tabindex="4" placeholder="Cantidad" min="000" required><br>
                        <select  name="tag" style="margin-bottom: 20px;" class="form-control">
                                <option value="0"> Seleccione una etiqueta </option>
                                <option value="belleza"> belleza </option>
                                <option value="bisuteria"> bisuteria </option>
                                <option value="salud"> salud </option>
                                <option value="accesorios"> accesorios </option>
                        </select>
    				    <p>Imagen del producto:</p> <input name="imagen" class="form-control" type="file" placeholder="Imagen del producto" required>
                        <input type="submit" id="enviar" name="submit" value="Aceptar">
                    </form>
                </div>
            </div></br></br>
            <?php foreach ($products as $key => $val):  ?>
            <div class="row" style="background-color:lightgray;">
                <div class="col-md-4">
                    <p><b><?php echo($val['name']); ?>:</b> </p> 
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-2 text-right">
                    <?php echo('<button data-toggle="collapse" data-target="#demo'.$key.'"><i class="fa fa-arrow-down" aria-hidden="true"></i></button>'); ?>
                </div>
            </div>
            <div class="row" style="background-color:#bdbdbd;">
                <?php echo('<div class="collapse col-md-12" id="demo'.$key.'">'); ?>
                    <form name="alterProduct" method="POST" enctype="multipart/form-data" action="../dataSource/php/alterProduct.php">
                        <?php echo"<input type='hidden' name='id' value='".$val['id_prod']."'>"; ?>
                        <?php echo"<input type='text' class='form-control' id='name' name='name' tabindex='1' placeholder='Nombre: ".$val['name']."' value='".$val['name']."' required><br>"; ?>
			    	    <?php echo"<textarea class='form-control' name='Descripcion' rows='5' cols='30' tabindex='2' placeholder='Descripción del producto: ".$val['descrip']."' value='".$val['descrip']."'></textarea></br>";?>
	    			    <?php echo"<input type='number' class='form-control' id='precio' name='precio' tabindex='3' placeholder='Precio: ".$val['price']."' value='".$val['price']."' min='000' required><br>";?>
                        <?php echo"<input type='number' class='form-control' id='Cantidad' name='Cantidad' tabindex='4' placeholder='Cantidad: ".(int)$val['inv']."' value='".(int)$val['inv']."' min='000' required><br>";?>
                        <select  name="tag" style="margin-bottom: 20px;" class="form-control">
                                <?php echo"<option value='".$val['tag']."'> ".$val['tag']." "?></option>
                                <option value="belleza"> belleza </option>
                                <option value="bisuteria"> bisuteria </option>
                                <option value="salud"> salud </option>
                                <option value="accesorios"> accesorios </option>
                        </select>
    				    <p>Imagen del producto:</p> <input name="imagen" class="form-control" type="file" placeholder="Imagen del producto" required>
                        <input type="submit" id="enviar" name="submit" value="Aceptar">
                    </form>
                </div>
            </div></br></br>
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
