<?php

$categoryQuery = $db->prepare("SELECT * FROM category");
$categoryQuery->execute();

?>

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