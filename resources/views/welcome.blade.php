<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("css/swiper-bundle.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/account.css") }}">
    <link rel="stylesheet" href="{{ asset("css/slider.css") }}">
    <link rel="stylesheet" href="{{ asset("css/catalog.css") }}">
    <link rel="stylesheet" href="{{ asset("css/search.css") }}">
    <link rel="stylesheet" href="{{ asset("css/recept.css") }}">
    <link rel="stylesheet" href="{{ asset("css/forms.css") }}">
    <link rel="stylesheet" href="{{ asset("css/round-slider.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>Главная</title>
</head>

<body class="main-body__image" data-variant="main-page">

<header>
    <div class="header-wrapper header-wrapper__main-page fixed-top">

        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav header__list">
                        <li class="header__item" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                            <a href="#" class="header__link">Регистрация</a>
                        </li>
                        <li class="header__item">
                            <a href="/winners.html" class="header__link">Победители</a>
                        </li>

                        <li class="nav-item header__logo d-none d-lg-block"><a href="/"><img
                                    class="header__logo--img" src="img/icons/logo.svg"
                                    alt="logo"></a></li>

                        <li class="header__item">
                            <a href="#" class="header__link">Призы</a>
                        </li>
                        <li class="header__item">
                            <button class="header__button"><a href="/account">Личный кабинет</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <a class="navbar-brand d-lg-none logo-mobile--wrap" href="#"><img src="img/icons/logo-mobile.svg"
                                                                          alt="logo-mobile"></a>
        <a class="navbar-brand d-lg-none account-logo-mobile" href="/account"><img src="img/icons/icon_person.svg"
                                                                                       alt="icon_person"></a>
        <div class="header-wrapper__main-page--img"></div>
    </div>
</header>

<!-- Вход, регистрация -->

<div class="modal fade" id="exampleModalToggle" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form">
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="../img/icons/close-white.svg" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg" alt="logo-modal">
                </div>
                <div class="buttons__group">
                    <button class="registry__submit" type="submit" data-bs-target="#enterAccount"
                            data-bs-toggle="modal">ВХОД
                    </button>
                    <button class="registry__submit" type="submit" data-bs-target="#registryForm"
                            data-bs-toggle="modal">РЕГИСТРАЦИЯ
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Форма входа -->

<div class="modal fade modal-form--enter" id="enterAccount" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form modal-form_enter">
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="../img/icons/close-white.svg" alt="close-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg" alt="logo-modal">
                </div>
                <form method="post" action="{{ route('auth.login') }}" class="reg__group needs-validation" novalidate>
                    @csrf
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="email" id="email-auth"
                               required>
                        <label for="promoCode" class="reg-label">Укажите почту, набранную при регистрации</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>

                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="password" id="codeauth"
                               required>
                        <label for="promoCode" class="reg-label">Введите пожалуйста код из E-mail</label>
                        <div class="invalid-feedback">
                            Вы указали неверный код или вышло время ожидания
                        </div>
                    </div>
                    <button class="registry__submit registry__submit--top" type="submit">ВОЙТИ</button>
                    <button class="registry__submit" type="submit">ОТПРАВИТЬ КОД</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Форма регистрации -->

