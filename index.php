<?php
    include 'Library/config.php';
    include 'Library/header.php';
 ?>

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Latest Product</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter">
                <?php $sql = "SELECT * From `products` ORDER BY `id` DESC LIMIT 0,12";
                        $res = $db->query($sql);
                        while($row = $res->fetch_object()){
                            print ' <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                        <div class="featured__item">


                        <div class="featured__item__pic set-bg" data-setbg="'.$row->image.'"></div>

                        
                        <div class="featured__item__text">
                            <h6><a href="details.php?pid='.$row->id.'">'.$row->name.'</a></h6>
                            <h5>'.$row->price.'</h5>
                        </div>
                    </div>
                    </div>';
                     }
                ?>
                
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

     <?php
    include 'Library/footer.php'
    ?>
   