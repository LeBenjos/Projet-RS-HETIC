<?php
require ('../Controllers/FeedController.php');
use Feed\FeedController;
$feedController = new FeedController();
$username = ($feedController)->getUserName();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Views/styles/style.css">
    <link rel="stylesheet" type="text/css" href="../Views/styles/feed.css">
    <link rel="stylesheet" type="text/css" href="../Views/styles/friends.css">
    <title>UniLink | <?= $this->_page;?></title>
</head>
<body>
<?php include '../Views/templates/header.php'; ?>
    <main>
        <?php require_once("../Views/templates/side_profile.php"); ?>
        <section id="friendsLayout">
            <h2>Mes Amis</h2>
            <?php foreach ($this->_friends as $friend): ?>
                <h3><?= $friend['user_firstname'] . " " . $friend['user_lastname'] ?></h3>
                <span><?= "@" . $friend['user_username']; ?></span>
                <a href="index.php?p=profile&profile_id=<?= $friend['user_id'] ?>">Voir le profile</a>
                <a href="index.php?p=managFriend&action=deleteFriend&user_id2=<?= $friend['user_id'] ?>">Supprimer</a>
                <a href="index.php?p=managFriend&action=blockFriend&user_id2=<?= $friend['user_id'] ?>">Bloquer</a>
            <?php endforeach; ?>

            <h2>Demandes en Attente</h2>
            <?php foreach ($this->_friends_request as $friend_request): ?>
                <h3><?= $friend_request['user_firstname'] . " " . $friend_request['user_lastname'] ?></h3>
                <span><?= "@" . $friend_request['user_username']; ?></span>
                <a href="index.php?p=profile&profile_id=<?= $friend_request['user_id'] ?>">Voir le profile</a>
                <a href="index.php?p=managFriend&action=deleteFriend&user_id2=<?= $friend_request['user_id'] ?>">Supprimer la demande</a>
                <a href="index.php?p=managFriend&action=blockFriend&user_id2=<?= $friend_request['user_id'] ?>">Bloquer</a>
            <?php endforeach; ?>

            <h2>Demandes Reçues</h2>
            <?php foreach ($this->_friends_requesting as $friend_requesting): ?>
                <h3><?= $friend_requesting['user_firstname'] . " " . $friend_requesting['user_lastname'] ?></h3>
                <span><?= "@" . $friend_requesting['user_username']; ?></span>
                <a href="index.php?p=profile&profile_id=<?= $friend_requesting['user_id'] ?>">Voir le profile</a>
                <a href="index.php?p=managFriend&action=acceptFriend&user_id2=<?= $friend_requesting['user_id'] ?>">Accepter la demande</a>
                <a href="index.php?p=managFriend&action=deleteFriend&user_id2=<?= $friend_requesting['user_id'] ?>">Refuser la demande</a>
                <a href="index.php?p=managFriend&action=blockFriend&user_id2=<?= $friend_requesting['user_id'] ?>">Bloquer</a>
            <?php endforeach; ?>

            <h2>Utilisateurs bloqués</h2>
            <?php foreach ($this->_blocked as $blocked): ?>
                <h3><?= $blocked['user_firstname'] . " " . $blocked['user_lastname'] ?></h3>
                <span><?= "@" . $blocked['user_username']; ?></span>
                <a href="index.php?p=profile&profile_id=<?= $blocked['user_id'] ?>">Voir le profile</a>
                <a href="index.php?p=managFriend&action=unblockFriend&user_id2=<?= $blocked['user_id'] ?>">Débloquer</a>
            <?php endforeach; ?>
        </section>
    </main>

</body>
</html>