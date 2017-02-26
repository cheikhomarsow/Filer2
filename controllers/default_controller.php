<?php

require_once('model/user.php');

function home_action()
{
    if (!empty($_SESSION['user_id']))
    {
        $user = get_user_by_id($_SESSION['user_id']);
        $username = $user['username'];
        require('views/header.php');
        require('views/home.php');
    }
    else {
        header('Location: ?action=login');
        exit(0);
    }
}

function about_action()
{
    require('views/about.html');
}

function contact_action()
{
    require('views/contact.html');
}

function profil_action()
{
    require('views/profil.php');
}
