<?php require_once "partials/_head.php"; ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2" >
			<h1>Add Product</h1>
			<hr>

			<form action="add_product" method="post">

				<div class="form-group">
					<label for="name" class="control-label">Name:</label>
					<input type="text" class="form-control" id="name" name="name" required >
				</div>

				<input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">

				<div class="form-group">
					<label for="description" class="control-label">Description:</label>
					<textarea class="form-control" rows="6" type="text" id="description" name="description" required ></textarea>
				</div>

				<div class="form-group">
					<label for="price" class="control-label">Price:</label>
					<input class="form-control" type="number" id="price" name="price" required >
				</div>

				<div class="form-group">
					<label for="image" class="control-label">Image:</label>
					<input class="form-control" type="text" id="image" name="image" required >
				</div>

				<input type="submit" value="Add" class="btn btn-primary btn-lg btn-block">
			</form>
		</div>
	</div>

<? require_once "partials/_footer.php" ?>