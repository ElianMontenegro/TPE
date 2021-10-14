<?php 
    $blog = $this->d['blog']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calisthenics</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/blog.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/header.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/footer.css">
    <script src="https://kit.fontawesome.com/90de1e4f95.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'views/includes/header.html' ?>
    <main>
        <section>
            <article class="article">
                <div class="article-descrip">
                    <h2 class="article-title">
                        <?php echo  $blog->getTitle(); ?>
                    </h2>
                    <p class="article-paragraph">
                        <?php echo  $blog->getResume(); ?>
                    </p>
                </div>
                <div class="article-image">
                    <img src="<?php echo constant('URL') ?>static/img/image/<?php echo  $blog->getImage(); ?>" alt="">
                </div>
                <div class="article-info">
                    <p class="article-info-content">
                        <?php echo  $blog->getContent(); ?>
                    </p>
                </div>
            </article>
        </section>
    </main>
    <?php include 'views/includes/footer.html' ?>
    <script src="<?php echo constant('URL'); ?>static/js/header.js"></script>
</body>
</html>