<?php

include 'header.php';

$productQuery = $db->prepare("SELECT * FROM product WHERE product_id=:id");
$productQuery->execute(array(
    'id' => $_GET['product_id']
));
$getProduct = $productQuery->fetch(PDO::FETCH_ASSOC);

$categoryQuery = $db->prepare("SELECT * FROM category");
$categoryQuery->execute();

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Product<small>,

                            </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />

                        <div style="display: flex; justify-content: center;" class="row">
                            <div class="col-md-6">
                                <div>
                                    <div style="display: flex; justify-content: center;" class="image view view-first">
                                        <img src="data:image/png;base64, <?php echo base64_encode($getProduct['product_image']); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="../manage/funcs.php" enctype="multipart/form-data" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="hidden" name="product_id" value="<?php echo $getProduct['product_id']; ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Image <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="product_image" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="product_category" class="form-control">
                                        <option></option>
                                        <?php while ($getCategories = $categoryQuery->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <option><?php echo $getCategories['category_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="product_name" value="<?php echo $getProduct['product_name']; ?>" id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Price <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="product_price" value="<?php echo $getProduct['product_price']; ?>" id="first-name" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="updateproduct" class="btn btn-success">Update</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>
        <hr>
        <hr>
        <hr>
    </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>