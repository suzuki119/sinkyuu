<!DOCTYPE html>
<!--nobanner-->
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta name="robots" content="noindex">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/the-new-css-reset/css/reset.min.css">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

    <title>島トゥク</title>


    <?php wp_head(); ?>

    <!--nobanner-->
</head>


<body <?php body_class(); ?>>
    <header class="header">
        <div class="header__inner">
            <a href="<?php echo home_url('/'); ?>" class="logo">
                <h1>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/icon/logo_2.png" alt="logo">
                </h1>
            </a>
            <div class="global">
                <div class="hamburger">
                    <span class="hamburger__span"></span>
                    <span class="hamburger__span"></span>
                    <span class="hamburger__span"></span>
                </div>
                <nav class="menu">
                    <div class="menu__inner">
                        <ul>
                            <li><a href="<?php echo home_url('/'); ?>">HOME　↓</a></li>
                            <li><a href="<?php echo home_url('/#about'); ?>">島トゥクとは</a></li>
                            <li><a href="<?php echo home_url('/#vision-example'); ?>">景色の例</a></li>
                            <li><a href="<?php echo home_url('/#appointment-ex'); ?>">予約の方法</a></li>
                            <li><a href="<?php echo home_url('/#news'); ?>">お知らせ</a></li>
                        </ul>
                        <ul>
                            <li><a href="<?php echo home_url('/appointment'); ?>">予約</a></li>
                            <li><a href="<?php echo home_url('/q&a'); ?>">Q&A</a></li>
                            <li><a href="<?php echo home_url('/info'); ?>">お問い合わせ</a></li>
                            <li><a href="<?php echo home_url('/spot'); ?>">スポット</a></li>
                            <li><a href="<?php echo home_url('/root'); ?>">コース</a></li>
                            <li><a href="<?php echo home_url('/access'); ?>">アクセス</a></li>
                        </ul>
                        <a href="<?php echo home_url('/#appointment-ex'); ?>" class="appointment-Btn linkBtn">
                            予約
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </header>