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
    <title>Главная</title>
</head>

<body data-variant="user-account">

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

                        <li class="nav-item header__logo d-none d-lg-block"> <a href="/"><img class="header__logo--img" src="img/icons/logo.svg"
                                                                                                       alt="logo"></a></li>

                        <li class="header__item">
                            <a href="#" class="header__link">Призы</a>
                        </li>
                        <li class="header__item">
                            <button class="header__button" ><a href="/account">Личный кабинет</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <a class="navbar-brand d-lg-none logo-mobile--wrap" href="#"><img src="img/icons/logo-mobile.svg"></a>
        <a class="navbar-brand d-lg-none account-logo-mobile" href="/account"><img src="img/icons/icon _person.svg"></a>


    </div>
</header>

<main class="main">

    <div class="breadcrumbs__container">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="/">Главная</a></li>
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="catalog.html"> Личный кабинет </a></li>
        </ul>
    </div>

    <div class="user-account__container">

        <section class="user-account">

            <form class="account-form">
                <button class="log-out__button">ВЫХОД</button>
                <h1>Личный кабинет</h1>
                <div class="user__data">
                    <div class="data-item green--border">Косолапова</div>
                    <div class="data-item btn-gradient-2">Надежда</div>
                    <div class="data-item">Сергеевна</div>
                    <div class="data-item">+7 (925) 785-64-37</div>
                    <div class="data-item">Ваша_почта@mail.ru</div>
                </div>

                <form class="code__input--group">

                    <div class="code__input--account--wrap">
                        <!-- <label for="codeInputField" class="reg-label reg-label--code">Вы ввели некорректный код (без кода участие в акции невозможно).</label>    -->
                        <input class="code__input__field code__input__field--account" type="text" name="" id="codeInputField" placeholder="Введите Ваш код">
                        <div class="invalid-feedback">
                            Вы ввели некорректный код (без кода участие в акции невозможно).
                        </div>
                        <div class="code__slider">
                            <button class="code__carousel-prev" type="button" data-bs-target="#codeCarousel" data-bs-slide="prev"></button>

                            <div class="code-carousel--wrap">

                                <div class="swiper codeSlider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <span class="code__text">3548-QTNS5N</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button class="code__carousel-next" type="button" data-bs-target="#codeCarousel" data-bs-slide="next"></button>
                        </div>
                        <button class="code__submit" type="submit">ЗАРЕГИСТРИРОВАТЬ</button>
                        <button class="code__add" type="submit"><img src="img/icons/plus.svg" alt="add-icon"></button>
                        <label for="codeInputField" class="reg-label reg-label--code">Вы можете зарегестрировать не более 15 кодов в день (на один чек).</label>
                        <span class="code__counter--wrap">У Вас осталось для регистрации <span class="code__count"> 1 </span> код(ов) в день.</span>


                        <div class="file-upload__group">
                            <input type="file" id="uploadPhoto" hidden/>
                            <label class="file-upload__label" id="checkUploadPhoto" for="uploadPhoto">ЗАГРУЗИТЬ ФОТО ЧЕКА</label>
                            <span>Убедитесь, что Ваш чек хорошо читается.<br></span>
                            <span>Вы можете зарегестрировать не более 15 чеков в день.<br>
                ( с 00:00 по 23:59 по Московскому времени )</span>
                        </div>

                    </div>


                </form>


                <div class="code__group">

                    <h1>Активные коды</h1>
                    <div class="code__container">

                        <ul class="code__list">
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>

                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>
                            <li class="code__item">
                                <span class="code__value">3548-QTNS5N</span>
                                <span class="code__date">22.06.2023</span>
                            </li>

                        </ul>

                    </div>


                    <div class="pagination__container pagination__container--display">
                        <div class="pagination-prev">&lt;</div>
                        <div class="code__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                        </div>
                        <div class="pagination-next">&gt;</div>
                    </div>

                </div>


                <div class="slider__group">

                    <h1>Ваши чеки</h1>

                    <div class="check__slider-container">
                        <div class="slider-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                             aria-controls="swiper-wrapper-3e10d8cd416d215ef"></div>

                        <div class="swiper checkSlider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide slide__check">
                                    <div class="slider__check-box">
                                        <img class="slider__check-image" src="img/check/check2.jpg" alt="check2">
                                    </div>
                                </div>
                                <div class="swiper-slide slide__check">
                                    <div class="slider__check-box">
                                        <img class="slider__check-image" src="img/check/check2.jpg" alt="check2">
                                    </div>
                                </div>
                                <div class="swiper-slide slide__check">
                                    <div class="slider__check-box">
                                        <img class="slider__check-image" src="img/check/check2.jpg" alt="check2">
                                    </div>
                                </div>
                                <div class="swiper-slide slide__check">
                                    <div class="slider__check-box">
                                        <img class="slider__check-image" src="img/check/check2.jpg" alt="check2">
                                    </div>
                                </div>
                                <div class="swiper-slide slide__check">
                                    <div class="slider__check-box">
                                        <img class="slider__check-image" src="img/check/check2.jpg" alt="check2">
                                    </div>
                                </div>
                            </div>
                            <div class="pagination__container">
                                <div class="pagination-prev">&lt;</div>
                                <div class="pagination"></div>
                                <div class="pagination-next">&gt;</div>
                            </div>
                        </div>
                        <div class="slider-button-next" tabindex="0" role="button" aria-label="Next slide"
                             aria-controls="swiper-wrapper-3e10d8cd416d215ef"></div>

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
