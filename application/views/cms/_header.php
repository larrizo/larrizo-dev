<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title><?= $title ?></title>

    <link rel = "icon" type = "image/png" href = "/media/images/lz.png">

    <link rel = "stylesheet" href = "/media/libraries/foundation-5.2.1.custom/css/normalize.css"/>
    <link rel = "stylesheet" href = "/media/libraries/foundation-5.2.1.custom/css/foundation.min.css"/>
    <link rel = "stylesheet" href = "/media/css/global.css"/>
    <link rel = "stylesheet" href = "/media/css/cms/style.css"/>

    <script type = "text/javascript" src = "/media/libraries/jquery-1.11.0.min.js"></script>
    <script type = "text/javascript" src = "/media/libraries/foundation-5.2.1.custom/js/foundation.min.js"></script>
    <script type = "text/javascript" src = "/media/js/global.js"></script>
    <?php if (!empty($script)):?>
    <?=$script?>
    <?php endif; ?>
</head>
<body class = "body" id = "<?= $page ?>-page">
<div id = "content" class = "row">
    <?php if ($page != 'login'): ?>
    <nav class = "top-bar clearfix" data-topbar id = "main-menu">
        <section class = "top-bar-section">
            <ul>
                <li class = "<?= ( !empty($page) AND $page == 'home') ? 'active' : '' ?>"><a href = "/cms">Home</a></li>
                <li class = "<?= ( !empty($page) AND $page == 'categories') ? 'active' : '' ?>"><a href = "/cms/categories">Categories</a></li>
            </ul>
        </section>
    </nav>
<?php endif; ?>
