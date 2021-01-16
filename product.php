<?php
include 'header.php';

$getProduct = $db->prepare("SELECT * FROM product WHERE product_id=:product_id");
$getProduct->execute(array(
    'product_id' => $_GET['product_id']
));
$product = $getProduct->fetch(PDO::FETCH_ASSOC);

if (isset($_SESSION['user_email'])) {
    $userQuery = $db->prepare("SELECT * FROM user WHERE user_email=:user_email");
    $userQuery->execute(array(
        'user_email' => $_SESSION['user_email']
    ));
    $getUser = $userQuery->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title"><?php echo $product['product_name']; ?></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="dt-img">
                        <div class="detpricetag">
                            <div class="inner">$<?php echo $product['product_price']; ?></div>
                        </div>
                        <a class="fancybox" href="data:image/png;base64, <?php echo base64_encode($product['product_image']); ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="data:image/png;base64, <?php echo base64_encode($product['product_image']); ?>" alt="" class="img-responsive"></a>
                    </div>
                </div>
                <div class="col-md-6 det-desc">
                    <form action="./admin/manage/funcs.php" method="POST">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <input type="hidden" name="user_id" value="<?php echo $getUser['user_id']; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                <?php if (isset($_SESSION['user_email'])) { ?>
                                    <button name="addcart" type="submit" class="btn btn-default btn-red btn-sm"><span class="addchart">Add Cart</span></button>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--Products-->
            <div class="spacer"></div>
        </div>
        <!--Main content-->
        <?php include 'sidebar.php' ?>
        <!--sidebar-->
    </div>
</div>

<?php include 'footer.php' ?>