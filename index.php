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
                                <a href="product.php?product_id=<?php echo $getProducts['product_id']; ?>"><img src="data:image/png;base64, <?php echo base64_encode($getProducts['product_image']); ?>" alt="" class="img-responsive"></a>
                                <div class="pricetag">
                                    <div class="inner"><span class="price">$<?php echo $getProducts['product_price']; ?></span></div>
                                </div>
                            </div>
                            <span class="smalltitle"><a href="product.php?product_id=<?php echo $getProducts['product_id']; ?>"><?php echo $getProducts['product_name']; ?></a></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!--Products-->
            <div class="spacer"></div>
        </div>
        <!--Main content-->
        <?php include 'sidebar.php' ?>
        <!--sidebar-->
    </div>
</div>

<?php include 'footer.php'; ?>