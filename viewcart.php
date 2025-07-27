<?php
    
    include 'Library/config.php';
    include 'Library/header.php';  
    if(isset($_SESSION['mycart']) && count($_SESSION['mycart'])>0){
?>

<form method= "post" action ="addtocart.php" >
    <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table class = "table">
                                <thead>
                                    <tr>
                                        <th>Remove</th>
                                        <th>Sl.No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                
                                $total = 0;
                                $subtotal = 0;
                                $c = 0;

                                foreach($_SESSION['mycart'] as $pid=>$quantity){

                                    $c++;

                                    $sql = "SELECT * From `products` WHERE `id`='$pid'";
                                    $res = $db->query($sql);
                                    $row = $res->fetch_object();

                                    $subtotal = $quantity * $row->price;
                                    $total += $subtotal;

                                    print '<tr>
                                        <td class="shoping__cart__item__close"><a href = "addtocart.php?del_id='.$pid.'">
                                            <span class="icon_close"></span>
                                        </td>

                                        <td> '.$c.' </td>


                                        <td>
                                            <img src=" '.$row->image.' " alt="">
                                        </td>

                                        <td>
                                            <h5>'.$row->name.'</h5>
                                        </td>

                                        <td class="shoping__cart__quantity">
                                            <div class = "quantity">
                                                <div class = "pro-qty">
                                                    <input type = "text" name = "newcart['.$pid.']" value = "'.$quantity.'">
                                                </div>
                                            </div>
                                        </td>

                                        <td class="shoping__cart__price">
                                            '.$row->price.'
                                        </td>
                                        <td class="shoping__cart__total">
                                            &#8377;'.$subtotal.'
                                        </td>
                                        
                                        
                                        
                                    </tr>';
                                }

                                $_SESSION['total'] = $total;
                                ?>   
                                </tbody>
                                                                                                  

                                <tfoot>
                                    <tr>

                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><button type = "submit" class = "btn primary-btn cart-btn">Upadate</td>
                                        <td>Total</td>
                                        <td>&#8377;<?=$total?></td>

                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                        <div class="shoping__cart__btns">
                            <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        </div>
                        </center>
                    </div>
                    <div class="col-lg-12">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Total <span>&#8377;<?=$total?></span></li>
                                <?php
                                if($total>499){
                                    $shipping =0;
                                    $total=$total;
                                }

                                else{
                                    $shipping = 49.09;
                                    $total += $shipping;
                                }

                                ?>
                                <li>Shipping Charge <span>&#8377; <?=$shipping?></span></li>
                                <li>Total <span>&#8377; <?=$total?></span></li>
                            </ul>
                            <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- Shoping Cart Section End -->
     <?php
    }
    else{
       print   '<div class="col-lg-12" style = "top:50px;">
                <center>
                <h2>Oops! Your Cart is Empty</h2><br>
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </center>
            </div>';

    }
    include 'Library/footer.php'
    ?>