<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniLink | <?= $user["user_username"]; ?>'s Profile</title>
    <link rel="stylesheet" href="../Views/styles/style.css">
    <link rel="stylesheet" href="../Views/styles/profiletempo.css">
    <?php 
    require_once "../Views/styles/profile.php";
    ?>
</head>
<body>
    <section class="profile">
        <header class="profileHeader">
            <div class="profileImg">
                <div class="profileBanner"></div>
                <div class="profilePicture"></div>
            </div>
            <div class="name">
                <h1><?= $user["user_firstname"]?> <?= $user["user_lastname"]?></h1>
                <h2>@<?= $user["user_username"]?> <?php if($profile["profile_certification"] == 1):?> <img class="badge" src="../Views/assets/imgs/website/unilink_logo.svg" alt="Certification" class="badge"> <?php endif; ?></h2>
            </div>
            <div class="info">
                <p class="bio"><?= $profile["profile_bio"]; ?></p>
                <div class="informations">
                    <div class="information">
                        <?php if($profile["profile_location"]): ?>
                            <img src="../Views/assets/icons/activity.svg" alt="localisation">
                            <p><?= $profile["profile_location"]; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="information">
                        <?php if($profile["profile_activity"]): ?>
                            <img src="../Views/assets/icons/location.svg" alt="activity">
                            <p><?= $profile["profile_activity"]; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="userButton">
                    <a href="index.php?p=feed" class="button">Feed</a>
                    <?php if($profile["user_id"] == $_COOKIE['uniCookieUserID']): ?>
                        <a href="index.php?p=userOptions" class="button">Options d'utilisateur</a>
                    <?php endif; ?>
                    <?php if(($user["user_id"] != $_COOKIE['uniCookieUserID']) && ($user["user_account_status"] != "disable")): ?>
                        <?php if(!$relation):?>
                            <a class="button" href="index.php?p=managFriend&action=addFriend&user_id2=<?= $user['user_id'] ?>">Demander en ami</a>
                            <a class="button" href="index.php?p=managFriend&action=blockFriend&user_id2=<?= $user['user_id'] ?>">Bloquer</a>
                        <?php elseif($relation == "requestAs"): ?>
                            <a class="button" href="index.php?p=managFriend&action=deleteFriend&user_id2=<?= $user['user_id'] ?>">Supprimer la demande ami</a>
                            <a class="button" href="index.php?p=managFriend&action=blockFriend&user_id2=<?= $user['user_id'] ?>">Bloquer</a>
                        <?php elseif($relation == "requestBy"): ?>
                            <a class="button" href="index.php?p=managFriend&action=acceptFriend&user_id2=<?= $user['user_id'] ?>">Accepter la demande d'ami</a>
                            <a class="button" href="index.php?p=managFriend&action=deleteFriend&user_id2=<?= $user['user_id'] ?>">Refuser la demande ami</a>
                            <a class="button" href="index.php?p=managFriend&action=blockFriend&user_id2=<?= $user['user_id'] ?>">Bloquer</a>
                        <?php elseif($relation == "friend"): ?>
                            <a class="button" href="index.php?p=managFriend&action=deleteFriend&user_id2=<?= $user['user_id'] ?>">Supprimer l'ami</a>
                            <a class="button" href="index.php?p=managFriend&action=blockFriend&user_id2=<?= $user['user_id'] ?>">Bloquer</a>
                        <?php elseif($relation == "blockedAs"): ?>
                            <a class="button" href="index.php?p=managFriend&action=unblockFriend&user_id2=<?= $user['user_id'] ?>">Débloquer</a>
                        <?php elseif($relation == "blockedBy"): ?>
                                <p class="error">Vous n'avez pas accès a ce compte...</p>
                        <?php endif;?>
                    <?php endif;?>
                    <?php if($user["user_account_status"] == "disable"): ?>
                        <p class="error"><?php if($user["user_id"] == $_COOKIE['uniCookieUserID']){ echo("Réactiver votre compte dans vos options"); } else { echo("Ce compte est désactivé"); } ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </header>
        <section>
            <?php if(($profile["user_id"] == $_COOKIE['uniCookieUserID'] || $profile["profile_status"] == "public" || $relation == "friend") && $relation != "blockedBy" && $user["user_account_status"] != "disable"): ?>
                <?php if(($profile["user_id"]) == $_COOKIE['uniCookieUserID']): ?>
                    <div class="createPost">
                        <form class="postCta" method="POST" enctype="multipart/form-data">
                            <input class="input inputPost" type="text" name="postContent" id="postContent" placeholder='Quoi de neuf ?'>
                            <label class="button" for="postImg" class="mediaInput"><img alt="Media Icon" src="../Views/assets/icons/media.svg"></label>
                            <input class="file" type="file" name="postImg" id="postImg">
                            <input name="typeForme" type="hidden" value="post">
                            <input class="button" type="submit" value="Ajouter">
                        </form>
                        <?php if($this->_method == "POST" && $this->_error): ?>
                            <p class="error" ><?= $this->_error ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <section class="userAllPosts">
                    <?php foreach ($userPosts as $post): ?>
                        <div class="userPost" id="post_id_<?= $post["post_id"] ?>">
                            <div class="userPictureInfo">
                                <img class="postPicture" src="../Views/assets/imgs/users/picture/<?= $post["profile_picture"]; ?>" alt="photo de profil">
                                <div class="postInfo">
                                    <h3><?= $post["user_username"] ?></h3>
                                    <h4>Il y a <?= $this->getNewDate($post["post_date"]) ?></h4> 
                                </div>
                            </div>
                            <p class="postContent"><?= $post["post_content"] ?></p>
                            <?php if(isset($post["post_img"])):?>
                                <img class="postImg" src="../Views/assets/imgs/users/posts/<?= $post["post_img"] ?>" alt="Image du post de <?= $post["user_username"]?>">
                            <?php endif; ?>
                            <div class="postReact">
                                <p><?= count($this->_modelPost->getReactionPosts("post", $post["post_id"])) ?> réactions</p>
                                <button class="reactButton button">Réagir</button>
                            </div>
                            <div class="react hide">
                                <ul class="reactType">
                                    <li><a class="button" href="index.php?p=react&reaction_type=post&reaction_type_id=<?= $post["post_id"] ?>&reaction_emoji=like">like</a></li>
                                    <li><a class="button" href="index.php?p=react&reaction_type=post&reaction_type_id=<?= $post["post_id"] ?>&reaction_emoji=celebrate">celebrate</a></li>
                                    <li><a class="button" href="index.php?p=react&reaction_type=post&reaction_type_id=<?= $post["post_id"] ?>&reaction_emoji=love">love</a></li>
                                    <li><a class="button" href="index.php?p=react&reaction_type=post&reaction_type_id=<?= $post["post_id"] ?>&reaction_emoji=insightful">insightful</a></li>
                                    <li><a class="button" href="index.php?p=react&reaction_type=post&reaction_type_id=<?= $post["post_id"] ?>&reaction_emoji=curious">curious</a></li>
                                </ul>
                                <ul>
                                    <?php foreach($this->_modelPost->getReactionPosts("post", $post["post_id"]) as $reaction): ?>
                                        <li><?= $reaction["user_username"]?> <?= $reaction["reaction_emoji"] ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="postComment">
                                <span><?= count($this->_modelComment->getCommentPosts($post["post_id"])) ?> commentaires</span>
                                <button class="commentButton button">Voir plus...</button>
                            </div>
                            <div class="comment hide">
                                <form method="POST">
                                    <input class="input inputPost" name="commentContent" type="text" placeholder="Ecrire un commentaire...">
                                    <input name="postId" type="hidden" value="<?= $post["post_id"] ?>">
                                    <input name="typeForme" type="hidden" value="postComment">
                                    <input class="button" type="submit" value="Envoyer">
                                </form>

                                <ul>
                                    <?php foreach($this->_modelComment->getCommentPosts($post["post_id"], NULL) as $comment): ?>
                                        <li class="allComment">
                                            <?= $comment["user_username"]?> : <?= $comment["post_comment_content"] ?>
                                                <span><?= count($this->_modelPost->getReactionPosts("comment", $comment["post_comment_id"])) ?> réactions</span>
                                                <button class="reactCommentButton button">Réagir</button>
                                                <div class="commentReaction hide">
                                                    <ul>
                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $comment["post_comment_id"] ?>&reaction_emoji=like">like</a></li>
                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $comment["post_comment_id"] ?>&reaction_emoji=celebrate">celebrate</a></li>
                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $comment["post_comment_id"] ?>&reaction_emoji=love">love</a></li>
                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $comment["post_comment_id"] ?>&reaction_emoji=insightful">insightful</a></li>
                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $comment["post_comment_id"] ?>&reaction_emoji=curious">curious</a></li>
                                                        <li>-----------------------------------------------------</li>
                                                    </ul>
                                                    <ul>
                                                        <?php foreach($this->_modelPost->getReactionPosts("comment", $comment["post_comment_id"]) as $reaction): ?>
                                                            <li><?= $reaction["user_username"]?> <?= $reaction["reaction_emoji"] ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                                <span><?= count($this->_modelComment->getCommentPosts($post["post_id"], $comment["post_comment_id"])) ?> réponses</span>
                                                <button class="commentCommentButton button">Voir plus...</button>
                                                <div class="commentComment hide">
                                                    <form class="formCommentComment" method="POST">
                                                        <input class="input inputPost" name="commentCommentContent" type="text" placeholder="Ecrire une réponse...">
                                                        <input name="postId" type="hidden" value="<?= $post["post_id"] ?>">
                                                        <input name="commentId" type="hidden" value="<?= $comment["post_comment_id"] ?>">
                                                        <input name="typeForme" type="hidden" value="postCommentComment">
                                                        <input class="button" type="submit" value="Envoyer">
                                                    </form>
                                                    <ul>
                                                        <?php foreach($this->_modelComment->getCommentPosts($post["post_id"], $comment["post_comment_id"]) as $commentComment): ?>
                                                            <li class="allCommentComment">
                                                                <?=$commentComment["user_username"] ?> : <?= $commentComment["post_comment_content"] ?>
                                                                <span><?= count($this->_modelPost->getReactionPosts("comment", $commentComment["post_comment_id"])) ?> réactions</span>
                                                                <button class="reactCommentCommentButton button">Réagir</button>
                                                                <div class="commentCommentReaction hide">
                                                                    <ul>
                                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $commentComment["post_comment_id"] ?>&reaction_emoji=like">like</a></li>
                                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $commentComment["post_comment_id"] ?>&reaction_emoji=celebrate">celebrate</a></li>
                                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $commentComment["post_comment_id"] ?>&reaction_emoji=love">love</a></li>
                                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $commentComment["post_comment_id"] ?>&reaction_emoji=insightful">insightful</a></li>
                                                                        <li><a href="index.php?p=react&reaction_type=comment&reaction_type_id=<?= $commentComment["post_comment_id"] ?>&reaction_emoji=curious">curious</a></li>
                                                                        <li>-----------------------------------------------------</li>
                                                                    </ul>
                                                                    <ul>
                                                                        <?php foreach($this->_modelPost->getReactionPosts("comment", $commentComment["post_comment_id"]) as $reaction): ?>
                                                                            <li><?= $reaction["user_username"]?> <?= $reaction["reaction_emoji"] ?></li>
                                                                        <?php endforeach; ?>
                                                                    </ul>
                                                                </div>
                                                                <?php if($commentComment["user_id"] == $_COOKIE['uniCookieUserID']): ?><a class="deletePC" href="index.php?p=deletePCR&delete_type=posts_comments&delete_id=<?= $commentComment["post_comment_id"] ?>">supprimer la réponse</a><?php endif; ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                                <?php if($comment["user_id"] == $_COOKIE['uniCookieUserID']): ?><a class="deletePC" href="index.php?p=deletePCR&delete_type=posts_comments&delete_id=<?= $comment["post_comment_id"] ?>">supprimer le commentaire</a><?php endif; ?>
                                            </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php if($profile["user_id"] == $_COOKIE['uniCookieUserID']): ?>
                                <a class="deletePC" href="index.php?p=deletePCR&delete_type=posts&delete_id=<?= $post["post_id"] ?>">Supprimer le post</a>
                            <?php endif; ?>
                        </div>

                    <?php endforeach; ?>
                </section>
            <?php elseif($relation != "blockedBy" && $user["user_account_status"] != "disable"): ?>
                    <p class="error">Ce compte est privé</p>
            <?php endif; ?>
        </section>
    </section>
    <script>
        const posts = document.querySelectorAll(".userPost")

        posts.forEach((post) => {
            const reactPostButton = post.querySelector(".reactButton")
            const showReactPost = post.querySelector(".react")
            reactPostButton.addEventListener("click", () => {
                showReactPost.classList.toggle("hide")
            })
            const commentPostButton = post.querySelector(".commentButton")
            const showCommentPost = post.querySelector(".comment")
            commentPostButton.addEventListener("click", () => {
                showCommentPost.classList.toggle("hide")
            })

            const comments = post.querySelectorAll(".allComment")
            comments.forEach((comment) => {
                const reactCommentButton = comment.querySelector(".reactCommentButton")
                const showCommentReaction = comment.querySelector(".commentReaction")
                reactCommentButton.addEventListener("click", () => {
                    showCommentReaction.classList.toggle("hide")
                })
                const commentCommentPostButton = comment.querySelector(".commentCommentButton")
                const showCommentCommentPost = comment.querySelector(".commentComment")
                commentCommentPostButton.addEventListener("click", () => {
                    showCommentCommentPost.classList.toggle("hide")
                })
                const commentComments = comment.querySelectorAll(".allCommentComment")
                commentComments.forEach((commentComment) => {
                    const reactCommentCommentButton = commentComment.querySelector(".reactCommentCommentButton")
                    const showCommentCommentReaction = commentComment.querySelector(".commentCommentReaction")
                    reactCommentCommentButton.addEventListener("click", ()=>{
                        showCommentCommentReaction.classList.toggle("hide")
                    })
                })
            })
        })
    </script>
</body>
</html>