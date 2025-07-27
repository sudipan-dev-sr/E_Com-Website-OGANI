<?php
    include 'Library/config.php';
    include 'Library/header.php';


    $cid = $_GET['cid'];


    $sql = "SELECT * FROM `category` WHERE `cid` = '$_GET[cid]'";
    $res = $db->query($sql);
    ($row = $res->fetch_object());


    
    $sqlS = "SELECT * FROM `category` WHERE `parent_id` = '$cid'";
    $resS = $db->query($sqlS);
    $num = $resS->num_rows;
    if ($num){
        while($rowS = $resS->fetch_object()){

            print '<section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2> '.$rowS->cname.' </h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter">';
            getproduct($rowS->cid);
            print'</div>
            </div>
            </section>';
            

        }
    }
else { 
 ?>

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2> <?=$row->cname?> </h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                getproduct($cid);
                ?>
                </div>
             </div>
</section>
<?php
}
?>

    
    <!-- Featured Section End -->

     <?php
     function getproduct($cid){
        global $db;

        $sql = "SELECT * From `products` WHERE `cid`='$cid'";
        $res = $db->query($sql);
        while($row = $res->fetch_object()){
            print ' <div class="col-lg-3 col-md-4 col-sm-6 mix ">
            <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="'.$row->image.'">

            
                </div>
                <div class="featured__item__text">
                    <h6><a href="details.php?pid='.$row->id.'">'.$row->name.'</a></h6>
                    <h5>'.$row->price.'</h5>
                </div>
            </div>
            </div>';
        }
    }
    include 'Library/footer.php'
    ?>
   