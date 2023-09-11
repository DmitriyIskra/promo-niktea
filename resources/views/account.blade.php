<!DOCTYPE html>
<html lang="ru">

<head>
    @include('template_parts.header_css_js')
    <title>Личный кабинет</title>
</head>

<body data-variant="user-account">

<body data-variant="user-account">

<header>
    <div class="header-wrapper header-wrapper--white">
        @include('template_parts.header_menu')
    </div>
</header>
<script>
        if (auther.is_auth === false) {
            window.location.href = "/";
        }
</script>


<!-- Вход, регистрация -->

<div class="modal fade" id="exampleModalToggle" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-form">
            <div class="modal-header">
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="{{ asset('img/icons/modal-close.svg') }}" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="{{ asset('img/icons/logo-modal.svg') }}" alt="logo-modal">
                </div>
                <div class="buttons__group">
                    <button class="registry__submit" type="submit" data-bs-target="#enterAccount"
                            data-bs-toggle="modal">ВХОД</button>
                    <button class="registry__submit" type="submit" data-bs-target="#registryForm"
                            data-bs-toggle="modal">РЕГИСТРАЦИЯ</button>
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
                        src="{{ asset('img/icons/modal-close.svg') }}" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="{{ asset('img/icons/logo-modal.svg') }}" alt="logo-modal">
                </div>

                <form class="reg__group needs-validation" id="signinForm" novalidate>

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
                <button type="button" class="modal_close" data-bs-dismiss="modal" aria-label="Close"><img
                        src="{{ asset('img/icons/modal-close.svg') }}" alt="clofe-form"></button>
            </div>
            <div class="modal-body">
                <div class="logo__modal--container">
                    <img class="logo__modal--img" src="{{ asset('img/icons/logo-modal.svg') }}" alt="Logo">
                </div>
                <form class="reg__group needs-validation" id="user-data" novalidate>
                    <div class="input__group has-validation">
                        <input class="registry__input--field form-control" type="text" name="name" id="firstName" required>
                        <label for="firstName" class="reg-label">ИМЯ</label>
                        <div class="invalid-feedback">
                            Заполните, пожалуйста, имя
                        </div>
                    </div>
                    <div class="input__group has-validation">
                        <input class="registry__input--field form-control" type="text" name="second_name" id="second_name"
                               required>
                        <label for="secondName" class="reg-label">ФАМИЛИЯ</label>
                        <div class="invalid-feedback">
                            Заполните, пожалуйста, фамилию
                        </div>
                    </div>
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="patronymic" id="patronymic" required>
                        <label for="fathersName" class="reg-label">ОТЧЕСТВО</label>
                        <div class="invalid-feedback">
                            Заполните, пожалуйста,  отчество
                        </div>
                    </div>
                    <div class="input__group">
                        <input class="registry__input--field form-control" type="text" name="phone" data-phone-pattern id="phone"
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
                        электронную почту придет<br class="br-mob"> подтверждение выигрыша!</label>

                    <div class="input__group">

                        <input class="registry__input--field form-control" type="text" name="code" id="codeauth" required>
                        <label for="promoCode" class="reg-label reg-label--promo">Добавьте пожалуйста код, который находится на
                            вкладыше внутри пачки</label>
                        <div class="invalid-feedback invalid-feedback--code">
                            Извините, но без кода вы не можете принять участие в акции
                        </div>
                    </div>

                    <div class="file-upload__group input__group" required>

                        <label class="reg-label reg-label--check">Загрузите, пожалуйста, чек (внимание, чек должен быть читабельным)</label>

                        <label class="file-upload__label" for="checkLoadLabel">

                            <input class="file__upload--input form-control" id="checkLoadLabel" type="file" name="check" aria-label="file example" required>

                        </label>

                        <div class="invalid-feedback invalid-feedback--check" id="file-info">Извините, но без чека вы не можете принять<br class="br-mob"> участие в акции
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
                        <input class="code__input__field code__input__field--account" type="text" name="code" id="codeInputField" placeholder="Введите Ваш код">
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
                        <button class="code__add" type="submit"><img src="{{ asset('img/icons/plus.svg') }}" alt="add-icon"></button>
                        <label for="codeInputField" class="reg-label--code">Вы можете зарегистрировать не более 15 кодов в день (на один чек).</label>
                        <span class="code__counter--wrap">У Вас осталось для регистрации<br class="br-mob"> <span class="code__count"> 1 </span> код(ов) в день.</span>


                        <div class="file-upload__group">
                            <input type="file" class="file-upload__input--user" id="uploadPhoto" hidden/>
                            <label class="file-upload__label file-upload__label--width" id="checkUploadPhoto" for="uploadPhoto">ЗАГРУЗИТЬ ФОТО ЧЕКА</label>
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




                        <!-- <ul class="code__list">
                          <li class="code__item">
                            <span class="code__value">3548-QTNS5N</span>
                          <span class="code__date">22.06.2023</span>
                          </li>

                        </ul> -->

                    </div>

                    <div class="pagination-container">
                        <button class="pagination-button pagination-prev" id="prev-button" aria-label="Previous page" title="Previous page">
                            <img src="{{ asset('img/icons/pagination-arrow-left.svg') }}" alt="pagination-arrow-left">
                        </button>

                        <div id="pagination-numbers" style="text-align: center;">

                        </div>

                        <button class="pagination-button pagination-next" id="next-button" aria-label="Next page" title="Next page">
                            <img src="{{ asset('img/icons/pagination-arrow-right.svg') }}" alt="pagination-arrow-right">
                        </button>
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
                            <div class="slider-button-prev" tabindex="0" role="button"></div>

                            <div class="swiper checkSlider">
                                <div class="swiper-wrapper checkSlides">
                                </div>
                            </div>

                            <div class="slider-button-next" tabindex="0" role="button"></div>

                        </div>
                        <div class="pagination__container">
                            <div class="pagination-prev pagination-prev--check">
                                <img src="{{ asset('img/icons/pagination-arrow-left.svg') }}" alt="pagination-arrow-left">
                            </div>
                            <div class="pagination"></div>
                            <div class="pagination-next pagination-next--check">
                                <img src="{{ asset('img/icons/pagination-arrow-right.svg') }}" alt="pagination-arrow-right">
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>

</main>

@include('template_parts.footer')


</body>
</html>
