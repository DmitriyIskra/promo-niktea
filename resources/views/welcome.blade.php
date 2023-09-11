<!DOCTYPE html>
<html lang="ru">

<head>
    @include('template_parts.header_css_js')
    <title>Главная</title>
    <link rel="stylesheet" href="{{ asset("css/round-slider.css") }}">
</head>

<body class="main-body__image" data-variant="main-page">

<header>
    <div class="header-wrapper header-wrapper__main-page">
        @include('template_parts.header_menu')
    </div>
</header>

<!-- Вход, регистрация -->

<div class="modal fade" id="exampleModalToggle" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form">
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="img/icons/modal-close.svg" alt="clofe-form"></button>
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
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="img/icons/modal-close.svg" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg" alt="logo-modal">
                </div>

                <form class="reg__group needs-validation" id="signinForm" novalidate>

                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="email" id="email-auth"
                               required>
                        <label for="promoCode" class="reg-label">Укажите почту, набранную при регистрации</label>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>

                    <div class="input__group">
                        <input class="registry__input--field form-control" type="password" name="password"
                               id="promoCode" required>
                        <label for="promoCode" class="reg-label">Введите пожалуйста код из E-mail</label>
                        <div class="invalid-feedback">
                            Вы указали неверный код или вышло время ожидания
                        </div>
                    </div>
                    <button class="registry__submit registry__submit--top" id="loginreport" type="submit">ВОЙТИ</button>
                    <button class="registry__submit" type="submit">ОТПРАВИТЬ КОД</button>
                </form>
            </div>
        </div>

    </div>
</div>


<!-- Форма регистрации -->

