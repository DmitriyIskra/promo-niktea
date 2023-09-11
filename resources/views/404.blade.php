<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("css/swiper-bundle.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/account.css") }}">
    <link rel="stylesheet" href="{{ asset("css/code-slider.css") }}">
    <link rel="stylesheet" href="{{ asset("css/slider.css") }}">
    <link rel="stylesheet" href="{{ asset("css/catalog.css") }}">
    <link rel="stylesheet" href="{{ asset("css/search.css") }}">
    <link rel="stylesheet" href="{{ asset("css/recept.css") }}">
    <link rel="stylesheet" href="{{ asset("css/forms.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/page-error.css") }}">
    <link rel="stylesheet" href="{{ asset("css/rules.css") }}">
    <link rel="stylesheet" href="{{ asset("css/winners.css") }}">
    <link rel="stylesheet" href="{{ asset("css/search.css") }}">

    <title>Правила проведения акции</title>
</head>

<body data-variant="error-page">

<header>
    <div class="header-wrapper header-wrapper--white">

        <nav class="navbar__wrap navbar-expand-lg">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-navq header__list">
                    <li class="header__item" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                        <a href="#" class="header__link">Регистрация</a>
                    </li>
                    <li class="header__item">
                        <a href="#" class="header__link">Победители</a>
                    </li>

                    <li class="nav-item header__logo d-none d-lg-block"> <a href="/"><img class="header__logo--img" src="{{ asset('img/icons/logo.svg") }}"
                                                                                               alt="logo"></a></li>

                    <li class="header__item">
                        <a href="/winners" class="header__link">Призы</a>
                    </li>
                    <li class="header__item">
                        <button class="header__button" id="userAccount"><a href="/account">Личный кабинет</a></button>
                    </li>
                </ul>
            </div>

        </nav>
        <a class="navbar-brand d-lg-none logo-mobile--wrap" href="#">
            <img src="{{ asset('img/icons/logo-mobile.svg') }}" alt="logo-mobile">
        </a>
        <a class="navbar-brand d-lg-none account-logo-mobile" href="/account">
        </a>

    </div>
</header>

@include('template_parts.modal')

<main class="main">



    <div class="error-page__container">


        <section class="error__page__section">

            <span class="warning__oi">Ой, ошибка</span>

            <h1 class="error__head">404</h1>

            <span class="warning__error">Такой страницы нет,<br> но Вы на верном пути!<br> Перейдите, пожалуйста, на страницы:</span>



            <div class="back-buttons__wrap">
                <button class="back-button">главная страница</button>
                <button class="back-button">личный кабинет</button>
            </div>


    </div>



    </section>

    </div>

</main>

<footer class="footer">
    <div class="footer__top">
        <div class="footer__container">

            <div class="footer__column link-col">
                <div class="footer__item">
                    <a href="https://nikteaworld.com/" class="footer__link">Сайт бренда NIKTEA</a>
                </div>
            </div>

            <div class="footer__column tg-col">

                <div class="footer__item footer__item--icons">
                    <div class="footer__item--right"> <a href="#" class="footer__link  footer__link__right"><img
                                class="footer__link--img" src="{{ asset('img/icons/telegram-icon.svg') }}" alt="Logo"></a></div>
                    <div><a href="#" class="footer__link"><img class="footer__link--img" src="{{ asset('img/icons/whatsapp-icon.svg') }}"
                                                               alt="Logo"></a></div>
                </div>

            </div>

            <div class="footer__column logo-col">
                <a class="footer__logo">
                    <img class="footer__logo--img" src="{{ asset('img/icons/footer-logo.svg') }}" alt="Logo">
                </a>
            </div>

            <div class="footer__column phone-col">

                <div class="footer__list">
                    <div class="footer__item footer__item--phone">
                        <div class="phone-icon-col"><img class="phone-icon" src="{{ asset('img/icons/phone-icon.svg') }}" alt="phone-icon"></div>
                        <div class="phone-number-col">
                            <div class="phone-number"><a class="phone-number__link" href="tel:+7-903-798-85-98">8-903-798-85-98</a></div>
                            <div class="w-100"></div>
                            <span>С 9:00 до 18:00 по МСК</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</footer>


<script src="{{ asset("js/bootstrap.js") }}"></script>
<script src="{{ asset("js/bootstrap.js.map") }}"></script>
<script src="{{ asset("js/swiper-bundle.min.js") }}"></script>
<script src="{{ asset("js/script.js") }}"></script>

</body>
</html>
