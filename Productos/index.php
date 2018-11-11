<?php 
    include "../dataSource/php/DBConnection.php";
    $db = new BaseDeDatos();
    $pageSize = 12;
    if(isset($_GET['pag']))
        $pag = $_GET['pag'];
    if(isset($_GET['tag'])) {
        $query = $db->seeTag_nl($_GET['tag']);
        $count=0;
        foreach ($query as $val) {
            $count++;
        }
        if(!isset($pag)) {
            $inicio = 0;
            $pag = 1;
        }
        else
            $inicio = ($pag-1)*$pageSize;
        $totalPages = ceil($count/$pageSize);
        if ($count==0)
            $noTag = "Productos con el tag seleccionado no encontrados";
    }
    else{
        $query = $db->seeAll_nl();
        $count=0;
        foreach ($query as $var) {
            $count++;
        }
        if(!isset($pag)) {
            $inicio = 0;
            $pag = 1;
        }
        else
            $inicio = ($pag-1)*$pageSize;
        $totalPages = ceil($count/$pageSize);
    }
        
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
    <link href="../dataSource/css/products.css" rel="stylesheet">
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
                            <a class="page-scroll dropdown-toggle" href="index.php">Productos</a>
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
                    <?php if(isset($_GET['tag'])): ?>
                        <?php if($_GET['tag']=="belleza"):         ?>
                        <div class="intro-lead-in">
                        <h1>Belleza<h1>
                        </div>
                        </h2>
                        <h3 class="section-subheading text-muted">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-female fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                        <?php elseif($_GET['tag']=="bisuteria"): ?>
                        <div class="intro-lead-in">
                        <h1>Bisuteria<h1>
                        </div>
                        </h2>
                        <h3 class="section-subheading text-muted">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-heart fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                        <?php elseif($_GET['tag']=="salud"): ?>
                        <div class="intro-lead-in">
                        <h1>Salud<h1>
                        </div>
                        </h2>
                        <h3 class="section-subheading text-muted">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-venus fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                        <?php elseif($_GET['tag']=="accesorios"): ?>
                        <div class="intro-lead-in">
                        <h1>Accesorios<h1>
                        </div>
                        </h2>
                        <h3 class="section-subheading text-muted">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-shopping-bag fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="intro-lead-in">
                        <h1>Nuestra colección<h1>
                        </div>
                        </h2>
                        <h3 class="section-subheading text-muted">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-gg-circle fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </header>


    <!-- Productos -->
    <?php
        if(isset($_GET['tag']))
            $query = $db->seeTag($_GET['tag'], $inicio, $pageSize);
        else
            $query = $db->seeAll($inicio, $pageSize);
    ?>
    <section id="products" class="bg-light-gray">
        <div class="container">
                <?php if(isset($noTag)): ?>
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Advertencia</h2>
                        <h3 class="section-subheading text-muted">No tenemos productos con el tag establecido</h3>
                    </div>
                <?php else: $x=0;?>
                    <?php foreach ($query as $val): ?>
                        <?php if($x==0): echo('<div class="row img-container">'); endif; ?>
                        <div class="col-md-3 col-sm-6 products-item div-img">
                            <?php 
                                echo("<a href='#item' onclick="."\"showPopup('popup".$x."','fade".$x."');\""." class='products-link'>");
                                echo("<img src='../dataSource/img/productos/".$val['img']."' class='img-responsive img' alt=''>");
                            ?>
                            </a>
                            <div class="products-caption text">
                                <h4><?php echo($val['name'])?></h4>
                                <p class="text-muted"><?php echo($val['descrip'])?></p>
                            </div>
                        </div>
                        <?php if(($x+1)%4==0): echo('</div><div class="row img-container">'); endif; ?>
                        <?php $x++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <!-- Selector de página -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php
                        if ($totalPages > 1) {
                                if(isset($_GET['tag'])) {
                                    if ($pag != 1) 
                                        echo '<a href="?tag='.$_GET['tag'].'&pag='.($pag-1).'">
                                        <span class="fa-stack fa-3x">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-chevron-circle-left fa-stack-1x fa-inverse"></i>
                                        </span></a>';
                                    for ($i=1;$i<=$totalPages;$i++) {
                                        if ($pag == $i)
                                            echo $pag;
                                        else
                                            echo '  <a href="?tag='.$_GET['tag'].'&pagina='.$i.'">'.$i.'</a>  ';
                                    }
                                    if ($pag != $totalPages)
                                        echo '<a href="?tag='.$_GET['tag'].'&pag='.($pag+1).'">
                                    <span class="fa-stack fa-3x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-chevron-circle-right fa-stack-1x fa-inverse"></i>
                                    </span></a>';
                                }
                                else{
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

    <?php $x=0; foreach ($query as $val): ?>

                    <?php echo('<div class="popup" id="popup'.$x.'">') ?>
                            <?php echo("<img src='../dataSource/img/productos/".$val['img']."' class='img-responsive img' alt='' width='719' height='925'>"); ?>
                                                
                        <div class="products-caption text">
                            <h4><?php echo($val['name'])?></h4>
                            <p class="small">En inventario: <?php echo((int)$val['inv'])?></p>
                            <p class="text-muted"><?php echo ($val['descrip'])?></p>
                            <p class="text-muted"><strong>MXN $<?php echo($val['price'])?></strong></p>
                            <?php echo('<form action="../cart/index.php" method="post" id="form'.$x.'" onSubmit="return cart'.$x.'(document.getElementById(\'quantity'.$x.'\').value,document.getElementById(\'id'.$x.'\').value)">') ?>
                            <?php echo('<input type="hidden" name="id" id="id'.$x.'" class="id" value="'.$val['id_prod'].'">'); ?></input>
                            <?php if(!isset($_SESSION['my_cart'][$val['id_prod']])):?>
                                    <div class="form-group">
                                        <?php echo('<input type="number" name="quantity" id="quantity'.$x.'" class="quantity" min="1" max="'.(int)$val['inv'].'" placeholder="Cantidad" required>');  ?></input>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <?php echo('<input type="submit" name="send" id="send'.$x.'" class="btn btn-xl" value="agregar al carrito"></input>'); ?>
                                </form>
                            <?php else: ?>
                                    <table>
                                        <tr>
                                            <td class="cell" rowspan="2" width="50%" align="right">
                                                <div class="form-group">
                                                    <?php echo('<input type="number" name="quantity" id="quantity'.$x.'" class="quantity" min="1" max="'.(int)$val['inv'].'" placeholder="Cantidad" value="'.$_SESSION['my_cart'][$val['id_prod']].'" required>');  ?></input>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </td>
                                            <?php echo('<td><input type="submit" name="send" id="send'.$x.'" class="btn btn-primary modify" value="Modificar cantidad"></input></td>'); ?>
                                        </tr> 
                                        <tr>                         
                                            <?php echo('<td><input type="submit" name="send" id="send'.$x.'" class="btn btn-primary del" value="Quitar del carrito"></input></td>'); ?>
                                        </tr>
                                    </table>
                                </form>
                            <?php endif ?>
                        </div>
                        <?php
                            echo("<script>");
                            echo('function cart'.$x.'(var1,var2){
                                    var1 = parseInt(var1);
                                    var2 = parseInt(var2);
                                    if(Number.isInteger(var1) && var1<='.(int)$val['inv'].' && var2=='.$val['id_prod'].')
                                        return true;
                                    else{
                                        alert("Porfavor actualice la pagina y vuelva a intentarlo");
                                        return false;
                                        }
                                }');
                            echo("</script>");
                        ?>  
                    </div>
                    <?php echo('<div id="fade'.$x.'" class="fade" onClick="hidePopup(\'popup'.$x.'\',\'fade'.$x.'\');"></div>') ?>
          
    <?php $x++; endforeach; ?>

            <!-- jQuery -->
    <script src="../dataSource/js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="../dataSource/js/bootstrap.min.js"></script>

    <!-- Validator 
    <script src="../dataSource/js/validator.min.js"></script>
    <script>
        <?php0 //$x=0; foreach ($query as $val): ?>
        <?php //echo("$('#form".$x."').validator();");?>
        <?php //$x++; endforeach; ?>
    </script>-->
</body>

</html>
