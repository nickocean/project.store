<?php

    ini_set('display_errors', 1);
    require_once "../resources/views/partials/_head.php";
    require_once "../app/bootstrap.php";
    $content = require_once "../resources.php" ?>

<body>

<div class="row">
    <? foreach ($content as $product) : ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="<?= $product['image'] ?>">
            <div class="caption">
                <h3><?= $product['name'] ?></h3>
                <p><?= $product['text'] ?></p>
                <p><a href="../resources/views/basket.php" class="btn btn-primary" role="button">Buy</a> <a href="../resources/views/product.php" class="btn btn-default" role="button">Read More</a></p>
            </div>
        </div>
    </div>
    <? endforeach; ?>
</div>
<div class="row">
    <? foreach ($content as $product) : ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?= $product['image'] ?>" alt="...">
                <div class="caption">
                    <h3><?= $product['name'] ?></h3>
                    <p><?= $product['text'] ?></p>
                    <p><a href="../resources/views/basket.php" class="btn btn-primary" role="button">Buy</a> <a href="../resources/views/product.php" class="btn btn-default" role="button">Read More</a></p>
                </div>
            </div>
        </div>
    <? endforeach; ?>
</div>


<? require_once "../resources/views/partials/_footer.php" ?>