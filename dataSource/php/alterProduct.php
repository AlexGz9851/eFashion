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
        $ObjBD->alterProduct($_POST['name'], $_POST['precio'], $_POST['Descripcion'], $_POST['Cantidad'], $_POST['tag'], $_FILES['imagen']['name'], $_POST['id']);
        
	}