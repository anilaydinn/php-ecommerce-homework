<?php include 'header.php';

$categoryQuery = $db->prepare("SELECT * FROM category");
$categoryQuery->execute();

if (isset($_GET['category_name'])) {
    $productQuery = $db->prepare("SELECT * FROM product WHERE product_category=:product_category");
    $productQuery->execute(array(
        'product_category' => $_GET['category_name']
    ));
} else {
    $productQuery = $db->prepare("SELECT * FROM product");
    $productQuery->execute();
}



?>



<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title">Products</div>
            </div>
            <div class="row prdct">
                <!--Products-->
                <?php while ($getProducts = $productQuery->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-md-4">
                        <div class="productwrap">
                            <div class="pr-img">
                                <a href="product.htm"><img src="data:image/png;base64, <?php echo base64_encode($getProducts['product_image']); ?>" alt="" class="img-responsive"></a>
                                <div class="pricetag">
                                    <div class="inner"><span class="price">$<?php echo $getProducts['product_price']; ?></span></div>
                                </div>
                            </div>
                            <span class="smalltitle"><a href="product.htm"><?php echo $getProducts['product_name']; ?></a></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!--Products-->
            <div class="spacer"></div>
        </div>
        <!--Main content-->
        <div class="col-md-3">
            <!--sidebar-->
            <div class="title-bg">
                <div class="title">Categories</div>
            </div>

            <div class="categorybox">
                <ul>
                    <?php while ($getCategory = $categoryQuery->fetch(PDO::FETCH_ASSOC)) { ?>
                        <li><a href="index.php?category_name=<?php echo $getCategory['category_name']; ?>"><?php echo $getCategory['category_name']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="ads">
                <a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
            </div>

        </div>
        <!--sidebar-->
    </div>
</div>

<?php include 'footer.php'; ?>