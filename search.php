<?php include 'header.php'; ?>

<?php

if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    $productQuery = $db->prepare("SELECT * FROM product WHERE product_name LIKE ?");
    $productQuery->execute(array("%$search_query%"));
} else {
    header("Location:index.php?search=empty");
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bread"><a href="#">Home</a> &rsaquo; Category</div>
                            <div class="bigtitle">Category</div>
                        </div>
                        <div class="col-md-3 col-md-offset-5">
                            <button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title">Category - All products</div>
                <div class="title-nav">
                    <a href="category.htm"><i class="fa fa-th-large"></i>grid</a>
                    <a href="category-list.htm"><i class="fa fa-bars"></i>List</a>
                </div>q
            </div>
            <div class="row prdct">
                <!--Products-->
                <?php while ($getProducts = $productQuery->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-md-4">
                        <div class="productwrap">
                            <div class="pr-img">
                                <a href="product.htm"><img src="data:image/png;base64, <?php echo base64_encode($getProducts['product_image']); ?>" alt="" class="img-responsive"></a>
                                <div class="pricetag">
                                    <div class="inner">$<?php echo $getProducts['product_price']; ?></div>
                                </div>
                            </div>
                            <span class="smalltitle"><a href="product.htm"><?php echo $getProducts['product_name']; ?></a></span>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <div class="col-md-3">
            <!--sidebar-->
            <div class="title-bg">
                <div class="title">Categories</div>
            </div>

            <div class="categorybox">
                <ul>
                    <li><a href="category.htm">Women Accessories</a></li>
                    <li><a href="category.htm">Men Shoes</a></li>
                    <li><a href="category.htm">Gift Specials</a></li>
                    <li><a href="category.htm">Electronics</a>
                        <ul>
                            <li><a href="#">iPhone 4S</a></li>
                            <li><a href="#">Samsung Galaxy</a></li>
                            <li><a href="#">MacBook Pro 17"</a></li>
                        </ul>
                    </li>
                    <li><a href="category.htm">On sale</a></li>
                    <li><a href="category.htm">Summer Specials</a></li>
                    <li><a href="category.htm">Electronics</a></li>
                    <li class="lastone"><a href="category.htm">Unique Stuff</a></li>
                </ul>
            </div>

            <div class="ads">
                <a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
            </div>

            <div class="title-bg">
                <div class="title">Best Seller</div>
            </div>
            <div class="best-seller">
                <ul>
                    <li class="clearfix">
                        <a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
                        <div class="mini-meta">
                            <a href="#" class="smalltitle2">Panasonic M3</a>
                            <p class="smallprice2">Price : $122</p>
                        </div>
                    </li>
                    <li class="clearfix">
                        <a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
                        <div class="mini-meta">
                            <a href="#" class="smalltitle2">Panasonic M3</a>
                            <p class="smallprice2">Price : $122</p>
                        </div>
                    </li>
                    <li class="clearfix">
                        <a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
                        <div class="mini-meta">
                            <a href="#" class="smalltitle2">Panasonic M3</a>
                            <p class="smallprice2">Price : $122</p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <!--sidebar-->
    </div>
    <div class="spacer"></div>
</div>
<?php include 'footer.php' ?>