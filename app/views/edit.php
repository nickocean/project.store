<?php require_once "partials/_head.php"; ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2" >
			<h1>Edit Product</h1>
			<hr>

			<form action="edit_product?id=<?= $this->params['product'][0]['id'] ?>" method="post">

				<div class="form-group">
					<label for="name" class="control-label">Name:</label>
					<input type="text" class="form-control" id="name" name="name" value="<?= $this->params['product'][0]['name'] ?>" required >
				</div>

				<input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">

				<div class="form-group">
					<label for="description" class="control-label">Description:</label>
					<textarea class="form-control" rows="6" type="text" id="description" name="description" required ><?= $this->params['product'][0]['description'] ?></textarea>
				</div>

				<div class="form-group">
					<label for="price" class="control-label">Price:</label>
					<input class="form-control" type="number" id="price" name="price" value="<?= $this->params['product'][0]['price'] ?>" required >
				</div>

				<div class="form-group">
					<label for="image" class="control-label">Image:</label>
					<input class="form-control" type="text" id="image" name="image" value="<?= $this->params['product'][0]['image'] ?>" required >
				</div>

				<input type="submit" value="Edit" class="btn btn-primary btn-lg btn-block">
			</form>
			<a class="btn btn-danger btn-lg btn-block" href="delete_product?id=<?= $this->params['product'][0]['id'] ?>" style="margin-top: 5px">Delete</a>
		</div>
	</div>

<? require_once "partials/_footer.php" ?>