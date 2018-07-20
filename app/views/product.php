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
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                  data-toggle="tab">Details</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                                                   data-toggle="tab">Comments</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home"
                             style="margin-top: 20px"><?= $this->params['content'][0]['description'] ?></div>
                        <div role="tabpanel" class="tab-pane" id="messages" style="margin-top: 20px">
                            <?= $this->params['comments'][0]['text'] ?>
                        </div>
                    </div>

                </div>
                <p><a href="/basket?id=<?=$this->params['content'][0]['id']?>" class="btn btn-primary" role="button" style="margin-top: 20px">Add to Basket</a> <a href="/" class="btn btn-default" role="button" style="margin-top: 20px">Go back</a></p>
            </div>
        </div>
    </div>
</div>


<? require_once "partials/_footer.php" ?>
