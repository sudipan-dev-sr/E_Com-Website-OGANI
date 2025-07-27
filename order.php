<?php
    include('Library/config.php');
    include('Library/header.php');
    


    // INSERT INTO CUSTOMER
    if(isset($_POST['fullname']))
    {
        $time = time();
        $sql= "INSERT INTO `customers` (`customer_id`, `name`, `email`, `password`, `phone`, `address`, `timestamp`) VALUES (NULL, '$_POST[fullname]', '$_POST[email]', '12345', '$_POST[phone]', '$_POST[address]', '$time')";
        $db->query($sql);
        
        $cust_id = $db->insert_id;


    //INSERT INTO ORDER
        $sql = "INSERT INTO `order_details` (`order_id`, `customer_id`, `ship_fullname`, `ship_phone`, `ship_address`, `payment_info`, `timestamp`, `status`)VALUES (NULL, '$cust_id', '$_POST[ship_fullname]', '$_POST[ship_phone]', '$_POST[ship_address]', '$_POST[payment_info]', '$time', 'new')";
        $db->query($sql);

        $order_id = $db->insert_id;
        
        //INSERT INTO SHOPPING CART

        foreach($_SESSION['mycart'] as $pid=>$quantity){

            $sql = "SELECT * From `products`WHERE`id`='$pid'";
            $res = $db->query($sql);
            $row = $res->fetch_object();

            $sql1 = "INSERT INTO `shopping_cart` (`cart_item_id`, `order_id`, `pid`, `quantity`, `product_name`, `product_price`) VALUES (NULL, '$order_id', '$pid', '$quantity', '$row->name', '$row->price');";
            $db->query($sql1);
        }
    }
    if($_POST['payment_info']=="cod"){
        print "<H1>Thank You for Your Order!  Your order will delivery Soon.</H1>";
    }
    if($_POST['payment_info']=="paypal"){
       print '<form id="form1" action="https://www.paypal.com/cgi-bin/webscr"       method="post">
	    <input type="hidden" name="cmd" value="_cart" />
	    <input type="hidden" name="upload" value="1">  

	    <input type="hidden" name="business" value="ipeg.solutions@gmail.com" />';
        $c= 0 ;
		foreach($_SESSION['mycart'] as $pid=>$quantity){

            $sql = "SELECT * From `products` WHERE `id`='$pid'";
            $res = $db->query($sql);
            $row = $res->fetch_object();

            $c++;
            
                print '<input type="hidden" name="item_name_'.$c.'" value="'.$row->name.'" />
                <input type="hidden" name="amount_'.$c.'"    value="'.$row->price.'" />
                <input type="hidden" name="quantity_'.$c.'"  value="'.$quantity.'" />';
        }
        $c++;
                 print '<input type="hidden" name="item_name_'.$c.'" value="Tax+Shipping" />
                <input type="hidden" name="amount_'.$c.'""    value="0" />
                <input type="hidden" name="quantity_'.$c.'""  value="'.$quantity.'" />
                
                <INPUT TYPE="submit" value = "pay">
        
                </form>';
        print "Please Wait for 60 sec to load the page. If Not <a href = '#' class = \" btn btn-primery\" onclick = \"document.getElementById('form1').submit()\">Here</a> to submit maualy.";

    }
    
    unset($_SESSION['mycart']);

    include('Library/footer.php');
?>