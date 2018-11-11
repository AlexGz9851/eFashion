<?php 
    include "../dataSource/php/DBConnection.php";
    $db = new BaseDeDatos();
    $pageSize = 12;
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(($_POST['send']=="agregar al carrito" || $_POST['send']=="Modificar cantidad") && $_POST['quantity']>0){
            $query = $db->lookID($_POST['id']);
            if($query!=null){
                if(isset($_SESSION['my_cart'][$_POST['id']]) && $_POST['quantity']==0)
                    unset($_SESSION['my_cart'][$_POST['id']]);
                else{
                    if($_POST['quantity']<=$query[0]['inv'])
                        $_SESSION['my_cart'][$_POST['id']] = $_POST['quantity'];
                    else
                        $_SESSION['my_cart'][$_POST['id']] = (int)$query[0]['inv'];
                }
            }
            else{
                header('Location: index.php?ERROR=ERROR');
            }
        }
        elseif($_POST['send']=="Quitar del carrito" || $_POST['quantity']<1) {
            if(isset($_SESSION['my_cart'][$_POST['id']]))
                unset($_SESSION['my_cart'][$_POST['id']]);
        }
    }
    elseif($_SERVER['REQUEST_METHOD'] == "GET"){
        if(isset($_GET['ERROR']))
            echo('<script>alert("Hubo un error, porfavor vuelva a intentar luego")</script>');
    }
    if(!isset($_SESSION['my_cart']))
        $empty="...";
    else if(count($_SESSION['my_cart'])<1)
            $empty="...";
    if(isset($_GET['pag']))
        $pag = $_GET['pag'];
        if(!isset($pag)) {
            $inicio = 0;
            $pag = 1;
        }
        else
            $inicio = ($pag-1)*$pageSize;
            $totalPages = ceil((count($_SESSION)-1)/$pageSize);
        unset($query);
        
