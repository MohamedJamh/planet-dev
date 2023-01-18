<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <?php
        require_once 'assets/includes/autoload.php';
        require_once 'assets/core/script.php';
        if(!isset($_SESSION['user'])) header('location: index.php'); 
    ?>
</head>
<body>
    <form action="" method="POST">
        <button type="submit" name="logout">logOut</button>
    </form>
    <?php
        // addArticles();

    ?>
    <div>
        <?php
            if(isset($GLOBALS['message'])){
                echo $GLOBALS['message'];
                unset($GLOBALS['message']);
            }
        ?>
    </div>
    <script>
        $.get("assets/core/script.php",{ addArtcl : true}, function(data,status){}, 'json');
        // $.ajax({
        //     url: `assets/core/data.php`,
        //     dataType: "json",
        //     success: (data,status) => {
        //         console.log(data);
        //     }
        // });
    </script>
</body>
</html>