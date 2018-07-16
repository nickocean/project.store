<?php

ini_set('display_errors', 1);
require_once "_head.php";
$content = require_once "../resources.php";

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
            <th></th>
            </thead>

            <? foreach ($content as $product) : ?>
            <tbody>
            <tr>
                <th><?=$product['id']?></th>
                <td><?=$product['name']?></td>
                <td><?=$product['text']?></td>
                <td><?=$product['price']?></td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            </tbody>
            <? endforeach; ?>
        </table>
        <div class="col-md-8">
            <a href="#" class="btn btn-lg btn-primary">Buy</a>
        </div>
    </div>
</div>

<? require_once "_footer.php" ?>
