<?php
require_once __DIR__ . '/vendor/autoload.php';
use Store\Category as Category;
use Store\DBConnect as DBConnect;
use Store\Store as Store;
$dBConnect = DBConnect::connectToDB();
Store::setPDO($dBConnect);
$categories = Store::getCategories();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Totally Pawesome</title>
    <link rel="stylesheet" type="text/css" href="src/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="src/assets/css/styles.css">
</head>
<body>
<section class="row banner">
    <div class="home col-xs-3 col-sm-2">
        <a href="#">
            <h2>Home</h2>
        </a>
    </div>
    <div class="shop-name col-xs-9 col-sm-10">
        <h2>Totally Pawesome</h2>
    </div>
</section>
<section class="row main">
    <div class="sidebar col-xs-3 col-sm-2">
        <?php
        foreach($categories as $category) {
            if($category instanceof Category) { ?>
                <a href="./src/app/products.php?categoryId=<?php echo $category->getId(); ?>">
                    <h4><?php echo $category->getCategoryName(); ?></h4>
                </a>
                <?php
            }
        }
        ?>
    </div>
    <div class="main-content col-xs-9 col-sm-10">
        <div class="row">
            <h2>Categories</h2>
        </div>
        <div class="row index-tiles">
            <?php
            foreach($categories as $category) {
                if($category instanceof Category) {
                    echo $category->getCategoryImageLink();
                }
            }
            ?>
        </div>
    </div>
</section>
</body>
</html>