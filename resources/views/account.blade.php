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

                        <li class="nav-item header__logo d-none d-lg-block"> <a href="index.html"><img class="header__logo--img" src="img/icons/logo.svg"
                                                                                                       alt="logo"></a></li>

                        <li class="header__item">
                            <a href="#" class="header__link">Призы</a>
                        </li>
                        <li class="header__item">
                            <button class="header__button" ><a href="account.html">Личный кабинет</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <a class="navbar-brand d-lg-none logo-mobile--wrap" href="#"><img src="img/icons/logo-mobile.svg"></a>
        <a class="navbar-brand d-lg-none account-logo-mobile" href="account.html"><img src="img/icons/icon _person.svg"></a>


    </div>
</header>

<div class="modal fade" id="exampleModalToggle" aria-labelledby="userAccount" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form">
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img src="../img/icons/close-white.svg" alt="close-form"></button>
            </div>
            <div class="modal-body ">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg"  alt="">
                </div>
                <div class="buttons__group">
                    <button class="registry__submit" type="submit" data-bs-target="#enterAccount" data-bs-toggle="modal">ВХОД</button>
                    <button class="registry__submit" type="submit" data-bs-target="#registryForm" data-bs-toggle="modal">РЕГИСТРАЦИЯ</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="enterAccount" aria-labelledby="userAccount3" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form">
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img src="../img/icons/close-white.svg" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg"  alt="">
                </div>
                <form class="reg__group needs-validation"  novalidate>
                    <div class="input__group has-validation">
                        <label for="firstName" class="reg-label">Укажите почту, набранную при регистрации </label>
                        <div class="invalid-feedback">Заполните пожалуйста данное поле</div>
                        <input class="registry__input--field" type="text" name="" id="firstName" required>
                    </div>
                    <div class="input__group">
                        <label for="emailInput" class="reg-label">Введите пожалуйста код из E-mail </label>
                        <input class="registry__input--field" type="email" name="" id="emailInput" required>
                        <button class="registry__submit" type="submit">ВОЙТИ</button>
                        <button class="registry__submit" type="submit">ОТПРАВИТЬ КОД</button>
                        <div class="invalid-feedback">
                            <div class="enter__group">

                                <button class="registry__submit" type="submit">ОТПРАВИТЬ КОД ПОВТОРНО</button>
                            </div>
                        </div>
                    </div>
                </form>



            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="registryForm" aria-labelledby="userAccount2" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form new-user-form" data-variant=registry-user>
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img src="../img/icons/close-white.svg" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="img/icons/logo-modal.svg"  alt="">
                </div>
                <form class="reg__group needs-validation" novalidate>
                    <div class="input__group has-validation">
                        <label for="firstName" class="reg-label">ИМЯ</label>
                        <input class="registry__input--field form-control" type="text" name="" id="firstName" required>
                        <div class="invalid-feedback">
                            Заполните пожалуйста данное поле
                        </div>
                    </div>
                    <div class="input__group">
                        <label for="secondName" class="reg-label">ФАМИЛИЯ</label>
                        <input class="registry__input--field form-control" type="text" name="" id="secondName" required>
                    </div>
                    <div class="input__group">
                        <label for="fathersName" class="reg-label">ОТЧЕСТВО</label>
                        <input class="registry__input--field form-control" type="text" name="" id="fathersName" required>
                    </div>
                    <div class="input__group">
                        <label for="fathersName" class="reg-label">НОМЕР ТЕЛЕФОНА</label>
                        <input class="registry__input--field form-control" type="text" name="" id="fathersName" required>
                    </div>

                    <div class="input__group">
                        <label for="email" class="reg-label">ПОЧТА</label>
                        <input class="registry__input--field form-control" type="text" name="" id="fathersName" required>
                    </div>
                    <label for="email" class="reg-label reg-label--post--layout">внимание! именно на электронную почту придет подтверждение выигрыша!</label>


                    <label for="promoCode" class="reg-label">Добавьте пожалуйста код, который находится на вкладыше внутри пачки</label>
                    <input class="registry__input--field form-control" type="text" name="" id="promoCode" required>


                    <div class="file-upload__group" required>
                        <label for="checkLoad" class="reg-label">Загрузите пожалуйста чек (внимание, чек должен быть читабельным)<br><br></label>
                        <input type="file" id="upload" hidden/>
                        <div class="invalid-feedback">
                            Извините, но без чека вы не можете принять участие в акции
                        </div>
                        <label class="file-upload__label " id="checkLoad" for="upload" required>ЗАГРУЗИТЬ ЧЕК</label>
                        <div class="invalid-feedback">Пример обратной связи неверной формы выбора файла</div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Я прочитал и согласен с <a href="#">Правилами Акции и Пользовательским соглашением</a>,
                            согласен на обработку персональных данных<br>
                            Я согласен на получение e-mail рассылки
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

    <div class="breadcrumbs__container">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="index.html">Главная</a></li>
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="catalog.html"> Личный кабинет </a></li>
        </ul>
    </div>

    <div class="user-account__container">

        <section class="user-account">

            <div class="account-form">
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
                                        <!-- <div class="swiper-slide">
                                          <span class="code__text">3548-QTNS5N</span>
                                        </div>
                                        <div class="swiper-slide">
                                          <span class="code__text">3548-QTNS5N</span>
                                        </div>
                                        <div class="swiper-slide">
                                          <span class="code__text">3548-QTNS5N</span>
                                        </div>
                                        <div class="swiper-slide">
                                          <span class="code__text">3548-QTNS5N</span>
                                        </div>
                                        <div class="swiper-slide">
                                          <span class="code__text">3548-QTNS5N</span>
                                        </div> -->
                                    </div>
                                </div>

                            </div>

                            <button class="code__carousel-next" type="button" data-bs-target="#codeCarousel" data-bs-slide="next"></button>
                        </div>
                        <button class="code__submit" type="submit">ЗАРЕГИСТРИРОВАТЬ</button>
                        <button class="code__add" type="submit"><img src="img/icons/plus.svg" alt="" srcset=""></button>
                        <label for="codeInputField" class="reg-label reg-label--code">Вы можете зарегестрировать не более 15 кодов в день (на один чек).</label>
                        <span class="code__counter--wrap">У Вас осталось для регистрации <span class="code__count"> 1 </span> код(ов) в день.</span>


                        <div class="file-upload__group">
                            <input type="file" id="uploadPhoto" hidden/>
                            <label class="file-upload__label" for="uploadPhoto">ЗАГРУЗИТЬ ФОТО ЧЕКА</label>
                            <span>Убедитесь, что Ваш чек хорошо читается.<br></span>
                            <span>Вы можете зарегестрировать не более 15 чеков в день.<br>
                ( с 00:00 по 23:59 по Московскому времени )</span>
                        </div>

                    </div>


                </div>


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

<footer>
    <div class="footer__top">
        <div class="footer__container">


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
                    <li class="footer__item">
                        <a href="#" class="footer__link"><img class="phone-icon" src="img/icons/phone-icon.svg" alt=""> 8-903-798-85-98</a>
                        <br>
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
