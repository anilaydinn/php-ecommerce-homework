<?php
error_reporting(false);
include 'header.php';

$productsQuery = $db->prepare("SELECT * FROM product");
$productsQuery->execute();

?>

<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product List <small>,

                                <?php if ($_GET['status'] == "true") { ?>
                                    <b style="color: green;">Success!</b>
                                <?php } else if ($_GET['status'] == "false") { ?>
                                    <b style="color: red;">Error!</b>
                                <?php } ?>

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
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Product Image</td>
                                    <td>Product Name</td>
                                    <td>Product Category</td>
                                    <td>Product Price</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($getProducts = $productsQuery->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $getProducts['product_id']; ?></td>
                                        <td align="center"><img width="100" height="100" src="data:image/png;base64, <?php echo base64_encode($getProducts['product_image']); ?>"></td>
                                        <td><?php echo $getProducts['product_name']; ?></td>
                                        <td><?php echo $getProducts['product_category']; ?></td>
                                        <td><?php echo $getProducts['product_price']; ?></td>
                                        <td><a href="./edit_product.php?product_id=<?php echo $getProducts['product_id']; ?>"><button class="btn btn-warning">Edit</button></a></td>
                                        <td><a href="../manage/funcs.php?product_id=<?php echo $getProducts['product_id']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>