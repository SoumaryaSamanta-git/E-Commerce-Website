<?php include 'config.php';  //include config
// set dynamic title
$db = new Database();
$db->select('options','site_title',null,null,null,null);
$result = $db->getResult();

if(!empty($result)){ 
    $title = $result[0]['site_title']; 
}else{ 
    $title = "Shopping Project";
}
// include header 
include 'header.php'; ?>
<div id="banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="banner-content ">
                    <div class="banner-carousel owl-carousel owl-theme">
                        <div class="item">
                            <img src="images/banner-img-5.jpg" alt=""/>
                        </div>
                        <div class="item">
                            <img src="images/banner-img-3.jpg" alt=""/>
                        </div>
                        <div class="item">
                            <img src="images/banner-img-7.jpg" alt=""/>
                        </div>
                        <div class="item">
                            <img src="images/banner-img-2.jpg" alt=""/>
                        </div>
                        <div class="item">
                            <img src="images/banner-img-9.jpg" alt=""/>
                        </div>
                        <div class="item">
                            <img src="images/banner-img-10.jpg" alt=""/>
                        </div>
                    </div>
                </div> -->

                <!-- Swiper -->
                <div class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                   <div class="swiper-slide"><img src="images/banner-img-12.jpg" alt="" onclick="goto(19)" /></div>
                    <div class="swiper-slide"><img src="images/banner-img-3.jpg" alt=""onclick="goto(18)" /></a></div>
                    <div class="swiper-slide"><img src="images/banner-img-11.jpg" alt=""onclick="goto(25)" /></a></div>
                    <div class="swiper-slide"><img src="images/banner-img-13.jpg" alt=""onclick="goto(26)" /></a></div>
                    <div class="swiper-slide"><img src="images/banner-img-9.jpg" alt=""onclick="goto(27)" /></a></div>
                    <div class="swiper-slide"><img src="images/banner-img-10.jpg" alt=""onclick="goto(28)" /></a></div> 
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.swiper-container {
width: 78%;
height: 78%;
cursor: pointer;
}

.swiper-slide {
text-align: center;
font-size: 18px;
background: #fff;

/* Center slide text vertically */
display: -webkit-box;
display: -ms-flexbox;
display: -webkit-flex;
display: flex;
-webkit-box-pack: center;
-ms-flex-pack: center;
-webkit-justify-content: center;
justify-content: center;
-webkit-box-align: center;
-ms-flex-align: center;
-webkit-align-items: center;
align-items: center;
}

.swiper-slide img {
display: block;
width: 78%;
height: 78%;
object-fit: cover;
}
</style>
<div class="product-section popular-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-head">Popular Products</h2>
                <div class="popular-carousel owl-carousel owl-theme">
                    <?php
                        $db->select('products','*',null,'product_views > 0','product_views DESC',10);
                        $result = $db->getResult();
                        if(count($result) > 0){
                            foreach($result as $row){ ?>
                    <div class="product-grid latest item">
                        <div class="product-image popular">
                            <a class="image" href="single_product.php?pid=<?php echo $row['product_id']; ?>">
                                <img class="pic-1" src="product-images/<?php echo $row['featured_image']; ?>">
                            </a>
                            <div class="product-button-group">
                                <a href="single_product.php?pid=<?php echo $row['product_id']; ?>" ><i class="fa fa-eye"></i></a>
                                <a href="" class="add-to-cart" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-shopping-cart"></i></a>
                                <a href="" class="add-to-wishlist" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3 class="title">
                                <a href="single_product.php?pid=<?php echo $row['product_id']; ?>"><?php echo substr($row['product_title'],0,25),'...'; ?></a>
                            </h3>
                            <div class="price"><?php echo $cur_format; ?> <?php echo $row['product_price']; ?></div>
                        </div>
                    </div>
                    <?php    }
                    }else{
                } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-head">Latest Products</h2>
                <div class="latest-carousel owl-carousel owl-theme">
                    <?php
            $db = new Database();
            $db->select('products','*',null,null,'product_id DESC',6);
            $result = $db->getResult();
            if(count($result) > 0){
                foreach($result as $row){ ?>
                    <div class="product-grid latest item">
                        <div class="product-image popular">
                            <a class="image" href="single_product.php?pid=<?php echo $row['product_id']; ?>">
                                <img class="pic-1" src="product-images/<?php echo $row['featured_image']; ?>">
                            </a>
                            <div class="product-button-group">
                                <a href="single_product.php?pid=<?php echo $row['product_id']; ?>" ><i class="fa fa-eye"></i></a>
                                <a href="" class="add-to-cart" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-shopping-cart"></i></a>
                                <a href="" class="add-to-wishlist" data-id="<?php echo $row['product_id']; ?>"><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3 class="title">
                                <a href="single_product.php?pid=<?php echo $row['product_id']; ?>"><?php echo substr($row['product_title'],0,25),'...'; ?></a>
                            </h3>
                            <div class="price"><?php echo $cur_format; ?> <?php echo $row['product_price']; ?></div>
                        </div>
                    </div>
        <?php    }
            }?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
const goto = (id) => {window.location = `./category.php?cat=${id}`;}
</script>