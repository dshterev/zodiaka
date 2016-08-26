<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles/userFormStyle/UserForm.css">
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles/registerFormStyle/RegisterForm.css">
    <link rel="icon" href="<?=APP_ROOT?>/content/images/favicon.ico" />
    <script src="<?=APP_ROOT?>/content/scripts/jquery-3.0.0.min.js"></script>
    <script src="<?=APP_ROOT?>/content/scripts/blog-scripts.js"></script>
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header>
    <a href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/site-logo.png"></a>
    <a href="<?=APP_ROOT?>/">Начало</a>
    <a href="<?=APP_ROOT?>/zodiac/daily">Дневен зодиак</a>
    <a href="<?=APP_ROOT?>/zodiac/month">Месечен зодиак</a>
    <a href="<?=APP_ROOT?>/zodiac/year">Годишен зодиак</a>
    <a href="<?=APP_ROOT?>/">Зодии</a>
<!--    TODO: DA se dovurshat zodiite-->
    <?php if ($this->isLoggedIn) : ?>
        <a href="<?=APP_ROOT?>/chineseCalendar">Китайски календар</a>
        <a href="<?=APP_ROOT?>/">Някакъв календар</a>
        <a href="<?=APP_ROOT?>/">Още някакъв календар</a>
    <?php else: ?>
        <a href="<?=APP_ROOT?>/users/login">Логин</a>
        <a href="<?=APP_ROOT?>/users/register">Регистрация</a>
    <?php endif; ?>

    <!--    TODO: Администраторски панел-->
    <?php if ($this->isAdmin) : ?>
        <a href="<?=APP_ROOT?>/admin">Администраторски панел</a>
    <?php endif; ?>

    <?php if ($this->isLoggedIn) : ?>
        <div id="logged-in-info">
            <span>Hello, <b><?=htmlspecialchars($_SESSION['username'])?></b></span>
            <form method="post" action="<?=APP_ROOT?>/users/logout">
                <input type="submit" value="Logout"/>
            </form>
        </div>
    <?php endif; ?>
</header>

<?php require_once('show-notify-messages.php'); ?>
