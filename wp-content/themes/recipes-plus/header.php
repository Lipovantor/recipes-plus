<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 * Header Template
 *
 * @package WordPress
 * @subpackage Custom Theme by Bayraktar Serge
 * @since V0.1
 *
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>

<main class="main">

<header class="header">
    <div class="container_xl header__container">
        <a href="#" class="logo">
            <img class="logo__image" src="<?php echo TEST_IMG_URI . 'icons/logo_en.svg'; ?>" alt="">
        </a>
        <nav class="main-menu">
            <a href="#" class="main-menu__item">Главная</a>
            <a href="#" class="main-menu__item">Рецепты</a>
            <a href="#" class="main-menu__item">О нас</a>
            <a href="#" class="main-menu__item">Контакты</a>
        </nav>
        <button class="burger">
            <svg class="burger__svg" width="45" height="39" viewBox="0 0 45 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="20" height="17.5" rx="2" fill="#3F3E3E"/>
                <rect x="25" width="20" height="17.5" rx="2" fill="#3F3E3E"/>
                <rect x="25" y="21" width="20" height="17.5" rx="2" fill="#3F3E3E"/>
                <rect y="21" width="20" height="17.5" rx="2" fill="#3F3E3E"/>
            </svg>
        </button>
    </div>
</header>