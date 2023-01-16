<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        require_once 'assets/includes/autoload.php';
        require_once 'assets/core/script.php';
        if(!isset($_SESSION['user'])) header('location: index.php'); 
    ?>
</head>
<body>
    <form action="" method="POST">
        <button type="submit" name="logout">log</button>
    </form>
    
    <?php
        addArticles();
    ?>
</body>
</html>