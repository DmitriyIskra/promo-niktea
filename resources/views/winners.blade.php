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
    <link rel="stylesheet" href="{{ asset("css/winners.css") }}">
    <link rel="stylesheet" href="{{ asset("css/forms.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>Главная</title>
</head>

<body data-variant="winners">

<header>
    <div class="header-wrapper header-wrapper--white">

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid container-fluid--position">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav header__list">
                        <li class="header__item" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                            <a href="#" class="header__link">Регистрация</a>
                        </li>
                        <li class="header__item">
                            <a href="#" class="header__link">Победители</a>
                        </li>

                        <li class="nav-item header__logo d-none d-lg-block"> <a href="/index.html"><img class="header__logo--img" src="img/icons/logo.svg"
                                                                                                        alt="logo"></a></li>

                        <li class="header__item">
                            <a href="#" class="header__link">Призы</a>
                        </li>
                        <li class="header__item">
                            <button class="header__button" ><a href="/account.html">Личный кабинет</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <a class="navbar-brand d-lg-none logo-mobile--wrap" href="#"><img src="img/icons/logo-mobile.svg"></a>
        <a class="navbar-brand d-lg-none account-logo-mobile" href="/account.html"><img src="img/icons/icon _person.svg"></a>


    </div>
</header>


<main class="main">

    <div class="breadcrumbs__container">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="index.html">Главная</a></li>
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="catalog.html"> Победители </a></li>
        </ul>
    </div>

    <div class="user-account__container">

        <div class="winners__head"><img class="winners__head" src="img/icons/winners.svg" alt=""></div>




        <section class="winners">

            <div class="winners-body">


                <div class="prize-toggle">


                    <fieldset>
                        <input checked id="monthly" type="radio" name="frequency" value="monthly" />
                        <label class="main-prizes" for="monthly">ГЛАВНЫЕ ПРИЗЫ</label>
                        <input id="bimonthly" type="radio" name="frequency" value="bimonthly" />
                        <label class="tea-prizes" for="bimonthly">ЧАЙНЫЕ ПРИЗЫ</label>
                        <div class="fieldset-back"></div>
                    </fieldset>
                </div>

                <table>
                    <thead>
                    <tr>
                        <th>Приз</th>
                        <th class="winner__contacts">Номер телефона и почта</th>
                        <th>Дата вручения</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Сертификат на путешествие 300 000р</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Планшет Apple iPad mini 256GB </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Смартфон Apple iPhone 14 Pro 256GB </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Умная колонка Яндекс Станция 2, с Алисой</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Чайник Bork K 703 CH</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Наушники Apple AirPods Pro (2 поколение)  </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Портативный аккумулятор Bork (L787)  </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Фен Dyson Supersonic (hd07) </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Электросамокат Bork L602</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Консоль Sony PlayStation 5  </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Воздухоотчиститель Dyson (HP05) </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Ноутбук Apple MacBook Air 13 M2, 16/256</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    </tbody>
                </table>
            </div>

    </div>
    </section>

    </div>

</main>

<footer class="footer">
    <div class="footer__top">
        <div class="footer__container">

            <div class="footer__column link-col">
                <li class="footer__item">
                    <a href="#" class="footer__link">Сайт бренда NIKTEA</a>
                </li>
            </div>

            <div class="footer__column tg-col">

                <li class="footer__item">
                    <a href="#" class="footer__link  footer__link__right"><img class="footer__link--img" src="img/icons/telegram-icon.svg" alt="Logo"></a>
                    <a href="#" class="footer__link"><img src="img/icons/whatsapp-icon.svg" alt="Logo"></a>
                </li>

            </div>

            <div class="footer__column logo-col">
                <a class="footer__logo">
                    <img src="img/icons/footer-logo.svg" alt="Logo">
                </a>
            </div>

            <div class="footer__column phone-col">

                <ul class="footer__list">
                    <li class="footer__item footer__item--phone">

                        <div class="phone-icon-col"><img class="phone-icon" src="img/icons/phone-icon.svg" alt="phone-icon"></div>
                        <div class="phone-nimber-col">
                            <span class="phone-nimber">8-903-798-85-98</span>
                            <div class="w-100"></div>
                            <span>С 9:00 до 18:00 по МСК</span>
                        </div>
            </div>

            </li>
            </ul>
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
