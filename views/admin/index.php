<?php
    $blogs = $this->d['blogs'];
    $categories = $this->d['categories'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consola de administración</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/admin/index.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/header.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/footer.css">
    <script src="https://kit.fontawesome.com/90de1e4f95.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'views/includes/header.html' ?>
    <main>
        <section class="statistics">
            <!-- <form action="newCategory" method="post">
                <input type="text" name="name" id="name"  placeholder="name Category" required>
                <button type="submit">Crear Category</button>
            </form> -->
            <div class="create-blog">
                <a href="<?php constant('URL') ?>admin/createCategory">Create</a>
            </div>
            <div class="create-blog">
                <a href="<?php constant('URL') ?>logout">logout</a>
            </div>
            <div class="statistics-blog">
                <div class="blog-count">
                    <div class="blog-name">
                        <h4><i class="fab fa-blogger"></i></h4>
                        <h4 class="name">Count</h4>
                    </div>
                    <h3 class="count">2</h3>
                </div>
                <div class="blog-last">
                    <div class="blog-name">
                        <h4><i class="fab fa-blogger"></i></h4>
                        <h4 class="name">last</h4>
                    </div>
                    <h3 class="title">calis</h3>
                </div>
            </div>
            <div class="statistics-category">
                <div class="category-count">
                    <div class="category-name">
                        <h4><i class="fas fa-tags"></i></h4>
                        <h4 class="name">Count</h4>
                    </div>
                    <h3 class="count">5</h3>
                </div>
                <div class="category-last">
                    <div class="category-name">
                        <h4><i class="fas fa-tags"></i></h4>
                        <h4 class="name">last</h4>
                    </div>
                    <h3 class="title">calis</h3>
                </div>
            </div>
        </section>
        <section class="blog-table">
            <div class="create-blog">
                <a href="<?php constant('URL') ?>admin/createBlog">Create</a>
            </div>

            <div class="table-blog">
                <table>
                    <thead>
                        <tr class="head-table">
                            <th>id</th>
                            <th>title blog</th>
                            <th colspan="2">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($blogs as $blog) { ?>
                           <tr>
                                <td><?php echo $blog->getId() ?></td>
                                <td><?php echo $blog->getTitle() ?></td>
                                <td>                                                       
                                    <i 
                                    data-id="<?php echo $blog->getId()?>" 
                                    data-title="<?php echo $blog->getTitle()?>"
                                    data-idcategory="<?php echo $blog->getIdCategory()?>"
                                    data-resume="<?php echo $blog->getResume()?>"
                                    data-content="<?php echo $blog->getContent()?>"
                                    data-cover="<?php echo $blog->getCover()?>"
                                    data-public="<?php echo $blog->getPublic()?>"
                                    data-image="<?php echo $blog->getImage()?>"
                                    class="far fa-edit edit" >                               
                                    </i>            
                                </td>     
                                <td><i data-id="<?php echo $blog->getId()?>" data-title="<?php echo $blog->getTitle()?>" class="far fa-trash-alt delete"></i></td>
                            </tr>
                            <?php
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <div class="container-modal-delete">
            <div class="modal-delete">
                <div class="modal-exit">
                    <h4 class="exit"><i class="far fa-times-circle"></i></h4>
                </div>
                <div class="modal-info">
                    <p class="question">are you sure you want to delete la caslistenia y sus ventajas?</p>
                    <h4 class="id"></h4>
                </div>
                <form method="get" class="buttons" action="admin/deleteBlog">
                    <button class="delete-button" name="id" value="">delete</button>
                    <button class="cancel-button" type="button" >cancel</button>
                </form>
            </div>
        </div>
        <div class="container-modal-edit">
            <div class="modal-edit">
                <div class="exit-form-edit">
                    <h4 class="exit-edit"><i class="far fa-times-circle"></i></h4>
                </div>
                <form  method="POST" enctype="multipart/form-data" class="modal-edit-form">
                    
                    <input type="text" name="title" id="title"  placeholder="title"  value="">
                    <select id="idCategory" name="idCategory" class="custom-select" value="">
                            <option value="" disabled>Select category</option>
                            <?php
                                foreach($categories as $categorie){?>
                                   <option value="<?php echo $categorie->getId() ?>"> <?php echo $categorie->getName() ?></option>";
                            <?php
                                }
                            ?>
                    </select>
                    <input type="text" name="resume" id="resume"  placeholder="resume" value="">
                    <textarea name="content" id="content" placeholder="content" rows="10" cols="10" ></textarea>
                    
                    <div class="options">
                        <div class="cover-options">
                            <label for="">Cover</label>
                            <div class="option1">
                                <input type="radio" id="cover1" name="cover" value="1">
                                <label for="">True</label>
                            </div>
                            <div class="option2">
                                <input type="radio" id="cover0" name="cover" value="0">
                                <label for="">False</label>
                            </div>
                        </div>
                        <div class="public-options">
                            <label for="">Public</label>
                            <div class="option1">
                                <input type="radio" id="public1" name="public" value="1">
                                <label for="">True</label>
                            </div>
                            <div class="option2">
                                <input type="radio" id="public0" name="public" value="0">
                                <label for="">False</label>
                            </div>
                        </div>
                    </div>
                    <div class="image-container">
                        <img class="image-current"  src="<?php echo constant('URL') ?>static/img/image/" alt="">
                        <input type="file" name="image" id="image" >
                    </div>
                    
                    <button type="submit" class="btn-edit-form">Update Blog</button>
                </form>
            </div>
        </div>

    </main>
    <?php include 'views/includes/footer.html' ?>     
    <script src="<?php echo constant('URL'); ?>static/js/header.js"></script>
    <script src="<?php echo constant('URL'); ?>static/js/tableBlog.js"></script>
</body>
</html>