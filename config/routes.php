<?php
    $config = array(
        'default' => array(
            'class' => 'HomeController',
            'method' => 'surface'
        ),
        'home' => array(
            'class' => 'HomeController',
            'method' => 'index'
        ),
        'login' => array(
            'class' => 'LoginController',
            'method' => 'index'
        ),
        'logout' => array(
            'class' => 'LogoutController',
            'method' => 'index'
        ),
        'add-entry' => array(
            'class' => 'PostController',
            'method' => 'add'
        ),
        'post-details' => array(
            'class' => 'PostController',
            'method' => 'details'
        ),
        'author-posts' => array(
            'class' => 'AuthorController',
            'method' => 'posts'
        ),
        'imprint' => array(
            'class' => 'ImprintController',
            'method' => 'index'
        ),
    );
    return $config;