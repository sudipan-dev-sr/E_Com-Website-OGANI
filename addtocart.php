<?php

session_start();
if(isset($_SESSION['mycart']))
    $cart = $_SESSION['mycart'];

else
    $cart = [];

if(isset($_POST['quantity'])){
    $quantity   = $_POST['quantity'];
    $pid        = $_POST['pid'];
    $cart[$pid] = $quantity;

}

if(isset($_GET['del_id'])) {
    $pid1 = $_GET['del_id'];

   
        unset($cart[$pid1]);
    
}


// Update Quentity
if (isset($_POST['newcart']))
    $cart = $_POST['newcart'];


$_SESSION['mycart']  = $cart;

 header("location: viewcart.php");





?>