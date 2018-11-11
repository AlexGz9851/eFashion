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
                    Política de privacidad
                    </h2>
                        <h3 class="section-subheading text-muted">
                            <p>Porque nos interesa su privacidad</p>
                            <span class="fa-stack fa-4x">    
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-file-text fa-stack-1x fa-inverse"></i>
                            </span>
                        </h3>
                </div>
            </div>
        </div>
    </header>
    <div class="row terminos">
            <div class="col-md-12"> 
                <div style="width: 900px" class=" center-block">
        <h3>Política de privacidad Bisuteria Michelle</h3>
        <ol>
            <li>Cada vez que usa este sitio web estará bajo la aplicación de la política de privacidad vigente en cada momento (en adelante, la Política de Privacidad), debiendo revisar dicho texto para comprobar que está conforme con él.</li>
            </br>
            <li>Los datos personales que nos aporta son nombre, apellidos, teléfono, correo electrónico, país, asunto, tema, mensaje, secciones que le interesan y tipo de teléfono móvil que tiene serán objeto de tratamiento en una base de datos responsabilidad de What? .-. México, S.A. de C.V. (What? .-. México) cuyas finalidades son: </li>
            <br>
            <ol type="I">
                <li> El desarrollo, cumplimiento y ejecución del contrato de compraventa de los productos que haya adquirido o de cualquier otro contrato entre ambos;</li> 

                <li> Para cumplir obligaciones derivadas de nuestras relaciones jurídicas que surjan con usted al contactarnos para compartir sus opiniones, quejas y sugerencias; información corporativa, affinity card, tarjetas regalo y atención al cliente en tiendas.</li><br>

                <li>Atender las solicitudes que nos plantee; </li><br>

                <li><p>Asimismo, dentro de la relación entre usted y nosotros, estará comprendido proporcionarle información acerca de los productos de Bisutería Michelle México, así como de otras marcas y/o empresas del Grupo M&P (cuyas actividades se relacionan con los sectores de decoración, textil, de productos acabados de vestir y del hogar, así como con cualesquiera otros complementarios de los anteriores, incluidos los de cosmética y marroquinería, así como el desarrollo y soporte de actividades de comercio electrónico), incluyendo, en relación con dichos productos, el envío de comunicaciones comerciales a través de correos electrónicos, llamadas telefónicas, mensajes SMS y demás medios de comunicación electrónicos (según el estado de la técnica) o físicos que resultaran adecuados y pertinentes para cumplir con la presente finalidad. 
            Puedes cambiar tus preferencias en relación con el envío de tales comunicaciones comerciales accediendo a la sección Mi cuenta. Podrá dar de baja su suscripción a través de la sección Newsletter o contactando con nuestro servicio de atención al cliente.</p>

            <p>En el caso que nos aporte datos personales de terceros, usted se responsabiliza de haber informado y haber obtenido el consentimiento de éstos para ser aportados con las finalidades que se detallan a continuación. En el caso de haber procedido a la compra de un producto o a la compra de una tarjeta regalo (en adelante, mercancía), los datos personales de terceros aportados serán utilizados únicamente para (i) la gestión del envío o la verificación de recepción de la mercancía; (ii) atender las solicitudes que nos plantee y, (iii) compartir con sus conocidos nuestros productos por correo electrónico;</p></li></br>
            <li><p>En caso de que elija marcar la opción de guardar y activar compra rápida, nos autoriza expresamente al tratamiento de los datos necesarios para la activación y desarrollo de esta funcionalidad. El CVV de la tarjeta únicamente se utiliza para realizar la compra en curso, y no será almacenado ni tratado posteriormente como parte de sus datos de tarjetas. </p>

            <p>El consentimiento para la activación de esta funcionalidad, permite que aparezcan sus datos autocompletados en posteriores compras, por lo que no será necesario introducir sus datos en cada nuevo proceso, y se entenderá válido y vigente para compras posteriores. </p>

            <p>Podrá modificar sus tarjetas, así como revocar su consentimiento para el tratamiento, en cualquier momento a través del apartado Tarjetas de Mi Cuenta.</p>
            <p>Bisuteria Michelle México almacena y transmite los datos de sus tarjetas conforme a los principales estándares de confidencialidad y seguridad internacionales de tarjetas de crédito y débito. </p>

            <p>El uso de esta funcionalidad, podrá requerir por motivos de seguridad la modificación de su clave de acceso. Recuerde que la seguridad en el uso del sitio web también depende de su correcta utilización y conservación de determinadas claves confidenciales.</p></li>
            </ol>
        <li><p>Bisuteria Michelle México, con domicilio en Avenida Javier Mina 35 local 2-A, como responsable de la base de datos, se compromete a respetar la confidencialidad de sus datos personales y a garantizar el ejercicio de sus derechos de Acceso, Rectificación, Cancelación y Oposición (derechos ARCO), mediante carta dirigida a la dirección anteriormente indicada a la atención de “Protección de Datos” para México; o bien, mediante el envío de un correo electrónico a datospersonales@corporaciondeserviciosxxi.mx. En caso necesario, podremos solicitarle copia de alguna de sus identificaciones oficiales (IFE, pasaporte u otro documento válido que lo identifique). En el caso de que decidiese ejercer dichos derechos ARCO y que como parte de los datos personales que nos hubiera facilitado conste el correo electrónico le agradeceríamos que en la mencionada comunicación se hiciera constar específicamente esa circunstancia indicando la dirección de correo electrónico respecto de la que se ejercitan los derechos ARCO.</p>

        <p>Asimismo, le informamos atentamente que usted, o su representante legal, podrá ejercer cualquiera de los derechos ARCO, así como revocar su consentimiento para el tratamiento de sus datos personales en cualquier momento. Para que su solicitud proceda es indispensable completar toda la información que a continuación le enunciamos, la cual será utilizada para acreditar su identidad, tal y como se señala en los artículos 32, 34 y 35 de la Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP).</p></li>
        <ol type="I"><li>DATOS DEL TITULAR: Nombre Completo, Domicilio Completo, Teléfono y Correo electrónico (donde se le comunicará la respuesta a su solicitud).</li>
        <li><p>INFORMACIÓN DEL REPRESENTANTE (SÓLO SI APLICA): Nombre Completo.</p>
        <p>En caso de ser representante legal del titular deberá acompañar a su escrito el instrumento público correspondiente en original, o en su caso, carta poder firmada ante dos testigos.</p></li>
        <li>DERECHOS ARCO: Indicar el/los derecho(s) que desea ejercer: Acceso, Rectificación, Cancelación y/o Oposición. Asimismo se deberá hacer una descripción de los datos personales respecto de los que se busca ejercer el/los derecho(s) señalados anteriormente y/o cualquier otro comentario que nos ayude a atender mejor su derecho.</li>
        <li><p>OTRA DOCUMENTACIÓN NECESARIA: Favor de acompañar la documentación que considere sustente su solicitud y nos ayude a tramitarla convenientemente. En particular, en la solicitud de rectificación de datos personales (dato incorrecto, dato correcto y documento acreditativo).
        En caso de que la información proporcionada en su escrito sea errónea o insuficiente, o bien, no se acompañen los documentos de acreditación correspondientes, el Departamento de Protección de Datos, dentro de los cinco (5) días hábiles siguientes a la recepción de su escrito de solicitud de derechos, podrá requerirle que aporte los elementos o documentos necesarios para dar trámite al mismo. Usted contará con diez (10) días hábiles para atender el requerimiento, contados a partir del día siguiente en que lo haya recibido. De no dar respuesta en dicho plazo, se tendrá por no presentado el escrito correspondiente.</p>
        <p>
        El Departamento de Protección de Datos le comunicará la determinación adoptada en un plazo máximo de veinte (20) días hábiles contados desde la fecha en que se recibió su escrito a efecto de que, si resulta procedente, haga efectiva la misma dentro de los quince (15) días hábiles siguientes a que se comunique la respuesta. La respuesta se dará por la misma vía en que nos envió su solicitud.</p></li></ol>
        <li><p>Usted podrá limitar el uso y/o divulgación de sus datos personales enviando su solicitud al Departamento de Protección de Datos a la dirección datospersonales@corporaciondeserviciosxxi.mx para México. Los requisitos para acreditar su identidad, así como el procedimiento para atender su solicitud se regirán por los mismos criterios señalados en el apartado anterior.</p>

        <p>En caso de que su solicitud resulte procedente, el Departamento de Protección de Datos lo registrará en nuestro listado de exclusión interno con el objeto de que usted deje de recibir nuestras promociones.</p></li></br>

        <li>Bisuteria Michelle México se reserva el derecho, bajo su exclusiva discreción, de cambiar, modificar, agregar o eliminar partes de la presente Política de Privacidad en cualquier momento. En tal caso, What? .-. México indicará la fecha de última versión del mismo a través de su publicación en el presente sitio web.</li></br>

        <li>Para cumplir las finalidades indicadas en el apartado 2 anterior, puede resultar necesario transferir la información que nos ha proporcionado a la sociedad Holding del Grupo M&P, así como a determinadas sociedades integrantes del Grupo M&P en España e Irlanda (cuyas actividades se relacionan con los sectores de decoración, textil, de productos acabados de vestir y del hogar, así como con cualesquiera otros complementarios de los anteriores, incluidos los de cosmética y marroquinería, así como el desarrollo y soporte de actividades de comercio electrónico) por lo que entendemos que, al registrarse y proporcionarnos información a través de este sitio Web, nos autoriza expresamente para efectuar tales transferencias a las citadas sociedades pertenecientes al Grupo M&P. Asimismo, What? .-. México, para cumplir la(s) finalidad(es) necesarias anteriormente descrita(s) u otras aquellas exigidas legalmente o por las autoridades competentes, sólo transferirá los datos necesarios en los casos legalmente previstos.</li></br>

        <li>El usuario (usted) por la presente garantiza que los datos personales proporcionados son ciertos y exactos y se compromete a notificar cualquier cambio o modificación de los mismos. Cualquier pérdida o daño causado al sitio o a la persona responsable del sitio web o a cualquier tercero mediante la comunicación de información errónea, inexacta o incompleta en los formularios de registro será responsabilidad exclusiva del usuario.</li></br>

        <li>Información sobre Cookies: Aceptando la presente Política de Privacidad consiente la utilización de las cookies utilizadas en este sitio web y que se describen en nuestra Política de Cookies.</li><br>
        </ol>
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

</html