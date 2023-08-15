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
                            <a href="#" class="header__link">Регистрация кода</a>
                        </li>
                        <li class="header__item">
                            <a href="#" class="header__link">Победители</a>
                        </li>

                        <li class="nav-item header__logo d-none d-lg-block"><a href="index.html"><img
                                    class="header__logo--img" src="img/icons/logo.svg"
                                    alt="logo"></a></li>

                        <li class="header__item">
                            <a href="#" class="header__link">Призы</a>
                        </li>
                        <li class="header__item">
                            <button class="header__button"><a href="account.html">Личный кабинет</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <a class="navbar-brand d-lg-none logo-mobile--wrap" href="#"><img src="img/icons/logo-mobile.svg"></a>
        <a class="navbar-brand d-lg-none account-logo-mobile" href="account.html"><img src="img/icons/icon _person.svg"></a>
        <div class="header-wrapper__main-page--img"></div>
    </div>
</header>


<div class="modal fade" id="exampleModalToggle" aria-labelledby="userAccount" tabindex="-1" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form">
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="../img/icons/close-white.svg" alt="clofe-form"></button>
            </div>
            <div class="modal-body ">
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

<div class="modal fade" id="enterAccount" aria-labelledby="userAccount3" tabindex="-1" aria-hidden="true"
     style="display: none;">
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
                <form method="post" action="{{ route('auth.login') }}" class="reg__group needs-validation" novalidate>
                    @csrf
                    <div class="input__group has-validation">
                        <label for="firstName" class="reg-label">Ваш логин/почта: </label>
                        <div class="invalid-feedback">Заполните пожалуйста данное поле</div>
                        <input class="registry__input--field form-control" type="text" name="email" id="firstName"
                               required>


                    </div>
                    <div class="input__group">
                        <label for="emailInput" class="reg-label">Ваш пароль: </label>
                        <input class="registry__input--field form-control" type="email" name="password" id="emailInput"
                               required>
                        <button class="registry__submit" type="submit">ВОЙТИ</button>
                        <button class="registry__submit" type="submit">Забыли пароль?</button>
                    </div>
                    <div class="invalid-feedback">
                        <div class="enter__group">
                            <button class="registry__submit" type="submit">ОТПРАВИТЬ КОД ПОВТОРНО</button>
                        </div>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>

<!-- Форма регистрации -->

<div class="modal fade" id="registryForm" aria-labelledby="userAccount2" tabindex="-1" aria-hidden="true"
     style="display: none;">
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
                <form enctype="multipart/form-data" method="post" action="{{ route('auth.register') }}" class="reg__group needs-validation"
                      novalidate>
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
                               id="fathersName" required>
                        <label for="fathersName" class="reg-label">ОТЧЕСТВО</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="phone" id="fathersName"
                               required>
                        <label for="fathersName" class="reg-label">НОМЕР ТЕЛЕФОНА</label>
                        <div class="invalid-feedback">
                            Некорректный номер телефона, повторите попытку
                        </div>
                    </div>

                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="email" id="fathersName"
                               required>
                        <label for="email" class="reg-label">ПОЧТА</label>
                        <div class="invalid-feedback">
                            Некорректная электронная почта, повторите попытку
                        </div>
                    </div>
                    <label for="email" class="reg-label reg-label--post--layout">внимание! именно на электронную почту
                        придет подтверждение выигрыша!</label>

                    <div class="input__group">

                        <input class="registry__input--field form-control" type="text" name="code" id="promoCode"
                               required>
                        <label for="promoCode" class="reg-label w-100">Добавьте пожалуйста код, который находится на
                            вкладыше внутри пачки</label>
                        <div class="invalid-feedback">
                            Извините, но без кода вы не можете принять участие в акции
                        </div>
                    </div>

                    <div class="file-upload__group" required>
                        <input class="uploadInputForm" type="file" name="check" id="upload" hidden/>
                        <label for="checkLoad" class="reg-label">Загрузите пожалуйста чек (внимание, чек должен быть
                            читабельным)<br></label>
                        <label class="file-upload__label " id="checkLoad" for="upload" required>ЗАГРУЗИТЬ ЧЕК</label>
                        <div class="invalid-feedback">
                            Извините, но без чека вы не можете принять участие в акции
                        </div>

                        <!-- <div class="invalid-feedback">Пример обратной связи неверной формы выбора файла</div> -->
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            <p>
                                Я прочитал и согласен с <a href="#">Правилами Акции и Пользовательским соглашением</a>,
                                согласен на обработку персональных данных
                            </p>
                            <p>
                                Я согласен на получение e-mail рассылки
                            </p>

                        </label>
                        <!-- <div class="invalid-feedback">

                        </div> -->
                    </div>
                    <!-- <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                      <label class="form-check-label" for="invalidCheck">
                        Я согласен на получение e-mail рассылки
                      </label>
                      <div class="invalid-feedback">

                      </div>
                    </div> -->

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
                    <span class="rules__item--text">Купите пачку чая<br>
            в любом магазине<br>
            сети: Перекресток, Окей, Лента...</span>
                </div>
            </div>

            <div class="rules__item">
                <div class="rules__item-wrap">
                    <img class="rules__item--img" src="img/content/registry-comp.png" alt="">
                    <span class="rules__item--text">
            Зарегестрируйте код и чек<br>
            на сайте, в личном кабинете</span>
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

            <h2>ВСЕ ПРИЗЫ</h2>


            <div class="main__slider--wrap">

                <div class="slider-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                     aria-controls="swiper-wrapper-3e10d8cd416d215ef"></div>

                <div class="main__slider__slides">
                <span class="slide__description">Фен Dyson Supersonic (hd07)<br>
                  Цвет: Vinca Blue & Rose</span>
                    <!-- <img class="slider-preview-img" src="img/content/slider-preview.png" alt="" srcset=""> -->
                    <!-- <img class="slider-preview-img" src="img/content/slider-preview.png" alt="" srcset=""> -->
                    <!-- <div class="slider-preview-img"></div> -->
                </div>

                <div class="slider-button-next" tabindex="0" role="button" aria-label="Next slide"
                     aria-controls="swiper-wrapper-3e10d8cd416d215ef"></div>

            </div>

        </section>


    </div>


</main>


<footer class="footer">
    <div class="footer__top">
        <div class="footer__container">


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
                <ul class="footer__list">
                    <li class="footer__item">
                        <a href="#" class="footer__link">
                            <img class="phone-icon" src="img/icons/phone-icon.svg" alt="phone-icon">
                            <span>8-903-798-85-98</span>
                            <div class="w-100"><span>С 9:00 до 18:00 по МСК</span>
                        </a>
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
