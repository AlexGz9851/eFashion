<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
class BaseDeDatos {
    private $con;
    //$this->con;
    public function __construct()
    {
        //CADENA DE CONEXION PDO(localhost,nombre de la bd, usuario, contraseña)
        $name = "eFashion";
        $user = "adminDB";
        $password = "eFashion";
        $this->con = new PDO('mysql:host=localhost; dbname='.$name, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
     }

    public function seeMost(){
        $sql=$this->con->query("CALL seeMost()");
        if($sql)
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        else
            return null;
    }
    public function seeTag($tag, $start, $end){
        $sql=$this->con->query("CALL seeWithTags('".$tag."', '".$start."','".$end."')");
        if($sql)
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        else
            return null;
    }
    public function seeAll($start, $end){
        $sql=$this->con->query("CALL seeAll('".$start."', '".$end."')");
        if($sql)
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        else
            return null;
    }
    public function seeTag_nl($tag){
        $sql=$this->con->query("CALL seeWithTags_nl('".$tag."')");
        if($sql)
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        else
            return null;
    }
    public function seeAll_nl(){
        $sql=$this->con->query("CALL seeAll_nl()");
        if($sql)
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        else
            return null;
    }
    public function lookID($id){
        $sql=$this->con->query("CALL lookID('".$id."')");
        if($sql)
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        else
            return null;
    }
    public function verificarUsuario($Usuario) {
        $sql=$this->con->query("SELECT COUNT(persona.Usuario) as exist from persona where persona.Usuario='$Usuario'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verificarCorreo($Correo) {
        $sql=$this->con->query("SELECT COUNT(persona.email) as exist from persona where persona.email='$Correo'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
      
    public function registro($nombre,$Ap,$pass,$usuario,$dom,$coreo,$tc,$banco,$clave,$estado,$muni,$mes,$ano)
    {
        //$sql=$this->con->prepare("CALL `registroUser`('$nombre','$Ap','$pass','$usuario','$dom','$coreo','$tc','$banco','$clave','$estado','$muni','$mes','$ano')");
        if(!isset($_SESSION['adm']))
            $sql=$this->con->prepare("INSERT INTO persona (Nombre, Apellido, Pass, Usuario, dom, email, tarjetaCredito, Banco, CCV, Estado, Municipio, MesVen, YearVen) VALUES ('$nombre','$Ap','$pass','$usuario','$dom','$coreo','$tc','$banco','$clave','$estado','$muni','$mes','$ano')");
        else
        {
            var_dump($_POST);
            $sql=$this->con->prepare("INSERT INTO persona (Nombre, Apellido, Pass, Usuario, dom, email, tarjetaCredito, Banco, CCV, Estado, Municipio, MesVen, YearVen, Admin) VALUES ('$nombre','$Ap','$pass','$usuario','$dom','$coreo','$tc','$banco','$clave','$estado','$muni','$mes','$ano', 1)");
        }
        var_dump($sql);
        $sql->execute();
    }

public function sessionData($Usuario) {
        $sql=$this->con->query("CALL userData('$Usuario')");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function verificarLogIn($Usuario, $Pass) {  
        //$sql=$this->con->query("CALL login('$Usuario', '$Pass')");
        $sql=$this->con->query("SELECT COUNT(persona.Usuario) AS exist FROM persona WHERE persona.Usuario='$Usuario' AND persona.Pass='$Pass'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function compra($usuario, $id_producto, $cantidad, $ticket)
    {
        $sql=$this->con->prepare("INSERT INTO compra(id_ticket, Id_Persona, id_prod, cant) VALUES ('$ticket','$usuario', '$id_producto', '$cantidad')");
        $sql->execute();
    }

    public function ticketID(){
        $var = $this->con->lastInsertId();
        return $var;
    }

    public function ticket($precio, $precioi, $id)
    {
        $sql=$this->con->prepare("INSERT INTO ticket(precio_final, fecha, fecha_ent, precio_int, Id_Persona) VALUES ($precio,CURRENT_DATE, AddWorkDays(8,CURRENT_DATE), $precioi, '$id')");
        $sql->execute();
    }


    public function getUserID($user){
        $sql=$this->con->query("SELECT persona.Id_Persona as id from persona where persona.Usuario='$user'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPrice($id){
        $sql=$this->con->query("SELECT price FROM inventario WHERE id_prod='$id'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInv($id){
        $sql=$this->con->query("SELECT inv FROM inventario WHERE id_prod='$id'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function dismInv($id, $quan){
        $sql=$this->con->prepare("UPDATE inventario SET inv=$quan WHERE id_prod='$id'");
        $sql->execute();
    }
    public function myTickets($id){
        $sql=$this->con->query("SELECT * FROM ticket WHERE Id_Persona='$id'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function misCompras($id){
        $sql=$this->con->query("SELECT * FROM compra WHERE id_ticket='$id'");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AllProducts(){
        $sql=$this->con->query("SELECT * FROM inventario");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function alterProduct($nombre, $precio, $descripc, $quan, $tag, $img, $id){
        $sql=$this->con->prepare("UPDATE inventario SET inv=$quan, name='$nombre', price=$precio, tag='$tag', img='$img', descrip='$descripc' WHERE id_prod='$id'");
        $sql->execute();
    }
    public function newProduct($nombre, $precio, $descripc, $quan, $tag, $img){
        $sql=$this->con->prepare("INSERT INTO inventario(inv,name,price,tag,img,descrip, sold) VALUES($quan, '$nombre', $precio, '$tag', '$img', '$descripc', 0)");
        var_dump($sql);
        $sql->execute();
    }
   }
