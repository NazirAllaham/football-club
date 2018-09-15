<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
    $title = 'Real Madrid &copy;';
    require 'partials\head.view.php';
    ?>
</head>
<body>
    <?php include('partials\header.view.php') ?>
    
    <div class="container">
        <div class="row">
        <div class="col-md-8 mx-auto">
        <?php foreach ($posts as $index => $post): ?>
            <?php if($index%3 === 0) : ?>
            <div class="row my-2">
            <?php elseif($index%3 === 1) : ?>
            <div class="row my-2">
                <div class="col-6 m-0 pl-1">
            <?php else : ?>
            <div class="col-6 m-0 pr-1">        
            <?php endif; ?>

            <div class="post post-<?= $index%3 === 0 ? 'large':'small' ?>">
                <div class="post-header">
                    <?php if($post->has($app, 'videos')) : ?>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="100%" height="100%" src="<?= $post->gallery($app, 'videos')[0]->href ?>"></iframe>
                    </div>
                    <?php elseif($post->has($app, 'images')) :?>
                    <img src="<?= $post->gallery($app, 'images')[0]->href ?>" class="img-fluid">
                    <?php endif; ?>
                </div>

                <div class="post-body">
                    <h3 class="post-title">
                        <?= $post->short_title ?>
                    </h3>
                    <p class="post-text mb-0" ><?= $post->body ?></p>
                    <button class="btn btn-primary py-0" onclick="ToggleText(this, <?= $post->id ?>)">show more</button>
                </div>
                
                <div class="post-footer" style="text-align: right">
                    <a href="" class="m-1"><i class="share share-facebook p-2 fab fa-facebook fa-2x"></i></a>
                    <a href="" class="m-1"><i class="share share-twitter p-2 fab fa-twitter fa-2x"></i></a>
                </div>
            </div>

            <?php if($index%3 === 0) : ?>
            </div>
            <?php elseif($index%3 === 1) : ?>
            </div>
            <?php else : ?>
            </div>
            </div>        
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
        </div>
    </div>
  
<script>
function ToggleText(toggler, id) {
    if(toggler.innerHTML === "show more")
    {
        toggler.innerHTML = "show less";
        toggler.style.margin = "6px 0";
        document.getElementsByClassName('post-text')[id-1].style.height = "auto";
    }
    else
    {
        toggler.innerHTML = "show more";
        toggler.style.margin = "0";
        document.getElementsByClassName('post-text')[id-1].style.height = "35px";
    }
}
</script>
    
    <?php include('partials\footer.view.php') ?>
</body>
</html>