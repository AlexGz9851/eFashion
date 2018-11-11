<?php
    header("Content-Type: text/html;charset=utf-8");
    include "DBConnection.php";
    $db = new BaseDeDatos();
    if(isset($_SESSION['user'])):
        $id = $db->getUserID($_SESSION['user']);
        $id = $id[0]['id'];
        var_dump($id[0]);
        $total_price=0;
        foreach ($_SESSION['my_cart'] as $key => $value) {
            $prod_price=$db->getPrice($key);
            $total_price = $total_price + (float)$prod_price[0]['price'];
        }
        if($total_price>=200 && $total_price<500):
            $priceDesc = $total_price - ( $total_price * .03 );
        elseif($total_price>=500 && $total_price<800):
            $priceDesc = $total_price - ( $total_price * .05 );
        elseif($total_price>=800 && $total_price<1200):
            $priceDesc = $total_price - ( $total_price * .08 );
        elseif($total_price>=1200):
            $priceDesc = $total_price - ( $total_price * .10 );
        endif;
        if(!isset($priceDesc)):
            $priceDesc=$total_price;
        endif;
        $db->ticket($priceDesc, $total_price, $id);
        $ticket = $db->ticketID();
        var_dump($ticket); 
        foreach ($_SESSION['my_cart'] as $key => $value) {
            $totalInv= $db->getInv($key);
            $afterInv = $totalInv[0]['inv']-$value;
            if($afterInv>=0){
                $db->compra($id, $key, $value, $ticket);
                $db->dismInv($key, $afterInv);
            }
            else{
                $db->compra($id, $key, $afterInv, $ticket);
                $db->dismInv(0);
                $error="ERROR";
            }
        }
        unset($_SESSION['my_cart']);
        if(isset($error)):
            header("Location: ../../myPage?error=MaxQuant");    
        else:
            header("Location: ../../myPage");  
        endif;
    else:
        header("Location: ../../LogIn");
    endif;
    