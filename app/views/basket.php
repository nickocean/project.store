<?php

ini_set('display_errors', 1);
require_once "partials/_head.php";

?>


<body>
<div class="row">
    <div class="col-md-10">
        <h1>Basket</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <th>id</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Count</th>
            <th></th>
            </thead>
            <tbody>
            <? if (isset($_SESSION['products'])) :
            foreach ($_SESSION['products'] as $products => $product) : ?>
            <tr>
                <th><?=$product['id']?></th>
                <td><?=$product['name']?></td>
                <td><?=substr($product['description'], 0, 150) . '...'?></td>
                <td><?=$product['price']?></td>
                <td><?=$product['count']?></td>
                <td>
                    <a href="delete?id=<?=$product['id']?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <? endforeach; endif; ?>
            </tbody>
        </table>
            <? if (isset($_SESSION['user'])) : ?>
        <div class="col-md-8">
            <a href="buy" class="btn btn-lg btn-primary">Buy</a>
        </div>
            <? else : ?>
        <div class="col-md-8">
            <a href="form" class="btn btn-lg btn-primary">Login</a>
        </div>
            <? endif; ?>
    </div>
</div>

<? require_once "partials/_footer.php" ?>