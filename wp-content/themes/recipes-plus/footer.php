<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 * Footer Template
 *
 * @package WordPress
 * @subpackage Custom Theme by NAME DEV
 * @since V0.1
 *
 */
?>
</main>
<footer class="main-footer">
    <div class="container container_xl">
        <div class="main-footer__top">
            <a href="#" class="logo">
                <img class="logo__image" src="<?php echo TEST_IMG_URI . 'icons/logo_en_light.svg'; ?>" alt="">
            </a>
            <nav class="footer-menu">
                <p class="footer-menu__title">Карта сайта</p>
                <a href="#" class="footer-menu__item">Главная</a>
                <a href="#" class="footer-menu__item">Рецепты</a>
                <a href="#" class="footer-menu__item">О нас</a>
                <a href="#" class="footer-menu__item">Контакты</a>
            </nav>
            <nav class="footer-menu">
                <p class="footer-menu__title">Рецепты</p>
                <a href="#" class="footer-menu__item">Блюда из мяса</a>
                <a href="#" class="footer-menu__item">Блюда из рыбы</a>
            </nav>
            <nav class="footer-menu">
                <p class="footer-menu__title">Блог</p>
                <a href="#" class="footer-menu__item">Статья о том</a>
                <a href="#" class="footer-menu__item">Статья об этом</a>
            </nav>
        </div>
        <div class="main-footer__bottom">
            <p class="main-footer__copyright">© Copyright 2023</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>