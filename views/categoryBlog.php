<?php
    $blogByCategory = $this->d['blogByCategory'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calisthenics Category</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/category.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/header.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/footer.css">
    <script src="https://kit.fontawesome.com/90de1e4f95.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php include 'views/includes/header.html' ?>
    <main>
 
        <?php  
            $id = $blogByCategory[0]->getIdCategory() ;
        ?>
        <h2 class='name-category'> <?php echo ($id == 4  ?  'Routines' :  ($id == 8 ? 'Exercise' : ($id == 9 ? 'Healthy' : 'no')))  ?> </h2>

        <section class="articles-container">
            <?php   
            if($blogByCategory === NULL){
                echo 'ashee';
            }else{
                foreach ($blogByCategory as $blog ) {    ?>
                    
                <article class="article">
                    <div class="article-image">
                        <a href="<?php echo constant('URL'); ?>blog?slug=<?php echo $blog->getSlug() ?>">
                            <img  src="<?php echo constant('URL') ?>static/img/image/<?php echo $blog->getImage() ?>" >
                        </a>
                    </div>
                    <div class="article-info">
                        <a href="<?php echo constant('URL'); ?>blog?slug=<?php echo $blog->getSlug() ?>">
                            <h3 class="article-info-title"><?php   echo $blog->getTitle() ?></h3>
                        </a>
                    </div>
                </article>

            <?php } 
            }
            ?>
        </section>
        
    </main>
    <?php include 'views/includes/footer.html' ?>
    <script src="<?php echo constant('URL'); ?>static/js/header.js"></script>
</body>
</html>