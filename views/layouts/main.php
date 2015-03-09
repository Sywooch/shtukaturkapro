<?php
/* @var $this \yii\web\View */

use yii\helpers\Html;

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type="text/javascript" src="//vk.com/js/api/openapi.js" charset="utf8"></script>
</head>
<body>
<?php $this->beginBody() ?>
<!-- header-->
<header class="header">
    <div class="header__wrapper"><a href="#" title="" class="logo-header"></a>
        <div class="header-menu-search">
            <nav class="top-menu"><a href="#" title="">О проекте</a><a href="#" title="">Задать вопрос</a><a href="#" title="">Калькуляторы</a><a href="#" title="">Рекламодателям</a><a href="#" title="">Контакты</a></nav>
            <div class="ya-site-form ya-site-form_inited_yes">
                <form action="http://yandex.ru/" method="get" target="_self">
                    <input name="text" type="search" value="" placeholder="Поиск по сайту" class="ya-site-form__input-text">
                    <input type="submit" value="Найти" class="ya-site-form__submit">
                </form>
            </div>
        </div>
        <div class="social-group"><span class="social-group__header">Мы в социальных сетях</span><a href="<?=Yii::$app->settings->get('vkLink')?>" title="" class="social-group__icon social-group__icon--vk"></a><a href="<?=Yii::$app->settings->get('facebookLink')?>" title="" class="social-group__icon social-group__icon--fb"></a><a href="<?=Yii::$app->settings->get('googlePlusLink')?>" title="" class="social-group__icon social-group__icon--gp"></a></div>
    </div>
</header>
<!-- header-->
<div class="container">
    <section class="content">
        <?php if(Yii::$app->request->url != '/'):?>
            <!-- breadcrumbs-->
            <div class="breadcrumbs"><a href="#" title="" class="breadcrumbs__item breadcrumbs__item--home">Главная</a><a href="#" title="" class="breadcrumbs__item">Категория</a><span class="breadcrumbs__item breadcrumbs__item--current">Текущая страница</span></div>
            <!-- breadcrumbs-->
        <?php endif;?>
        <?=$content?>
    </section>
    <aside class="sidebar">
        <!-- sidebar-advertise-->
        <div class="sidebar-advertise"><a href="#" title=""><img src="images/temp/banner-240x400.jpg" alt=""></a></div>
        <!-- sidebar-advertise-->
        <!-- calculators-->
        <div class="calculators">
            <div class="title calculators__title">Калькуляторы</div>
            <nav><a href="#" title="" class="calculators__item">Расчет раствора          </a><a href="#" title="" class="calculators__item">Расчет штукатурной смеси          </a><a href="#" title="" class="calculators__item">Расчет расхода шпатлевки          </a><a href="#" title="" class="calculators__item">Расчет бетона</a></nav>
        </div>
        <!-- calculators-->
        <!-- user-questions-->
        <div class="user-questions">
            <div class="title user-questions__title">Вопросы эксперту</div>
            <nav><a href="#" title="" class="user-questions__item">Как и чем можно поднять уровень пола на небольшую высоту?    </a><a href="#" title="" class="user-questions__item">Как крепить брус под укладку половой доски к металлической профильной трубе?</a><a href="#" title="" class="user-questions__item">Как исправить дефект монтажа на бетонное основание плитки ПВХ?     </a><a href="#" title="" class="user-questions__item">Как исправить дефект монтажа на бетонное основание плитки ПВХ?</a><a href="#" title="" class="user-questions__item">Как правильно отремонтировать пол из шлакоситалловой плитки?</a></nav><a href="#" title="" class="user-questions__button">Задать вопрос бесплатно</a>
        </div>
        <!-- user-questions-->
        <!-- sidebar-advertise-->
        <div class="sidebar-advertise"><a href="#" title=""><img src="images/temp/banner-240x400.jpg" alt=""></a></div>
        <!-- sidebar-advertise-->
        <!-- vk-group-->
        <div class="vk-group"><img src="images/temp/vk-group.jpg" alt=""></div>
        <!-- vk-group-->
    </aside>
</div>
<!-- footer-->
<footer class="footer">
    <div class="footer__wrapper">
        <div class="copyright">
            <p>© 2014-2015 Shtukaturkapro.ru</p>
            <p>Штукатурка дома своими руками</p>
            <p>Копирование и использование материалов запрещено!</p>
        </div>
        <nav class="footer-menu"><a href="#" title="" class="footer-menu__item footer-menu__item--gp">Мы в Google+</a><a href="#" title="" class="footer-menu__item">О проекте</a><a href="#" title="" class="footer-menu__item">Рекламодателям</a><a href="#" title="" class="footer-menu__item footer-menu__item--sitemap">Карта сайта</a><a href="#" title="" class="footer-menu__item">Задать вопрос </a><a href="#" title="" class="footer-menu__item">Контакты</a></nav>
        <div class="counters"><img src="images/temp/metrika.png" alt=""><img src="images/temp/liveinternet.png" alt=""></div>
    </div>
</footer>
<script type="text/javascript" src="http://yastatic.net/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="/scripts/app.js"></script>
<!-- footer-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>