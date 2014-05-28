<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <link rel="icon" type="image/png" href="/media/images/lz.png">

    <link rel="stylesheet" href="/media/libraries/foundation-5.2.1.custom/css/normalize.css"/>
    <link rel="stylesheet" href="/media/libraries/foundation-5.2.1.custom/css/foundation.min.css"/>
    <link rel="stylesheet" href="/media/css/global.css"/>
    <link rel="stylesheet" href="/media/css/style.css"/>

    <script type="text/javascript" src="/media/libraries/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/media/libraries/foundation-5.2.1.custom/js/foundation.min.js"></script>
    <script type="text/javascript" src="/media/js/global.js"></script>

    <?php if (!empty($script)): ?>
        <?= $script ?>
    <?php endif; ?>

</head>
<body class="body" id="<?= $page ?>-page">
<div id="content" class="row">
    <div id="header">
        <ul id="quick-links" class="right">
            <?php if (!$this->session->userdata('loggedin')): ?>
                <li>
                    <a href="#login" class="popover-trigger">Login</a>

                    <div id="login" class="popover">
                        <?= form_open('/login/submit', array('method' => 'POST', 'id' => 'login-form', 'class' => 'form')) ?>
                        <p class="response"></p>

                        <div class="form-control">
                            <?= form_input('username', '', 'placeholder="Email or Username" class="required"') ?>
                        </div>
                        <div class="form-control">
                            <?= form_password('password', '', 'placeholder="Password" class="required"') ?>
                        </div>
                        <div class="form-control">
                            <label>
                                <?= form_checkbox('remember', '1', FALSE) ?>
                                Remember me
                            </label>
                        </div>
                        <div class="form-control">
                            <a href="#">Forgot password?</a>
                        </div>
                        <div class="form-control text-right">
                            <?= form_submit('', 'Login', 'class="button"') ?>
                        </div>
                        <?= form_close() ?>
                    </div>
                </li>
                <li><a href="/register">Register</a></li>
            <?php else: ?>
                <li>
                    Welcome, <a href="#account"
                                class="link popover-trigger"><?= $this->session->userdata('user')['username'] ?></a>! <a
                        href="#account" class="popover-trigger"><i class="sprites arrow-down white"
                                                                   style="margin-left: 5px;"></i></a>

                    <div id="account" class="popover">
                        <div><a href="/user">My account</a></div>
                        <a href="/login/logout">Logout</a>
                    </div>
                </li>
            <?php endif; ?>
            <li><a href="">Contact</a></li>
            <li class="last"><a href="">Help</a></li>
        </ul>
        <div class="large-6 columns" id="logo">
            <!--            <a href = "/" title = "Larrizo"><img src = "/media/images/logo-black.png"></a>-->
            <a href="/" title="Larrizo"><img src="/media/images/logo2.png"></a>
        </div>
        <div id="search-container" class="right">
            <?= form_open('/search', 'id="search-form"') ?>
            <label><i class="sprites search"></i></label>

            <div class="form-group">
                <?= form_input('keyword', '', 'placeholder="Search on this site"') ?>
            </div>
            <?= form_close() ?>
        </div>

        <nav class="top-bar clearfix" data-topbar id="main-menu">
            <section class="top-bar-section">
                <ul>
                    <li class="<?= empty($currentCategory) && $page == 'home' ? "active" : "" ?>">
                        <a href="/" id="menu-0">Home</a></li>
                    <?php foreach ($parent_categories as $category): ?>
                        <li class="<?= !empty($currentCategory) && $currentCategory->id == $category->id ? "active" : "" ?>">
                            <a href="/category/<?= $category->alias ?>"
                               id="category-<?= $category->id ?>"><?= $category->name ?></a></li>
                    <?php endforeach; ?>
                    <li><a href="/webshops" id="menu-test">Webshops</a></li>
                    <li><a href="/category/sale" id="menu-test">Sale</a></li>
                </ul>
            </section>

            <?php foreach ($subcategories as $subcategory): ?>
                <?php if (!empty($subcategory)):
                    foreach ($subcategory as $i => $sc): ?>
                        <?php if ($i == 0): ?>
                            <div id="submenu-<?= $sc->refparent ?>" class="subcategory">
                        <?php endif; ?>
                        <ul>
                            <li><a href="#" class="subtitle"><?= $sc->name ?></a></li>

                            <?php if (!empty($subcategoriesChild[$sc->id])):
                                foreach ($subcategoriesChild[$sc->id] as $schild): ?>
                                    <li><a href="#"><?= $schild->name ?></a></li>
                                <?php endforeach; endif; ?>
                        </ul>
                        <?php if ($i == count($subcategory) - 1): ?>
                            </div>
                        <?php endif;
                    endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>
    </div>

    <?php if (count($breadcrumbs) > 1): ?>
    <ul class="breadcrumbs">
        <?php foreach ($breadcrumbs as $key => $link): ?>
            <li>
                <?php if (!empty($link)): ?>
                <a href="<?= $link ?>">
                    <?php endif; ?>
                    <?= $key ?>
                    <?php if (!empty($link)): ?>
                </a>
            <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>