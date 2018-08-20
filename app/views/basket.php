<?php

ini_set('display_errors', 1);
require_once "partials/_head.php";

?>


<body>
<div class="row">
    <div class="col-md-10 col-md-offset-5">
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
                <td><?=$product['price']?>$</td>
                <td><?=$product['count']?></td>
                <td>
                    <a href="delete?id=<?=$product['id']?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            <? endforeach; endif; ?>
            </tbody>
        </table>
        <div class="col-sm-12">
            <a href="buy" class="btn btn-lg btn-success" style="margin-top: 20px">Buy</a>
            <a href="/" class="btn btn-lg btn-primary" style="margin-top: 20px">Go back</a>
            <? if (isset($_SESSION['total_price'])) : ?>
            <h3 class="col-md-offset-9">Total price: <?=$_SESSION['total_price']?>$</h3>
            <? endif; ?>
        </div>
    </div>
</div>

<? require_once "partials/_footer.php" ?>