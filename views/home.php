<?php
    $blogs = $this->d['blogs'];
    $cover = $this->d['cover'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calisthenics</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/home.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/header.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/footer.css">
    <script src="https://kit.fontawesome.com/90de1e4f95.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php include 'views/includes/header.html' ?>
    <main>
        <section class="cover-container"> 
                  
            <?php   
                if($cover === NULL){
                    echo 'no hay cover';
                }else{
                    foreach ($cover as $post ) {    ?>
                        
                    <article class="cover">
                        <div class="cover-image">
                            <a href="<?php echo constant('URL'); ?>blog?slug=<?php echo $post->getSlug() ?>">
                                <img src="<?php echo constant('URL') ?>static/img/image/<?php echo $post->getImage() ?>" >
                            </a>
                        </div>
                        <div class="cover-info">
                            <a href="<?php echo constant('URL'); ?>blog?slug=<?php echo $post->getSlug() ?>">
                                <h3 class="cover-info-title"> <?php   echo $post->getTitle()    ?></h3>
                            </a>
                            <p class="cover-info-paragraph">
                                <?php echo $post->getResume()  ?>
                            </p>
                        </div>
                    </article>

                <?php } 
                }
                ?>
        </section>

        <section class="articles-container">
            <div class="carousel">
                <?php   
                $index = 0;
                if($blogs === NULL){
                    echo 'no hay blogs';
                }else{
                    foreach ($blogs as $blog ) {    
                        $index++;
                    ?>
                    <article class="<?php echo $index % 2 == 0 ? "zig-zag" : "article" ?>">
                        <div class="article-image">
                            <a href="<?php echo constant('URL'); ?>blog?slug=<?php echo $blog->getSlug() ?>">
                                <img src="<?php echo constant('URL') ?>static/img/image/<?php echo $blog->getImage() ?>" >
                            </a>
                        </div>
                        <div class="article-info">
                            <a href="<?php echo constant('URL'); ?>blog?slug=<?php echo $blog->getSlug() ?>">
                                <h3 class="article-info-title"><?php   echo $blog->getTitle() ?></h3>
                            </a>
                            <p class="article-info-resume"><?php   echo $blog->getResume() ?></p>
                        </div>
                    </article>
                <?php } 
                }
                ?>
            </div>
        </section>    
    </main>
    <?php include 'views/includes/footer.html' ?>
    <script src="<?php echo constant('URL'); ?>static/js/header.js"></script>
</body>
</html>