<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/header.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/footer.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/static/css/login.css">
</head>
<body>
    <?php include 'views/includes/header.html' ?>
    <main>
        <h2>Login</h2>
        <p><?php 
            $this->showMessages();
        ?></p>      
        <form action="<?php echo constant('URL'); ?>/login/authenticate" method="POST"> 
            <input type="text" name="username" id="username" autocomplete="off" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit">Log in</button>
        </form>
    </main>
    <?php include 'views/includes/footer.html' ?>
    <script src="<?php echo constant('URL'); ?>static/js/header.js"></script>
</body>
</html>