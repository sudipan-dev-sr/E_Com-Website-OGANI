<?php
include("library/config.php");  
include("library/header.php");  

if (isset($_GET['query'])) {
    $search = $_GET['query'];

    

        $sql = "SELECT * FROM `products` WHERE `name` LIKE '%$search%'";
        $res = $db->query($sql);

        // print "<h2>Search Results for '$search'</h2>";

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_object()) {
                // print "<div>";
                // print "<h3>".$row->image."</h3>";
                // print "<h3>".$row->name."</h3>";
                // print "<p>₹".$row->price."</p>";
                // print "<a href='details.php?pid=".$row->id."'>View Details</a>";
                // print "</div>";
                print ' <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                        <div class="featured__item">


                        <div class="featured__item__pic set-bg" data-setbg="'.$row->image.'"></div>

                        
                        <div class="featured__item__text">
                        <h5>&#8377;'.$row->price.'</h5>
                            <h6>'.$row->name.'</h6>
                          <h6><a href="details.php?pid='.$row->id.'">View Details</a></h6>
                        </div>
                        
                    </div>
                    </div>';
            }
        } 
        else {
            print '<h4>No products found.</h4>
            <center><div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div></center>
            ';
        }
    }


    include("library/footer.php");  
?>

