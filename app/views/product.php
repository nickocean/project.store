<? require_once "partials/_head.php"; ?>

<body>

<div class="row">
    <div class="col-sm-4 col-md-6 col-md-offset-3">
        <div class="thumbnail">
            <img src="<?= $this->params['content'][0]['image'] ?>" alt="...">
            <div class="caption">
                <h3><?= $this->params['content'][0]['name'] ?></h3>
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Details</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home" style="margin-top: 20px"><?= $this->params['content'][0]['description'] ?></div>
                            <p>
	                            <? if (isset($_SESSION['user'])) : ?>
                                <a href="basket?id=<?= $this->params['content'][0]['id'] ?>" class="btn btn-success" role="button" style="margin-top: 20px">Add to Basket</a>
                                <? endif; ?>
                                <a href="/" class="btn btn-primary" role="button" style="margin-top: 20px">Go back</a>
                            </p>
                        <div role="tabpanel" class="tab-pane" id="messages" style="margin-top: 20px">

							<? foreach ( $this->params['comments'] as $key => $comment ) : ?>
                                <div>
                                    <strong><?= $comment['user_name'][0]['name'] ?></strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-md-6 col-md-offset-0">
										<?= $comment['text'] ?>
                                    </div>
                                </div>
                                <hr>
							<? endforeach;
							if ( isset( $_SESSION['user'] ) ) : ?>
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-0">
                                        <form action="comment?id=<?= $this->params['content'][0]['id'] ?>" method="post" class="form-group-lg">
                                            <label for="text"></label>
                                            <textarea class="form-control" rows="5" id="text" name="text" type="text" placeholder="Type you comment here..."></textarea>
                                            <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">
                                            <input type="submit" value="Add Comment" class="btn btn-primary btn-lg btn-block" style="margin-top: 10px">
                                        </form>
                                    </div>
                                </div>
							<? endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<? require_once "partials/_footer.php" ?>
