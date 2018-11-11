<?php
    include("DBConnection.php");
    if(isset($_POST['name'])){
        $ObjBD= new BaseDeDatos();
        var_dump($_POST);
        var_dump($_FILES);
        $target_path = "../img/productos/";
        $target_path = $target_path . basename( $_FILES['imagen']['name']);
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) { 
            echo "El archivo ". basename( $_FILES['imagen']['name']). " ha sido subido";
            header('Location: ../../inventory');
        } else{
            echo "Ha ocurrido un error, trate de nuevo!";
        } 
        $ObjBD->newProduct($_POST['name'], $_POST['precio'], $_POST['Descripcion'], $_POST['Cantidad'], $_POST['tag'], $_FILES['imagen']['name']);
        
	}

function validacion() {
    $inputTitle = $_POST["title"];
    $inputDescription = $_POST["Descripcion"];
    $inputArtista = $_POST["artista"];  
    $inputGenero = $_POST["genero"];
    $inputImg = $_FILES["imagen"]['name'];
    $minDate = strtotime(date("Y-m-d"));
    $maxDate = strtotime("2020-01-01");
    $inputStart = strtotime($_POST["inicio"]);
    $inputEnd = strtotime($_POST["fin"]);
    if($inputTitle == null || strlen($inputTitle) == 0 || strlen($inputTitle) > 20 || !preg_match("/^[a-zA-ZñÑáíúéóÁÍÚÉÓ]+(\s*[a-zA-ZñÑáíúéóÁÍÚÉÓ0-9]*)*[a-zA-ZñÑáíúéóÁÍÚÉÓ0-9]+$/",$inputTitle)){
        echo "Revise que el titulo introducido no contenga caracteres especiales";
        return false;
    }
    if($inputArtista == null || strlen($inputArtista) == 0 || strlen($inputArtista) > 20 || !preg_match("/^[0-9a-zA-Z]+$/",$inputArtista)){
        echo "Revise el artista introducido, no se aceptan simbolos, debe ser menor a 20 caracteres";
        return false;
    }
    if($inputGenero == null || strlen($inputGenero) == 0 || strlen($inputGenero) > 20 || !preg_match("/^[0-9a-zA-Z]+$/",$inputGenero)){
        echo "Revise el genero introducido, no se aceptan simbolos, debe ser menor a 20 caracteres.";
        return false;
    }
    if($inputImg == null || strlen($inputImg) > 20 || !preg_match("/\.jpg$|\.png$$/",$inputImg)){
        echo "La imagen debe de tener una extensión png y no tener una longitud mayor a 20 caracteres (con todo y extensión)";
        return false;
    }
    if($inputStart == null || $inputStart>$maxDate || $inputEnd<$minDate){
        echo "La fecha de inicio no puede ser menor a la de hoy ni mayor a la del primero de enero de 2020";
        return false;
    }
    if($inputEnd == null || $inputStart>$maxDate || $inputEnd<$minDate){
        echo "La fecha de fin no puede ser menor a la de hoy ni mayor a la del primero de enero de 2020";
        return false;
    }
    return true;
}

?>