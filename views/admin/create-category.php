<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
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
            <form action="newCategory" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" id="name"  placeholder="name" required>
                <div class="container-button">
                    <button type="submit">Crear Category</button>
                </div>
            </form>
        </section>
    </main>
    
    <?php include 'views/includes/footer.html' ?>     
    <script src="<?php echo constant('URL'); ?>static/js/header.js"></script>
</body>
</html>