<?php

ini_set('display_errors', 1);
require_once "partials/_head.php";

?>

<div class="row">
    <div class="col-md-8 col-md-offset-2" >
        <h1>Login</h1>
        <hr>

        <form action="login" method="post">

            <div class="form-group">
                <label for="name" class="control-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required >
            </div>
            <div class="form-group">
                <label for="email" class="control-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required >
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password:</label>
                <input class="form-control" type="password" id="password" name="password" required >
            </div>

            <input type="submit" value="Login" class="btn btn-primary btn-lg btn-block">
        </form>
    </div>
</div>

<? require_once "partials/_footer.php" ?>