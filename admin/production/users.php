<?php

error_reporting(false);

include 'header.php';

$usersQuery = $db->prepare("SELECT * FROM user");
$usersQuery->execute();

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User List <small>,
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
                                    <td>Name</td>
                                    <td>Surname</td>
                                    <td>Email</td>
                                    <td>Phone</td>
                                    <td>Username</td>
                                    <td>Address</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($getUsers = $usersQuery->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $getUsers['user_id']; ?></td>
                                        <td><?php echo $getUsers['user_name']; ?></td>
                                        <td><?php echo $getUsers['user_surname']; ?></td>
                                        <td><?php echo $getUsers['user_email']; ?></td>
                                        <td><?php echo $getUsers['user_phone']; ?></td>
                                        <td><?php echo $getUsers['user_username']; ?></td>
                                        <td><?php echo $getUsers['user_address']; ?></td>
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