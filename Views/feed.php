<?php

//if (!isset($_COOKIE["user_id"])) {
//    header("Location: login.php");
//    exit();
//}

require ('../Models/Database.php');
require('../Controllers/FeedController.php');
use Feed\FeedController;

$feedController = new FeedController();
$username = $feedController->getUserName();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <link rel="stylesheet" type="text/css" href="./styles/feed.css">
    <title>Feed -
        <?php echo $feedController->getUserName(); ?>
    </title>
</head>

<body>
    <?php include './templates/header.php'; ?>
    <main>
        <?php require_once("./templates/side_profile.php"); ?>
        <section id="userFeed">
            <form method="post">
                <input type="text" name="createPost" placeholder='Quoi de neuf ?'>
                <button name="postPost">Post</button>
            </form>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type="submit" name="postImg">Upload File</button>
            </form>

            <?php foreach ($feedController->getFeedPosts() as $post): ?>
                <div class="postCard">
                    <div class="cardHeader">
                        <img src="./assets/imgs/users/picture/<?= "default_picture.jpg" ?>" alt="Image de <?= $post["author"]?>">
                        <div>
                            <span class="cardUserName">
                                <?= $post["Friends Pseudo"] ?? $post["author"] ?>
                            </span>
                            <span>
                                <?= $feedController->getDateDiff($post["date"]) ?>
                            </span>
                        </div>
                    </div>
                    <div class="cardBody">
                        <p>
                            <?= $post["content"] ?>
                        </p>
                        <form class="cardCta" method="post">
                            <input type="image" src="./assets/icons/commentary.svg" name="comment" alt="Comment Icon">
                            <input type="image" src="./assets/icons/like.svg" name="like" alt="Like Icon">
                        </form>
                    </div>
                    <div class="cardFooter">
                        <p>
                            <?= $post["likesCount"] ?> ont aimé ce post
                        </p>
                        <p>
                            <?= $post["commentsCount"] ?> commentaires
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>