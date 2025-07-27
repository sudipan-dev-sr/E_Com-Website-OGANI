<?php
    include 'Library/config.php';
    include 'Library/header.php';


    if (isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $sql = "SELECT * From `products` WHERE `id`='$pid'";
    $res = $db->query($sql);
    $row = $res->fetch_object();
     ?>


    <!-- Product Details Section Begin -->
     <form method = "post" action = "addtocart.php">
        <input type = "hidden" name = "pid" value = "<?=$row->id?>"> 
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?=$row->image?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?=$row->name?></h3>
                        <div class="product__details__price">&#8377;<?=$row->price?></div>
                        <p><?=$row->details?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" name = "quantity">
                                </div>
                            </div>
                        </div>
                        <button type = "submit" class="btn primary-btn">ADD TO CARD</button>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->



<?php
    }
    include 'Library/footer.php'
    ?>