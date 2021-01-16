<?php
ob_start();
session_start();
include './admin/manage/connect.php';

$categoryQuery = $db->prepare("SELECT * FROM category");
$categoryQuery->execute();

if (isset($_SESSION['user_email'])) {
    $userQuery = $db->prepare("SELECT * FROM user WHERE user_email=:user_email");
    $userQuery->execute(array(
        'user_email' => $_SESSION['user_email']
    ));
    $getUser = $userQuery->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Theme</title>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

    <!-- Main Style -->
    <link rel="stylesheet" href="style.css">

    <!-- owl Style -->
    <link rel="stylesheet" href="css\owl.carousel.css">
    <link rel="stylesheet" href="css\owl.transitions.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">
        <div class="header">
            <!--Header -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-md-4 main-logo">
                        <a href="index.php"><img src="images\logo.png" alt="logo" class="logo img-responsive"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="pushright">
                            <div class="top">
                                <?php if (isset($_SESSION['user_email'])) { ?>
                                    <a class="btn btn-default btn-dark">Hello <?php echo $getUser['user_username']; ?></a>
                                <?php } else {  ?>
                                    <a href="#" id="reg" class="btn btn-default btn-dark">Login<span>-- Or --</span>Register</a>
                                <?php } ?>
                                <div class="regwrap">
                                    <div class="row">
                                        <div class="col-md-6 regform">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">Login</div>
                                            </div>

                                            <form action="./admin/manage/funcs.php" method="POST" role="form">
                                                <div class="form-group">
                                                    <input type="text" name="user_email" class="form-control" id="username" placeholder="Username">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="user_password" class="form-control" id="password" placeholder="password">
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-default btn-red btn-sm" type="submit" name="userlogin">Sign In</button>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">Register</div>
                                            </div>
                                            <p>
                                                New User? By creating an account you be able to shop faster, be up to date on an order's status...
                                            </p>
                                            <a href="register.php"><button class="btn btn-default btn-yellow">Register Now</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="srch-wrap">
                                    <a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="srchwrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="search.php" method="POST" class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="search" class="col-sm-2 control-label">Search</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="search_query" class="form-control" id="search">
                                                    </div>
                                                    <button class="col-sm-2 btn btn-primary" name="search" type="submit">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashed"></div>
        </div>
        <!--Header -->

        <div class="main-nav">
            <!--end main-nav -->
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php" class="active">Home</a>
                                        <div class="curve"></div>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <?php while ($getCategory = $categoryQuery->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <li><a href="index.php?category_name=<?php echo $getCategory['category_name']; ?>"><?php echo $getCategory['category_name']; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 machart">
                            <?php if (isset($_SESSION['user_email'])) { ?>
                                <button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Cart</span>|<span class="allprice">$0.00</span></button>
                            <?php } ?>

                            <div class="popcart">
                                <table class="table table-condensed popcart-inner">
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
                                                <td>
                                                    <a href="product.php?product_id=<?php echo $product_id; ?>"><img width="100" src="data:image/png;base64, <?php echo base64_encode($getProduct['product_image']); ?>" alt="" class="img-responsive"></a>
                                                </td>
                                                <td><a href="product.php?product_id=<?php echo $product_id; ?>"><?php echo $getProduct['product_name']; ?></a><br><span>Color: green</span></td>
                                                <td>$<?php echo $getProduct['product_price']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                                <br>
                                <div class="btn-popcart">
                                    <a href="cart.php" class="btn btn-default btn-red btn-sm">More</a>
                                </div>
                                <div class="popcart-tot">
                                    <p>
                                        Total<br>
                                        <span>$<?php echo $total_price; ?></span>
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php if (isset($_SESSION['user_email'])) { ?>
                <ul class="small-menu">
                    <!--small-nav -->
                    <li><a href="cart.php" class="myshop">Shopping Chart</a></li>
                    <li><a href="logout.php" class="mycheck">Logout</a></li>
                </ul>
            <?php } ?>
            <!--small-nav -->
            <div class="clearfix"></div>
            <div class="lines"></div>
        </div>
        <!--end main-nav -->