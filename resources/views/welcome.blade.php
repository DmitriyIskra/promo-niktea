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
    <div class="header-wrapper header-wrapper__main-page">

        <nav class="navbar__wrap navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon navbar-toggler-icon2"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-navq header__list">
                        <li class="header__item" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                            <a href="#" class="header__link">Регистрация</a>
                        </li>
                        <li class="header__item">
                            <a href="/winners" class="header__link">Победители</a>
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
        </nav>
        <a class="navbar-brand d-lg-none logo-mobile--wrap" href="#">
            <img src="img/icons/logo-mobile.svg" alt="logo-mobile">
        </a>
        <a class="navbar-brand d-lg-none account-logo-mobile" href="/account">
            <!-- <img src="img/icons/icon_person.svg" alt="icon_person"> -->
        </a>

    </div>
</header>

<!-- Вход, регистрация -->

<div class="modal fade" id="exampleModalToggle"  tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form">
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img src="img/icons/modal-close.svg" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg"  alt="logo-modal">
                </div>
                <div class="buttons__group">
                    <button class="registry__submit" type="submit" data-bs-target="#enterAccount" data-bs-toggle="modal">ВХОД</button>
                    <button class="registry__submit" type="submit" data-bs-target="#registryForm" data-bs-toggle="modal">РЕГИСТРАЦИЯ</button>
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
                    <img src="img/icons/modal-close.svg" alt="close-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg"  alt="logo-modal">
                </div>


                <form method="post" action="{{ route('auth.login') }}" class="reg__group needs-validation" id="signinForm" novalidate>
                    @csrf

                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="email" id="email-auth" required>
                        <label for="promoCode" class="reg-label">Укажите почту, набранную при регистрации</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>

                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="password" id="promoCode" required>
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
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img src="img/icons/modal-close.svg" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg"  alt="">
                </div>

                <form enctype="multipart/form-data" method="post" action="{{ route('auth.register') }}"
                      class="reg__group needs-validation" id="user-data" novalidate>
                    @csrf
                    <div class="input__group has-validation">
                        <input class="registry__input--field form-control" type="text" name="name" id="firstName" required>
                        <label for="firstName" class="reg-label">ИМЯ</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>
                    <div class="input__group has-validation">
                        <input class="registry__input--field form-control" type="text" name="second_name" id="second_name" required>
                        <label for="secondName" class="reg-label">ФАМИЛИЯ</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="patronymic" id="patronymic" required>
                        <label for="fathersName" class="reg-label">ОТЧЕСТВО</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="phone" data-phone-pattern id="phone" required>
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
                    <label for="email" class="reg-label reg-label--post--layout">внимание!<br class="br-mob"> именно на электронную почту придет подтверждение выигрыша!</label>
                    <div class="input__group">

                        <input class="registry__input--field form-control" type="text" name="code[]" id="codeauth" required>
                        <label for="promoCode" class="reg-label reg-label--promo">Добавьте пожалуйста код, который находится на вкладыше внутри пачки</label>
                        <div class="invalid-feedback">
                            Извините, но без кода вы не можете принять участие в акции
                        </div>
                    </div>

                    <div class="file-upload__group input__group" required>
                        <input type="file" class="file-upload__label file-upload__in  form-control" onchange="return fileValidation()" name="check" aria-label="file example" required>
                        <label for="checkLoad" class="reg-label reg-label--check" id="checkLoadLabel">Загрузите пожалуйста чек (внимание, чек должен быть читабельным)<br></label>
                        <div class="invalid-feedback" id="file-info">Извините, но без чека вы не можете принять участие в акции</div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
              <span>
                Я прочитал и согласен с <a href="#">Правилами Акции и Пользовательским соглашением</a>,
                согласен на обработку персональных данных
              </span>
                            <span>
                Я согласен на получение e-mail рассылки
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

    <div class="breadcrumbs__container">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="/index">Главная</a></li>
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="/catalog"> Личный кабинет </a></li>
        </ul>
    </div>

    <div class="user-account__container">

        <section class="user-account">

            <div class="account-form">

                <button class="log-out__button">ВЫХОД</button>
                <h1>Личный кабинет</h1>
                <div class="user__data">
                    <div class="data-item green--border">Косолапова</div>
                    <div class="data-item btn-gradient-2">Надежда</div>
                    <div class="data-item">Сергеевна</div>
                    <div class="data-item">+7 (925) 785-64-37</div>
                    <div class="data-item">Ваша_почта@mail.ru</div>
                </div>

                <div class="code__input--group">

                    <div class="code__input--account--wrap">
                        <input class="code__input__field code__input__field--account" type="text" name="" id="codeInputField" placeholder="Введите Ваш код">
                        <div class="invalid-feedback">
                            Вы ввели некорректный код (без кода участие в акции невозможно).
                        </div>
                        <div class="code__slider">
                            <button class="code__carousel-prev" type="button" data-bs-target="#codeCarousel" data-bs-slide="prev"></button>

                            <div class="code-carousel--wrap">

                                <div class="swiper codeSlider">
                                    <div class="swiper-wrapper codeslider-output">
                                        <!-- <div class="swiper-slide">
                                          <span class="code__text">3548-QTNS5N</span>
                                        </div>-->
                                    </div>
                                </div>

                            </div>

                            <button class="code__carousel-next" type="button" data-bs-target="#codeCarousel" data-bs-slide="next"></button>
                        </div>
                        <button class="code__submit" type="submit">ЗАРЕГИСТРИРОВАТЬ</button>
                        <button class="code__add" type="submit"><img src="img/icons/plus.svg" alt="add-icon"></button>
                        <label for="codeInputField" class="reg-label reg-label--code">Вы можете зарегистрировать не более 15 кодов в день (на один чек).</label>
                        <span class="code__counter--wrap">У Вас осталось для регистрации <span class="code__count"> 1 </span> код(ов) в день.</span>


                        <div class="file-upload__group">
                            <input type="file" id="uploadPhoto" hidden/>
                            <label class="file-upload__label" id="checkUploadPhoto" for="uploadPhoto">ЗАГРУЗИТЬ ФОТО ЧЕКА</label>
                            <span>Убедитесь, что Ваш чек хорошо читается.<br></span>
                            <span>Вы можете зарегестрировать не более 15 чеков в день.<br>
                ( с 00:00 по 23:59 по Московскому времени )</span>
                        </div>

                    </div>

                </div>


                <div class="code__group">

                    <h1>Активные коды</h1>
                    <div class="code__container">


                        <ul class="code__list" id="paginated-list" data-current-page="1" aria-live="polite">

                            <!-- <li class="code__item">
                              <span class="code__value">3548-QTNS5N</span>
                            <span class="code__date">22.06.2023</span>
                            </li>

                            <li class="code__item">
                              <span class="code__value">Третья-QTNS5N</span>
                            <span class="code__date">22.06.2023</span>
                            </li> -->


                        </ul>

                        <div class="pagination-container">
                            <button class="pagination-button pagination-prev" id="prev-button" aria-label="Previous page" title="Previous page">
                                <img src="img/icons/pagination-arrow-left.svg" alt="pagination-arrow-left">
                            </button>

                            <div id="pagination-numbers">

                            </div>

                            <button class="pagination-button pagination-next" id="next-button" aria-label="Next page" title="Next page">
                                <!-- &gt; -->
                                <img src="img/icons/pagination-arrow-right.svg" alt="pagination-arrow-right">
                            </button>
                        </div>


                        <!-- <ul class="code__list">
                          <li class="code__item">
                            <span class="code__value">3548-QTNS5N</span>
                          <span class="code__date">22.06.2023</span>
                          </li>

                        </ul> -->

                    </div>



                    <!-- <div class="pagination__container pagination__container--display">
                      <div class="pagination-prev" id="next-button">&lt;</div>
                      <div class="code__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                      </div>
                      <div class="pagination-next">&gt;</div>
                    </div>

                  </div> -->


                    <div class="slider__group">

                        <h1>Ваши чеки</h1>

                        <div class="check__slider-container">
                            <div class="slider-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                                 aria-controls="swiper-wrapper-3e10d8cd416d215ef"></div>

                            <div class="swiper checkSlider">
                                <div class="swiper-wrapper checkSlides">
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
                                    <div class="pagination-prev">
                                        <img src="img/icons/pagination-arrow-left.svg" alt="pagination-arrow-left">
                                    </div>
                                    <div class="pagination"></div>
                                    <div class="pagination-next">
                                        <img src="img/icons/pagination-arrow-right.svg" alt="pagination-arrow-right">
                                    </div>
                                </div>
                            </div>
                            <div class="slider-button-next" tabindex="0" role="button" aria-label="Next slide"
                                 aria-controls="swiper-wrapper-3e10d8cd416d215ef"></div>

                        </div>


                    </div>

                </div>
        </section>
        <div class="priz-mobile">

            <div class="priz__item">
          <span class="priz__item__text priz__item__text--big">Главный подарок<br>
            - сертификат на путешествие</span>
                <img class="priz__item__img priz__item__img--layout" src="img/content/mobile/certif-mobile.png" alt="" srcset="">
            </div>


            <div class="priz__item">
                <span class="priz__item__text">Macbook air m2<br>midnight</span>
                <img class="priz__item__img" src="img/content/mobile/notebook.png" alt="" srcset="">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Iphone 14 pro 256<br>deep purple</span>
                <img class="priz__item__img" src="img/content/mobile/iphone.png" alt="" srcset="">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Ipad mini 256 space<br>grey</span>
                <img class="priz__item__img" src="img/content/mobile/ipad.png" alt="" srcset="">
            </div>


            <div class="priz__item">
                <span class="priz__item__text">Очиститель воздуха<br>Dyson HP05</span>
                <img class="priz__item__img" src="img/content/mobile/dyson.png" alt="" srcset="">
            </div>


            <div class="priz__item">
                <span class="priz__item__text">Bork Электросамокат</span>
                <img class="priz__item__img" src="img/content/mobile/scooter-mobile.png" alt="" srcset="">
            </div>


            <div class="priz__item">
                <span class="priz__item__text">Sony Playstation 5</span>
                <img class="priz__item__img" src="img/content/mobile/playstation-mobile.png" alt="" srcset="">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Фен Dyson</span>
                <img class="priz__item__img" src="img/content/mobile/fan-mobile.png" alt="" srcset="">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Портативный<br>аккумулятор Bork</span>
                <img class="priz__item__img" src="img/content/mobile/bork-mobile.png" alt="" srcset="">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Яндекс станция 2<br>с Алисой</span>
                <img class="priz__item__img" src="img/content/mobile/alice-mobile.png" alt="" srcset="">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Air Pods 2</span>
                <img class="priz__item__img" src="img/content/mobile/airbods-mobile.png" alt="" srcset="">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Чайник Bork</span>
                <img class="priz__item__img" src="img/content/mobile/teapot-mobile.png" alt="" srcset="">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">300 подарочных наборов<br>Niktea</span>
                <img class="priz__item__img" src="img/content/mobile/300.png" alt="" srcset="">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Годовой запас чая<br>Niktea</span>
                <img class="priz__item__img" src="img/content/mobile/tea-mobile.png" alt="" srcset="">
            </div>

    </div>


</main>

<footer class="footer">
    <div class="footer__top">
        <div class="footer__container">

            <div class="footer__column link-col">
                <li class="footer__item">
                    <a href="https://nikteaworld.com/" class="footer__link">Сайт бренда NIKTEA</a>
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
<script src="{{ asset("js/form.js") }}"></script>
<script src="{{ asset("js/script.js") }}"></script>
</body>
</html>
