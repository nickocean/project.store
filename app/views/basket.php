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
            <th></th>
            </thead>
            <tbody>
            <tr>
                <th><?=$this->params['content'][0]['id']?></th>
                <td><?=$this->params['content'][0]['name']?></td>
                <td><?=$this->params['content'][0]['description']?></td>
                <td><?=$this->params['content'][0]['price']?></td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="col-md-8">
            <a href="#" class="btn btn-lg btn-primary">Buy</a>
        </div>
    </div>
</div>

<? require_once "partials/_footer.php" ?>
