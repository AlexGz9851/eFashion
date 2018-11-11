<?php
include("DBConnection.php");

 if(isset($_POST['email'])){
	$ObjBD= new BaseDeDatos();
    $existeUsuario=$ObjBD->verificarUsuario($_POST['user']);
	$existeCorreo=$ObjBD->verificarCorreo($_POST['email']);
	$a=0;
	if($existeUsuario[0]['exist']=='1'){
		$err="?userex=err";
		$a=1;
	}
	if($existeCorreo[0]['exist']=='1'){
		if(isset($err))
            $err=$err."&emailex=err";
        else
            $err="?emailex=err";
		$a=1;
	}
    //var_dump($err);
    if(verificar()){
        if(!isset($err)){
                //var_dump($_POST);
                $ObjBD->registro($_POST['name'], $_POST['Ap'], $_POST['pass'], $_POST['user'], $_POST['adress'], $_POST['email'], $_POST['Tarjeta'], $_POST['banco'], $_POST['CSV'], $_POST['Estado'], $_POST['Municipio'], $_POST['Mes'], $_POST['Year']);
                header('Location: ../..');
        }
        else
        {
            var_dump($err);
            header('Location: ../../LogUp'.$err);
        }
	}
    else
        {
            var_dump($err);
            header('Location: ../../LogUp'.$err);
        }
}


function verificar(){
	$inputName = $_POST["name"];
    $inputLastName = $_POST["Ap"];
    $inputUsername = $_POST["user"];
    $inputPassword1 = $_POST["pass"];  
    $inputPassword2 = $_POST["pass2"];    
    $inputEmail = $_POST['email'];
    $inputDom = $_POST['adress'];
    $inputBanc = $_POST["banco"];
    $inputTC = $_POST["Tarjeta"];
    $inputCSV = $_POST["CSV"];
    $inputMV = $_POST["Mes"];
    $inputAV = $_POST["Year"];
    $inputEst = $_POST["Estado"];
    $inputMun = $_POST["Municipio"];

	if($inputName == null || strlen($inputName) == 0 || strlen($inputName) > 30 || !preg_match("/^[a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ]+$/",$inputName)){
        if(isset($err))
            $err=$err."&name=err";
        else
            $err="?name=err";
        return false;
    }
    if($inputLastName == null || strlen($inputLastName) == 0 || strlen($inputLastName) > 30 || !preg_match("/^[a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ]+$/",$inputLastName)){
        if(isset($err))
            $err=$err."&ln=err";
        else
            $err="?ln=err";
        return false;
    }
    if($inputDom == null || strlen($inputDom) == 0 || strlen($inputDom) > 30 || !preg_match("/^[0-9a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[0-9a-zA-ZñÑáíúéóÁÍÚÉÓ]*)*[0-9a-zA-ZñÑáíúéóÁÍÚÉÓ]+$/",$inputDom)){
        if(isset($err))
            $err=$err."&dom=err";
        else
            $err="?dom=err";
        return false;
    }
    if($inputEst == null || strlen($inputEst) == 0 || strlen($inputEst ) > 30 || !preg_match("/^[a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ]+$/",$inputEst)){
        if(isset($err))
            $err=$err."&est=err";
        else
            $err="?est=err";
        echo("Revise el Estado introducido no contenga caracteres especiales");
        return false;
    }
    if($inputMun == null || strlen($inputMun) == 0 || strlen($inputMun) > 30 || !preg_match("/^[0-9a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ]+$/",$inputMun)){
        if(isset($err))
            $err=$err."&mun=err";
        else
            $err="?mun=err";
        echo("Revise el Municipio introducido no contenga caracteres especiales");
        return false;
    }
    if($inputUsername == null || strlen($inputUsername) < 5 || strlen($inputUsername) > 10 || !preg_match("/^[0-9a-zA-Z]+$/",$inputUsername)){
        if(isset($err))
            $err=$err."&usr=err";
        else
            $err="?usr=err";
        echo("Revise el usuario introducido, no se aceptan simbolos y debe de ser de tamaño entre 5 y 10");
        return false;
    }
    
    if($inputEmail == null || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$inputEmail)){
        if(isset($err))
            $err=$err."&mail=err";
        else
            $err="?mail=err";
        echo("Verifique que el correo introducido cumpla con: nombre@host.dominio");
        return false;
    }
    
    if($inputPassword1 == null || !preg_match("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_\.]).{8,20})/",$inputPassword1)){
        if(isset($err))
            $err=$err."&psd=err";
        else
            $err="?psd=err";
        echo("La contraseña debe de ser de minimo 8 caracteres, contener al menos una letra minuscula, una mayuscula, un numero y un caracter especial '.' y '-' y '_'");
        return false;
    }
    
    if($inputPassword2!=$inputPassword1){
        if(isset($err))
            $err=$err."&conf=err";
        else
            $err="?conf=err";
        echo("La confirmación de contraseña es incorrecta, vuelva a intentar");
        return false;
    }

    if($inputBanc == null || $inputAV == null || $inputAV>2099 || $inputAV<2016 || $inputMV == null || $inputMV>12 || $inputMV<1 || $inputBanc<1 || $inputBanc>3 || $inputTC == null || !preg_match("/^[1-9][0-9]{14}[0-9]$/", $inputTC) || $inputCSV == null || !preg_match("/^[0-9][0-9]{1}[0-9]$/", $inputCSV)){
        if(isset($err))
            $err=$err."&bnc=err";
        else
            $err="?bnc=err";
        echo "Verifique los datos de la tarjeta";
        return false;
    }
    
    return true;
}