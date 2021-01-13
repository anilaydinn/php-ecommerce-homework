<?php
include 'header.php';

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
                        <h2>Category List <small>,



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
                                    <td>Category Name</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($getCategories = $categoryQuery->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $getCategories['category_id']; ?></td>
                                        <td><?php echo $getCategories['category_name']; ?></td>
                                        <td><a href="edit_category.php?category_id=<?php echo $getCategories['category_id']; ?>"><button class="btn btn-warning">Edit</button></a></td>
                                        <td><a href="../manage/funcs.php?category_id=<?php echo $getCategories['category_id']; ?>"><button class="btn btn-danger">Delete</button></a></td>
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
<!-- /page content -->

<?php include 'footer.php'; ?>