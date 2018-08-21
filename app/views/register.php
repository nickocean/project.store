<?php

require_once "partials/_head.php";

?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2" >
			<h1>Registration</h1>
			<hr>

            <? if (!isset($_POST)) : ?>
                <form action="registration" method="post">

                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required >
                    </div>

                    <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">

                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required >
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password:</label>
                        <input class="form-control" type="password" id="password" name="password" required >
                    </div>
                    <div class="form-group">
                        <label for="confirm" class="control-label">Confirm Password:</label>
                        <input class="form-control" type="password" id="confirm" name="confirm" required >
                    </div>

                    <input type="submit" value="Register" class="btn btn-primary btn-lg btn-block">
                </form>
            <? else : ?>
                <form action="registration" method="post">

                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$_POST['name']?>" required >
                    </div>

                    <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">

                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$_POST['email']?>" required >
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password:</label>
                        <input class="form-control" type="password" id="password" name="password" value="<?=$_POST['password']?>" required >
                    </div>
                    <div class="form-group">
                        <label for="confirm" class="control-label">Confirm Password:</label>
                        <input class="form-control" type="password" id="confirm" name="confirm" value="<?=$_POST['confirm']?>" required >
                    </div>

                    <input type="submit" value="Register" class="btn btn-primary btn-lg btn-block">
                </form>
            <? endif; ?>
		</div>
	</div>

<? require_once "partials/_footer.php" ?>