?>
<!DOCTYPE html>
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
    <link href="../dataSource/css/cart.css" rel="stylesheet">
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
                                        <a class="page-scroll" href="#checkout" onclick="showPopup('checkout', 'fadeCO');">Finalizar compra <i class="fa fa-credit-card"></i></a>
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
                        <h1>Tu carrito<h1>
                        </div>
                        </h2>
                        <h3 class="section-subheading text-muted">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                </div>
            </div>
        </div>
    </header>


    <!-- Productos -->
    <?php
        if(!isset($empty)):
            foreach ($_SESSION['my_cart'] as $key => $value) {
                if(is_numeric($key))
                    $query[$key] = $db->lookID($key);
            }
        endif;
    ?>
    <section id="products" class="bg-light-gray">
        <div class="container">
                <?php if(isset($empty)): ?>
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">;-;</h2>
                        <h3 class="section-subheading text-muted">No ha agregado nada a su carrito</h3>
                    </div>
                <?php else: ?>
                    <?php $y=0; foreach ($query as $x => $val): ?>
                        <?php if($y==0): echo('<div class="row img-container">'); endif; ?>
                        <div class="col-md-3 col-sm-6 products-item div-img">
                            <?php 
                                echo("<a href='#item' onclick="."\"showPopup('popup".$x."','fade".$x."');\""." class='products-link'>");
                                echo("<img src='../dataSource/img/productos/".$val[0]['img']."' class='img-responsive img' alt=''>");
                            ?>
                            </a>
                            <div class="products-caption text">
                                <h4><?php echo($val[0]['name'])?></h4>
                                <p class="text-muted"><?php echo($val[0]['descrip'])?></p>
                            </div>
                        </div>
                        <?php if(($y+1)%4==0): echo('</div><div class="row img-container">'); endif; $y++;?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <!-- Selector de página -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php
                        if ($totalPages > 1) {

                                     if ($pag != 1) 
                                        echo '<a href="?pag='.($pag-1).'">
                                        <span class="fa-stack fa-3x">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-chevron-circle-left fa-stack-1x fa-inverse"></i>
                                        </span></a>';
                                    for ($i=1;$i<=$totalPages;$i++) {
                                        if ($pag == $i)
                                            echo $pag;
                                        else
                                            echo '  <a href="?pag='.$i.'">'.$i.'</a>  ';
                                    }
                                    if ($pag != $totalPages)
                                        echo '<a href="?pag='.($pag+1).'">
                                        <span class="fa-stack fa-3x">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-chevron-circle-right fa-stack-1x fa-inverse"></i>
                                        </span></a>';
                        }
                    ?>
                </div>
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
    <!-- popup -->
    <?php if(!isset($empty)): ?>
        <?php foreach ($query as $x => $val):?>  
            <?php echo('<div class="popup" id="popup'.$x.'">') ?>
                <?php echo("<img src='../dataSource/img/productos/".$val[0]['img']."' class='img-responsive img' alt='' width='719' height='925'>"); ?>                    
                <div class="products-caption text">
                    <h4><?php echo($val[0]['name'])?></h4>
                    <p class="small">En inventario: <?php echo((int)$val[0]['inv'])?></p>
                    <p class="text-muted"><?php echo ($val[0]['descrip'])?></p>
                    <p class="text-muted"><strong>MXN $<?php echo($val[0]['price'])?></strong></p>
                    <?php if(!isset($_SESSION['my_cart'][$val[0]['id_prod']])):?>
                        <?php echo('<form action="../cart/index.php" method="post" id="form'.$x.'">') ?>
                            <?php echo('<input type="hidden" name="id" id="id" class="id" value="'.$val[0]['id_prod'].'">'); ?></input>
                            <div class="form-group">
                                <?php echo('<input type="number" name="quantity" id="quantity" class="quantity" min="1" max="'.(int)$val[0]['inv'].'" placeholder="Cantidad" required>');  ?></input>
                                <div class="help-block with-errors"></div>
                            </div>
                            <input type="submit" name="send" id="send" class="btn btn-xl" value="agregar al carrito"></input>
                        </form>
                    <?php else: ?>
                        <?php echo('<form action="../cart/index.php" method="post" id="form'.$x.'">') ?>
                            <table>
                                <tr>
                                    <td class="cell" rowspan="2" width="50%" align="right">
                                        <?php echo('<input type="hidden" name="id" id="id" class="id" value="'.$val[0]['id_prod'].'">'); ?></input>
                                        <div class="form-group">
                                            <?php echo('<input type="number" name="quantity" id="quantity" class="quantity" min="1" max="'.(int)$val[0]['inv'].'" placeholder="Cantidad" value="'.$_SESSION['my_cart'][$val[0]['id_prod']].'" required>');  ?></input>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </td>
                                    <td><input type="submit" name="send" id="send" class="btn btn-primary modify" value="Modificar cantidad"></input></td>
                                </tr> 
                                <tr>                         
                                    <td><input type="submit" name="send" id="send" class="btn btn-primary del" value="Quitar del carrito"></input></td>
                                </tr>
                            </table>
                        </form>
                    <?php endif ?>
                </div>
            </div>
            <?php echo('<div id="fade'.$x.'" class="fade" onClick="hidePopup(\'popup'.$x.'\',\'fade'.$x.'\');"></div>') ?>            
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="popup" id="checkout">
        <h1>Recibo</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            <?php if(isset($query) && $query!=null): ?>
                <?php foreach($query as $key => $val): ?>
                <tr>
                    <?php 
                    
                        echo("<td>".$val[0]['id_prod']."</td>");
                        echo("<td>".$val[0]['name']."</td>");
                        echo("<td>".$_SESSION['my_cart'][$key]."</td>");
                        echo("<td>$".$val[0]['price']."</td>");
                    ?>
                </tr>
                <?php endforeach; endif;?>
        </table>
        <?php if(isset($query) && $query!=null): ?>
            <a href="../dataSource/php/compra.php"><button type="submit" name="send" id="send" class="btn btn-xl">Comprar <i class="fa fa-credit-card"></i></button></a>
        <?php else: ?>
            <h4>Agregue algo a su carrito :)</h4>
        <?php endif; ?>
    </div>
    <div class="fade" id="fadeCO" onclick="hidePopup('checkout','fadeCO')">
    </div>
            <!-- jQuery -->
    <script src="../dataSource/js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="../dataSource/js/bootstrap.min.js"></script>

    <!-- Validator -->
    <script src="../dataSource/js/validator.min.js"></script>
    <script>
        <?php foreach ($query as $x => $val):?>
        <?php echo("$('#form".$x."').validator();");?>
        <?php endforeach; ?>
    </script>

</body>

</html>
