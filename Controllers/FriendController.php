<?php

namespace FriendController;
require_once '../src/Helpers.php';
use Helpers\Helpers;
use Friends\Friend;

class FriendController {
    private string $_method;
    private string $_page;
    private Helpers $_helpers;
    private Friend $_modelFriend;
    private int $_user_id1;
    private string $_token;
    private string $_user_id2;
    private array $_friends;
    private array $_friends_request;
    private array $_friends_requesting;
    private array $_blocked;

    public function __construct($_page, $_method){
        require_once '../Models/Friends.php';
        $this->_page = $_page;
        $this->_method = $_method;
        $this->_helpers = new Helpers($_page, isset($_COOKIE['uniCookieUserID']) ? $_COOKIE['uniCookieUserID'] : '', isset($_COOKIE['uniCookieAgent']) ? $_COOKIE['uniCookieAgent'] : '', isset($_COOKIE['uniCookieToken']) ? $_COOKIE['uniCookieToken'] : '');
        $this->_modelFriend = new Friend();
        $this->_user_id1 = $_COOKIE['uniCookieUserID'];
        $this->_token = $_COOKIE['uniCookieUserID'];
        $this->_friends = $this->_modelFriend->get_friend_by_relation($this->_user_id1, 'friend');
        $this->_friends_request = $this->_modelFriend->get_friend_request($this->_user_id1);
        $this->_friends_requesting = $this->_modelFriend->get_friend_requesting($this->_user_id1);
        $this->_blocked = $this->_modelFriend->get_blocked($this->_user_id1);
        require_once '../Views/friends.php';
    }
}

class ManagFriendsController{
    private string $_method;
    private string $_page;
    private Helpers $_helpers;

    public function __construct($_page, $_method){
        require_once '../Models/Friends.php';

        $this->_page = $_page;
        $this->_method = $_method;
        $this->_helpers = new Helpers($_page, isset($_COOKIE['uniCookieUserID']) ? $_COOKIE['uniCookieUserID'] : '', isset($_COOKIE['uniCookieAgent']) ? $_COOKIE['uniCookieAgent'] : '', isset($_COOKIE['uniCookieToken']) ? $_COOKIE['uniCookieToken'] : ''); 
        $this->_modelFriend = new Friend();

        $action = preg_match("`^(addFriend|deleteFriend|acceptFriend|blockFriend|unblockFriend)$`", filter_input(INPUT_GET, 'action')) ? filter_input(INPUT_GET, 'action') : '';
        switch ($action) {
            case 'addFriend':
                $user_id2 = filter_input(INPUT_GET, 'user_id2', FILTER_VALIDATE_INT);
                $this->_modelFriend->add_friends($_COOKIE['uniCookieUserID'], $user_id2);
                break;
            case 'deleteFriend':
                $user_id2 = filter_input(INPUT_GET, 'user_id2', FILTER_VALIDATE_INT);
                $this->_modelFriend->delete_friend($_COOKIE['uniCookieUserID'], $user_id2);
                break;
            case 'acceptFriend':
                $user_id2 = filter_input(INPUT_GET, 'user_id2', FILTER_VALIDATE_INT);
                $this->_modelFriend->accept_friend($_COOKIE['uniCookieUserID'], $user_id2);
                break;
            case 'blockFriend':
                $user_id2 = filter_input(INPUT_GET, 'user_id2', FILTER_VALIDATE_INT);
                $this->_modelFriend->block_friend($_COOKIE['uniCookieUserID'], $user_id2);
                break;
            case 'unblockFriend':
                $user_id2 = filter_input(INPUT_GET, 'user_id2', FILTER_VALIDATE_INT);
                $this->_modelFriend->unblock_friend($_COOKIE['uniCookieUserID'], $user_id2);
                break;
        }

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}