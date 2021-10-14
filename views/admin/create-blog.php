<?php
    $categories = $this->d['categories'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create blog</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/admin/create-blog.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/header.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/footer.css">
    <script src="https://kit.fontawesome.com/90de1e4f95.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include 'views/includes/header.html' ?>
    <main>
        <section class="form-blog">
            <form action="newBlog" method="POST" enctype="multipart/form-data">
                
                <input type="text" name="title" id="title"  placeholder="title" required>
                <select id="idCategory" name="idCategory" class="custom-select" value="">
                            <option value="" disabled>Select category</option>
                            <?php
                                foreach($categories as $categorie){?>
                                   <option value="<?php echo $categorie->getId() ?>"> <?php echo $categorie->getName() ?></option>";
                            <?php
                                }
                            ?>
                    </select>
                <input type="text" name="resume" id="resume"  placeholder="resume" required>
                <textarea name="content" id="content" placeholder="content" rows="15" cols="15"></textarea required>
               
                <div class="options">
                    <div class="cover-options">
                        <label for="">Cover</label>
                        <div class="option1">
                            <input type="radio" id="cover" name="cover" value="1">
                            <label for="">True</label>
                        </div>
                        <div class="option2">
                            <input type="radio" id="cover" name="cover" value="0">
                            <label for="">False</label>
                        </div>
                    </div>
                    <div class="public-options">
                        <label for="">Public</label>
                        <div class="option1">
                            <input type="radio" id="public" name="public" value="1">
                            <label for="">True</label>
                        </div>
                        <div class="option2">
                            <input type="radio" id="public" name="public" value="0">
                            <label for="">False</label>
                        </div>
                    </div>
                </div>
                <input type="file" name="image" id="image" required>
                <div class="container-button">
                    <button type="submit">Crear Blog</button>
                </div>
            </form>
        </section>
      

    </main>
    
    <?php include 'views/includes/footer.html' ?>     
    <script src="<?php echo constant('URL'); ?>static/js/header.js"></script>
</body>
</html>