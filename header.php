<?php
require_once "_setup/db.php";
@include("functions.php");
session_start();

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $page_title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,400italic,700,300italic,500italic,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/custom-light.css">
        <link rel="stylesheet" href="css/helpers.css">
        
        <link rel="shortcut icon" href="favicon.png" />
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
    </head>
    <body class="<?php echo $page_class; ?>">
    <div class="container">
    <header class="page-header">
                <nav>
            <?php
                echo navLink('index.php', 'List');
                echo navLink('favorites.php', 'Favorites');
                echo navLink('categories.php', 'Categories');
            ?>
        </nav>
        
    </header>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->