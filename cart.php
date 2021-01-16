<?php

include 'header.php';

$user_id = $getUser['user_id'];
$cartQuery = $db->prepare("SELECT * FROM cart WHERE user_id=:user_id");
$cartQuery->execute(array(
    'user_id' => $user_id
));

?>

<div class="container">
    <div class="title-bg">
        <div class="title">Shopping Cart</div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered chart">
            <thead>
                <tr>

                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $user_id = $getUser['user_id'];
                $cartQuery = $db->prepare("SELECT * FROM cart WHERE user_id=:user_id");
                $cartQuery->execute(array(
                    'user_id' => $user_id
                ));
                $total_price = 0;
                while ($getCartProducts = $cartQuery->fetch(PDO::FETCH_ASSOC)) {

                    $product_id = $getCartProducts['product_id'];
                    $productQuery = $db->prepare("SELECT * FROM product WHERE product_id=:product_id");
                    $productQuery->execute(array(
                        'product_id' => $product_id
                    ));
                    $getProduct = $productQuery->fetch(PDO::FETCH_ASSOC);

                    $total_price += $getProduct['product_price'];
                ?>
                    <tr>
                        <td><img width="100" src="data:image/png;base64, <?php echo base64_encode($getProduct['product_image']); ?>" alt="" class="img-responsive"></td>
                        <td><?php echo $getProduct['product_name']; ?></td>
                        <td>$<?php echo $getProduct['product_price']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-3 col-md-offset-3">
            <div class="subtotal-wrap">
                <div class="total">Total : <span class="bigprice">$<?php echo $total_price; ?></span></div>
                <div class="clearfix"></div>
                <form action="./admin/manage/funcs.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $getUser['user_id'] ?>">
                    <button name="pay" type="submit" class="btn btn-default btn-yellow">Pay</button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>