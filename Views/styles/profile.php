<style>
    /* ---------ROOT--------- */
    :root{
        --white: #FAFAFA;
        --dark_white: #F0F0F0;
        --green: #3AE168;
        --dark_green: #26a049;
        --balck: #050505;
    }

    .profile{
        width: 100vw;
        overflow: hidden;
    }

    .profileHeader{
        width: inherit;
    }

    .profileImg{
        position: relative;
    }

    .profileBanner{
        background: center / cover no-repeat url("../Views/assets/imgs/users/banner/<?= $profile["profile_banner"]; ?>");
        width: inherit;
        height: 300px;
        overflow: hidden;
    }

    .profilePicture{
        background: center / cover no-repeat url("../Views/assets/imgs/users/picture/<?= $profile["profile_picture"]; ?>");
        width: 250px;
        aspect-ratio: 1;
        overflow: hidden;
        border-radius: 100%;
        border: 5px solid var(--dark_white);
        position: absolute;
        bottom: -125px;
        left: 20px;
    }

    .name{
        position: absolute;
        left: 290px;
    }
    
    .name h2{
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .badge{
        width: 24px;
        aspect-ratio: 1;
        border-radius: 100%;
    }

    .info{
        margin-top: 135px;
        margin-left: 20px;
    }

    .bio{
        margin: 0 0 10px 0;
    }

    .information{
        display: flex;
        gap: 10px;
    }

    .information img{
        width: 16px;
        aspect-ratio: 1;
    }
    
    .userButton{
        margin: 20px 0;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .button{
        color: var(--white);
        background-image: linear-gradient(-180deg, var(--green) 0%, var(--dark_green) 100%);
        font-weight: 700;
        border: 1px solid linear-gradient(-180deg, var(--green) 0%, var(--dark_green) 100%);
        border-radius: 4px;
        box-shadow: rgba(0, 0, 0, .1) 0 2px 4px 0;
        cursor: pointer;
        outline: none;
        transform: translateY(0);
        transition: transform 150ms, box-shadow 150ms;
        padding: 12px;
        resize: vertical;
        text-decoration: none;
    }

    .button:hover {
        box-shadow: rgba(0, 0, 0, .15) 0 3px 9px 0;
        transform: translateY(-2px);
    }

    .input{
        border-radius: 100px;
        border: 1px solid var(--balck);
        padding: 12px;
        resize: vertical;
    }

    .file{
        display: none;
    }

    .inputPost{
        width: 50%;
    }

    .postCta{
        margin: 20px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .userAllPosts{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 20px;
    }

    .userPost{
        width: 80%;
        overflow: hidden;
        background-color: var(--white);
        padding: 20px;
        border-radius: 20px;
    }

    .postPicture{
        width: 75px;
        aspect-ratio: 1;
        border-radius: 100%;
    }

    .userPictureInfo{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 10px;
    }

    .postContent{
        margin: 20px;
    }

    .postImg{
        width: 100%;
    }

    .postReact, .postComment{
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 10px 0;
    }

    .postReact .react{
        justify-self
    }

    .reactType{
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .reactType li{
        list-style: none;
    }

    .allComment, .allCommentComment, .formCommentComment{
        margin: 10px 0;
    }

    .deletePC{
        text-decoration: none;
        color: red;
        font-weight: 700;
    }

    .deletePC:hover{
        text-decoration: underline;
    }

    @media screen and (max-width: 450px) {
        .profilePicture{
            width: 125px;
            bottom: -75px;
            border: 2px solid var(--dark_white);
        }

        .name{
            position: absolute;
            left: 165px;
        }
    }
</style>