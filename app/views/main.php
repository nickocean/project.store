<?php

require_once "_head.php";
?>

<body>

<div class="row">
    <? foreach ($this->params['content'] as $products => $product) : ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?= $product['image'] ?>">
                <div class="caption">
                    <h3><?= $product['name'] ?></h3>
                    <p><?= substr($product['description'], 0, 400) . '...' ?></p>
                    <p><a href="/basket" class="btn btn-primary" role="button">Buy</a> <a href="/product?id=<?= $product['id'] ?>" class="btn btn-default" role="button">Read More</a></p>
                </div>
            </div>
        </div>
    <? endforeach; ?>
</div>


<? require_once "_footer.php" ?>

