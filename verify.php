<?php
include 'Library/config.php';

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM `customers` WHERE `email` = '$email' AND `password` = '$password'";
    $res = $db->query($sql);
    $num =  $res->num_rows;

   if($num)
   {
     $row = $res->fetch_object();
    $_SESSION['Userlogin'] = true;
        $_SESSION['UserId']    = $row->customer_id;
        $_SESSION['Username']  = $row->name;
        
        header("location:index.php");
        
    }
   
}

?>