<?php

require_once "partials/_head.php";

?>

<body>

<div class="row">
    <? foreach ($this->params['content'] as $products => $product) : ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?= $product['image'] ?>">
                <div class="caption">
                    <h3><?= $product['name'] ?></h3>
                    <p><?= substr($product['description'], 0, 350) . '...' ?></p>
                    <p>
                        <? if (isset($_SESSION['user'])) : ?>
                        <a href="basket?id=<?=$product['id']?>" class="btn btn-success" role="button">Add to Basket</a>
                        <? endif; ?>
                        <a href="product?id=<?= $product['id'] ?>" class="btn btn-primary" role="button">Read More</a>
                        <? if ($_SESSION['user'][0]['name'] === 'Admin') : ?>
                        <a href="edit?id=<?= $product['id'] ?>" class="btn btn-warning" role="button">Edit</a>
                        <? endif; ?>
                    </p>
                </div>
            </div>
        </div>
    <? endforeach; ?>
    <div class="col-md-10 col-md-offset-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg">

                <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                <li class="page-item"><a class="page-link" href="?page=2">2</a></li>
                <li class="page-item"><a class="page-link" href="?page=3">3</a></li>
                <li class="page-item"><a class="page-link" href="?page=4">4</a></li>

            </ul>
        </nav>
    </div>
</div>


<? require_once "partials/_footer.php" ?>


