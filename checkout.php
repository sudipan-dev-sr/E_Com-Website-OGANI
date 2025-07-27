<?php
    include 'Library/config.php';
    include 'Login_Check.php';
    include 'Library/header.php';

    $sql = "SELECT * FROM `customers` WHERE `customer_id` = '$_SESSION[UserId]'";
    $res = $db->query($sql);
    $row = $res->fetch_object();
     
 ?> 
 
 <!-- Checkout Section Begin -->
     <section class="checkout spad">
        <div class="container">
            
            <div class="checkout__form">
                
                <form action="order.php" method ="post" name = "f1">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h4>Billing Details</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Fullname<span>*</span></p>
                                        <input type="text" name ="fullname" value = "<?php print $row->name?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Address<span>*</span></p>
                                                <textarea name="address"  class="checkout__input__add" style = " border:1px solid #ebebeb; color: #b2b2b2;border-radius: 4px;height: 46px;width: 100%;padding-left: 20px;font-size: 16px;" ><?php print $row->address?></textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name ="phone" value = "<?php print $row->phone?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name = "email"value = "<?php print $row->email?>">
                                    </div>
                                </div>
                               
                            </div>
                           
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to Same address?
                                    <input type="checkbox" id="diff-acc" onclick = "sameaddress()">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <h4>Shipping Address</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Fullname<span>*</span></p>
                                        <input type="text" name ="ship_fullname">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Address<span>*</span></p>
                                                <textarea name= "ship_address" class="checkout__input__add" style = " border:1px solid #ebebeb; color: #b2b2b2;border-radius: 4px;height: 46px;width: 100%;padding-left: 20px;font-size: 16px;" ></textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name = "ship_phone">
                                    
                                    </div>
                                </div>
                              
                               
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Price</span></div>
                                <ul>
                                    <?php
                                        if(isset($_SESSION['mycart']) && count($_SESSION['mycart'])>0){
                                        $total = 0;
                                        $subtotal = 0;
                                        foreach($_SESSION['mycart'] as $pid=>$quantity){

                                        $sql = "SELECT * From `products` WHERE `id`='$pid'";
                                        $res = $db->query($sql);
                                        $row = $res->fetch_object();

                                        $subtotal = $quantity * $row->price;
                                        $total += $subtotal;

                                        print ' <li style = "font-size : 13px">'.$row->name.'<span>'.$row->price.'</span></li>';
                                         }
                                        }
                                    ?>
                                    
                                </ul>
                               
                                <div class="checkout__order__total">Total <span><?php print isset($total)?$total:0;?></span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Cash on Delivery
                                        <input type="radio" id="payment" name = "payment_info" value = "cod">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="radio" id="paypal"name = "payment_info" value = "paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    

    <?php
    include 'Library/footer.php'
    ?>
    


    <script>
        function sameaddress(){
           
            var ch           = document.getElementById('diff-acc').checked;
            var cust_name    = document.f1.fullname.value
            var cust_mobile  = document.f1.phone.value
            var cust_address = document.f1.address.value
            

            if (ch){
                document.f1.ship_fullname.value     = cust_name
                document.f1.ship_phone.value   = cust_mobile
                document.f1.ship_address.value  = cust_address
            }

        else{
            document.f1.ship_fullname.value         = ""
                document.f1.ship_phone.value   = ""
                document.f1.ship_address.value  = ""
            }
        }

    </script>