<div class="modal fade" id="registryForm" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form new-user-form" data-variant=registry-user>
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="../img/icons/close-white.svg" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg" alt="">
                </div>
                <form enctype="multipart/form-data" method="post" action="{{ route('auth.register') }}"
                      class="reg__group needs-validation" id="user-data" novalidate>
                    @csrf
                    <div class="input__group has-validation">
                        <input class="registry__input--field form-control" type="text" name="name" id="firstName"
                               required>
                        <label for="firstName" class="reg-label">ИМЯ</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>
                    <div class="input__group has-validation">
                        <input class="registry__input--field form-control" type="text" name="second_name"
                               id="secondName" required>
                        <label for="secondName" class="reg-label">ФАМИЛИЯ</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="patronymic"
                               id="patronymic" required>
                        <label for="fathersName" class="reg-label">ОТЧЕСТВО</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="phone" data-phone-pattern
                               id="phone" required>
                        <label for="fathersName" class="reg-label">НОМЕР ТЕЛЕФОНА</label>
                        <div class="invalid-feedback">
                            Некорректный номер телефона, повторите попытку
                        </div>
                    </div>

                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="email" id="email" required>
                        <label for="email" class="reg-label">ПОЧТА</label>
                        <div class="invalid-feedback">
                            Некорректная электронная почта, повторите попытку
                        </div>
                    </div>
                    <label for="email" class="reg-label reg-label--post--layout">внимание! именно на электронную почту
                        придет подтверждение выигрыша!</label>

                    <div class="input__group">

                        <input class="registry__input--field form-control" type="text" name="code[]" id="codeauth"
                               required>
                        <label for="promoCode" class="reg-label w-100">Добавьте пожалуйста код, который находится на
                            вкладыше внутри пачки</label>
                        <div class="invalid-feedback">
                            Извините, но без кода вы не можете принять участие в акции
                        </div>
                    </div>

                    <div class="file-upload__group input__group" required>
                        <input type="file" name="check" class="file-upload__label form-control"
                               aria-label="file example" required>
                        <label for="checkLoad" class="reg-label">Загрузите пожалуйста чек (внимание, чек должен быть
                            читабельным)<br></label>
                        <div class="invalid-feedback">Извините, но без чека вы не можете принять участие в акции</div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            <p>
                <span>
                  Я прочитал и согласен с <a href="#">Правилами Акции и Пользовательским соглашением</a>,
                  согласен на обработку персональных данных
                            </p>
                            <p>
                                </span>
                                <span>
                  Я согласен на получение e-mail рассылки
                            </p>
                            </span>

                        </label>

                    </div>

                    <button class="registry__submit" type="submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>

                </form>

            </div>
        </div>
    </div>
</div>

