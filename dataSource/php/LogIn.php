<?php
include("DBConnection.php");
if(isset($_POST['usuario'])){
	$ObjBD= new BaseDeDatos();
    $existe=$ObjBD->verificarLogIn($_POST['usuario'], $_POST['pass']);
    if(verificar() && $existe[0]['exist']=='1'){
                $datos=datosDeSesion($ObjBD);
                $_SESSION['name']=$datos[0]['name'];
                $_SESSION['adm']=$datos[0]['val'];
                $_SESSION['user']=$_POST['usuario'];
                header('Location: ../..');
	}
    else{
        header('Location: ../../LogIn?err=err');
    }
}

function verificar(){
    $inputUsername = $_POST["usuario"];
    $inputPassword = $_POST["pass"];  

	if($inputUsername == null || !preg_match("/^[0-9a-zA-Z]+$/", $inputUsername)){
        echo "Revise los datos introducido";
        return false;
    }
    
    if($inputPassword == null || !preg_match("/[0-9a-zA-Z-_\.]/", $inputPassword)){
        echo "Verifique los datos introducidos";
        return false;
    }
    return true;
}

function datosDeSesion($BD){
    $datos = $BD->sessionData($_POST["usuario"]);
    return $datos;
}