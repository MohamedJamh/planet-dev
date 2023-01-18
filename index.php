<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home</title>
    <?php
        require_once 'assets/includes/autoload.php';
        require_once 'assets/core/script.php';
        // session_destroy();
    ?>
</head>
<body>

    <form action="" method="POST">
        <input type="text" name="adress">
        <input type="password" name="password">
        <button type="submit" name="login">log</button>
    </form>
    <div>
        <?php
            if(isset($GLOBALS['message'])){
                echo $GLOBALS['message'];
                unset($GLOBALS['message']);
            }
        ?>
    </div>
</body>
</html>