<main class="main">

    <div class="main-page__container">

        <h1>Как принять участие в розыгрыше?</h1>

        <section class="rules__action">

            <div class="rules__item">
                <div class="rules__item-wrap">
                    <img class="rules__item--img" src="img/content/basket-prize.png" alt="">
                    <span class="rules__item--text">Купите пачку чая Niktea<br>
            в удобном для вас розничном<br>
            или интернет-магазине</span>
                </div>
            </div>

            <div class="rules__item">
                <div class="rules__item-wrap">
                    <img class="rules__item--img" src="img/content/registry-comp.png" alt="">
                    <span class="rules__item--text">
            Зарегестрируйте код и чек<br>
            на сайте в личном кабинете</span>
                </div>
            </div>

            <div class="rules__item">
                <div class="rules__item-wrap">
                    <img class="rules__item--img" src="img/content/tea-cup.png" alt="">
                    <span class="rules__item--text">
            Выпейте вкусного<br> горячего чая NIKTEA</span>
                </div>
            </div>

            <div class="rules__item">
                <div class="rules__item-wrap">
                    <img class="rules__item--img" src="img/content/man-icon.png" alt="">
                    <span class="rules__item--text">
            Ждите результаты <br>
            розыгрыша</span>
                </div>
            </div>

        </section>

        <a href="rules.html">
            <button class="recepies__button">ПРАВИЛА ПРОВЕДЕНИЯ АКЦИИ</button>
        </a>


        <section class="main__slider">


            <div class="main__slider--wrap">
                <!-- <div class="slider-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div> -->

                <div class="main__slider__slides">

                    <div class="testSlider roundSlider">

                        <section>
                            <h2>ВСЕ ПРИЗЫ</h2>
                            <div class="slider slider_circle_10">

                                <div class="slide__container">
                      <span class="slide__description">В честь 15 летия бренда<br>
                        Сертификат на путешествие 300 000р</span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/certif.png" alt="certif">
                                    </div>
                                </div>

                                <div class="slide__container">
                      <span class="slide__description">Планшет Apple iPad mini 256GB<br>
                        Цвет: Space Grey </span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/laptop.png" alt="laptop">
                                    </div>
                                </div>

                                <div class="slide__container">
                      <span class="slide__description">Смартфон Apple iPhone 14 Pro 256GB<br>
                        Цвет: Deep Purple</span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/phone-priz.png"
                                             alt="phone-priz">
                                    </div>
                                </div>

                                <div class="slide__container">
                      <span class="slide__description">Подарочный чайный набор Niktea<br>
                        (чай+кружка)</span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/niktea24.png" alt="niktea24">
                                    </div>
                                </div>

                                <div class="slide__container">
                      <span class="slide__description">Умная колонка Яндекс Станция 2, с Алисой<br>
                        Цвет: Черный антрацит</span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/alice.png" alt="alice">
                                    </div>
                                </div>

                                <div class="slide__container">
                      <span class="slide__description">Чайник Bork K 703 CH<br>
                        Цвет: Champagne</span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/teapot-priz.png"
                                             alt="teapot-priz">
                                    </div>
                                </div>

                                <div class="slide__container">
                      <span class="slide__description">Наушники Apple AirPods Pro (2 поколение)<br>
                        Цвет: Белый </span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/headphones.png"
                                             alt="headphones">
                                    </div>
                                </div>


                                <div class="slide__container">
                      <span class="slide__description">Портативный аккумулятор Bork (L787)<br>
                        Цвет: Белый </span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/borkL787.png" alt="borkL787">
                                    </div>
                                </div>

                                <div class="slide__container">
                      <span class="slide__description">Годовой запас чая Niktea<br>
                        24 упаковки (пакетированный), более 10 вкусов</span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/gift-set.png" alt="gift-set">
                                    </div>
                                </div>

                                <div class="slide__container">
                      <span class="slide__description">
                        Фен Dyson Supersonic (hd07)<br>
                        Цвет: Vinca Blue & Rose
                      </span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/fan-priz.png" alt="fan-priz">
                                    </div>
                                </div>
                                <div class="slide__container">
                      <span class="slide__description">Электросамокат Bork L602<br>
                        Вес 13 кг и удобная складная конструкция</span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/scooter.png" alt="scooter">
                                    </div>
                                </div>
                                <div class="slide__container">
                      <span class="slide__description">Консоль Sony PlayStation 5<br>
                        Blu-Ray Edition </span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/playstation.png"
                                             alt="playstation">
                                    </div>
                                </div>
                                <div class="slide__container">
                      <span class="slide__description">Воздухоотчиститель Dyson (HP05)<br>
                        Pure Hot + Cool </span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/cleaner-priz.png"
                                             alt="cleaner-priz">
                                    </div>
                                </div>
                                <div class="slide__container">
                      <span class="slide__description">Ноутбук Apple MacBook Air 13 M2, 16/256<br>
                        Цвет: Midnight</span>
                                    <div class="slide-img--wrap">
                                        <img class="main-slide__img" src="img/content/priz/notebbok.png" alt="notebbok">
                                    </div>
                                </div>
                                <div class="prev_button"></div>
                                <div class="next_button"></div>
                            </div>
                        </section>
                    </div>
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
                    <a href="#" class="footer__link  footer__link__right"><img class="footer__link--img"
                                                                               src="img/icons/telegram-icon.svg"
                                                                               alt="Logo"></a>
                    <a href="#" class="footer__link"><img src="img/icons/whatsapp-icon.svg" alt="Logo"></a>
                </li>
            </div>
            <div class="footer__column logo-col">
                <a class="footer__logo">
                    <img src="img/icons/footer-logo.svg" alt="Logo">
                </a>
            </div>
            <div class="footer__column phone-col">
                <div class="footer__list">
                    <li class="footer__item footer__item--phone">
                        <div class="phone-icon-col"><img class="phone-icon" src="img/icons/phone-icon.svg"
                                                         alt="phone-icon"></div>
                        <div class="phone-nimber-col">
                            <span class="phone-nimber">8-903-798-85-98</span>
                            <div class="w-100"></div>
                            <span>С 9:00 до 18:00 по МСК</span>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset("js/bootstrap.js") }}"></script>
<script src="{{ asset("js/bootstrap.js.map") }}"></script>
<script src="{{ asset("js/swiper-bundle.min.js") }}"></script>
<script src="{{ asset("js/slider.js") }}"></script>
<script>
    EasySlides('.slider_circle_10', {
        'autoplay': false,
        'delayaftershow': 1200,
        'stepbystep': false,
        'startslide': 8,
        'distancetochange': 10,
        'show': 9
    });
</script>
<script src="{{ asset("js/script.js") }}"></script>
</body>
</html>