<div class="modal fade" id="registryForm" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form new-user-form" data-variant="registry-user">
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="img/icons/modal-close.svg" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg" alt="Logo">
                </div>
                <form class="reg__group needs-validation" id="user-data" novalidate>
                    <div class="input__group has-validation">
                        <input class="registry__input--field form-control" type="text" name="name" id="firstName"
                               required>
                        <label for="firstName" class="reg-label">ИМЯ</label>
                        <div class="invalid-feedback">
                            Заполните, пожалуйста, имя
                        </div>
                    </div>
                    <div class="input__group has-validation">
                        <input class="registry__input--field form-control" type="text" name="second_name"
                               id="second_name"
                               required>
                        <label for="secondName" class="reg-label">ФАМИЛИЯ</label>
                        <div class="invalid-feedback">
                            Заполните, пожалуйста, фамилию
                        </div>
                    </div>
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="patronymic" id="patronymic"
                               required>
                        <label for="fathersName" class="reg-label">ОТЧЕСТВО</label>
                        <div class="invalid-feedback">
                            Заполните, пожалуйста, отчество
                        </div>
                    </div>
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="phone" data-phone-pattern
                               id="phone"
                               required>
                        <label for="fathersName" class="reg-label">НОМЕР ТЕЛЕФОНА</label>
                        <div class="invalid-feedback">
                            Некорректный номер телефона
                        </div>
                    </div>

                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="email" id="email" required>
                        <label for="email" class="reg-label">ПОЧТА</label>
                        <div class="invalid-feedback">
                            Некорректная электронная почта
                        </div>
                    </div>
                    <label for="email" class="reg-label reg-label--post--layout">внимание!<br class="br-mob"> именно на
                        электронную почту придет<br class="br-mob"> подтверждение выигрыша!
                    </label>

                    <div class="input__group">

                        <input class="registry__input--field form-control" type="text" name="code" id="codeauth"
                               required>
                        <label for="promoCode" class="reg-label reg-label--promo">Добавьте пожалуйста код, который
                            находится на
                            вкладыше внутри пачки</label>
                        <div class="invalid-feedback invalid-feedback--code">
                            Извините, но без кода вы не можете принять участие в акции
                        </div>
                    </div>

                    <div class="file-upload__group input__group" required>

                        <label class="reg-label reg-label--check">Загрузите, пожалуйста, чек (внимание, чек должен быть
                            читабельным)</label>

                        <label class="file-upload__label" for="checkLoadLabel">

                            <input class="file__upload--input form-control" id="checkLoadLabel" type="file" name="check"
                                   aria-label="file example" required>

                        </label>

                        <div class="invalid-feedback invalid-feedback--check" id="file-info">Извините, но без чека вы не
                            можете принять<br class="br-mob"> участие в акции
                        </div>

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


    <div class="header-wrapper__main-page--img"></div>

    <div class="main-page__container">


        <h1>Как принять участие в розыгрыше?</h1>

        <section class="rules__action">

            <div class="rules__item">
                <div class="rules__item-wrap">
                    <img class="rules__item--img" src="img/content/basket-prize.png" alt="Basket">
                    <span class="rules__item--text">Купите пачку чая Niktea<br>
              в удобном для вас розничном<br>
              или интернет-магазине</span>
                </div>
            </div>
            <div class="rules__item">
                <div class="rules__item-wrap">
                    <img class="rules__item--img" src="img/content/registry-comp.png" alt="Registry">
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

        <a href="/rules">
            <button class="recepies__button">ПРАВИЛА ПРОВЕДЕНИЯ АКЦИИ</button>
        </a>


        <section class="main__slider">

            <div class="main__slider--wrap">
                <!-- <div class="slider-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div> -->

                <div class="main__slider__slides">

                    <div class="testSlider roundSlider">

                        <section class="wr-slider-content">
                            <h2>ВСЕ ПРИЗЫ</h2>

                            <div class="active-slide__description"></div>

                            <div class="slider slider_circle_10">
                                <div class="slide__container">
                                    <span class="slide__description">Сертификат на путешествие 300 000р</span>
                                    <div class="slide-img--wrap slide-img--wrap-certif">
                                        <img class="main-slide__img main-slide__img--light"
                                             src="img/content/priz/certif.png"
                                             alt="certif">
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
                    <span class="slide__description">Годовой запас чая Niktea<br>
                      24 упаковки (пакетированный), более 10 вкусов</span>
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
                    <span class="slide__description">Подарочный чайный набор Niktea<br>
                      (чай+кружка)</span>
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


                                <div class="next_button"></div>
                                <div class="prev_button"></div>
                            </div>
                        </section>

                    </div>

                </div>

            </div>

        </section>

        <div class="priz-mobile">

            <div class="priz__item">
          <span class="priz__item__text priz__item__text--big">Главный подарок<br>
            - сертификат на путешествие</span>
                <img class="priz__item__img priz__item__img--layout" src="img/content/mobile/certif-mobile.png"
                     alt="certif-mobile">
            </div>


            <div class="priz__item">
                <span class="priz__item__text">Macbook air m2<br>midnight</span>
                <img class="priz__item__img" src="img/content/mobile/notebook.png" alt="notebook.png">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Iphone 14 pro 256<br>deep purple</span>
                <img class="priz__item__img" src="img/content/mobile/iphone.png" alt="iphone">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Ipad mini 256 space<br>grey</span>
                <img class="priz__item__img" src="img/content/mobile/ipad.png" alt="ipad">
            </div>


            <div class="priz__item">
                <span class="priz__item__text">Очиститель воздуха<br>Dyson HP05</span>
                <img class="priz__item__img" src="img/content/mobile/dyson.png" alt="dyson">
            </div>


            <div class="priz__item">
                <span class="priz__item__text">Bork Электросамокат</span>
                <img class="priz__item__img" src="img/content/mobile/scooter-mobile.png" alt="scooter-mobile">
            </div>


            <div class="priz__item">
                <span class="priz__item__text">Sony Playstation 5</span>
                <img class="priz__item__img" src="img/content/mobile/playstation-mobile.png" alt="playstation-mobile">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Фен Dyson</span>
                <img class="priz__item__img" src="img/content/mobile/fan-mobile.png" alt="fan-mobile">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Портативный<br>аккумулятор Bork</span>
                <img class="priz__item__img" src="img/content/mobile/bork-mobile.png" alt="bork-mobile">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Яндекс станция 2<br>с Алисой</span>
                <img class="priz__item__img" src="img/content/mobile/alice-mobile.png" alt="alice-mobile">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Air Pods 2</span>
                <img class="priz__item__img" src="img/content/mobile/airbods-mobile.png" alt="airbods-mobile">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Чайник Bork</span>
                <img class="priz__item__img" src="img/content/mobile/teapot-mobile.png" alt="teapot-mobile">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">300 подарочных наборов<br>Niktea</span>
                <img class="priz__item__img" src="img/content/mobile/300.png" alt="300">
            </div>

            <div class="priz__item">
                <span class="priz__item__text">Годовой запас чая<br>Niktea</span>
                <img class="priz__item__img" src="img/content/mobile/tea-mobile.png" alt="tea-mobile">
            </div>


        </div>

    </div>

</main>



@include('template_parts.footer')

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
</body>
</html>
