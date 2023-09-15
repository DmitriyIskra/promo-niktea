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
        // если пользователь не авторизован, редирект на главную
        if (auther.is_auth === false) {
            window.location.href = "/";
        }

        // каждый раз при загрузке страницы вызывается 
        // для заполнения данных о пользователе
        (async () => {
            const responce = await accountInfo()
            const result = await responce.json()
            console.log(result)
            // разделяем потому что иногда нужно получить данные
            // без отрисовки данных на всей странице
            document.addEventListener('DOMContentLoaded', fillAccountData(result))
        })()
</script>


@include('template_parts.modal')

<main class="main">



    <div class="user-account__container">

        <section class="user-account">

            <div class="account-form">

                <div class="wr-exit">
                    <div class="wr-button-exit">
                        <button class="log-out__button">ВЫХОД</button>
                    </div>
                </div>
                <h1>Личный кабинет</h1>
                <div class="user__data">
                    <div class="data-item green--border account__lastname"></div>
                    <div class="data-item btn-gradient-2 account__firstname"></div>
                    <div class="data-item account__patronymic"></div>
                    <div class="data-item account__phone"></div>
                    <div class="data-item account__mail"></div>
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
                        <button class="code__submit">ЗАРЕГИСТРИРОВАТЬ</button>
                        <button class="code__add" id="account__code-add"><img src="{{ asset('img/icons/plus.svg') }}" alt="add-icon"></button>
                        <label for="codeInputField" class="reg-label--code">Вы можете зарегистрировать не более 15 кодов в день (на один чек).</label>
                        <span class="code__counter--wrap">У Вас осталось для регистрации<br class="br-mob"> <span class="code__count"> 1 </span> код(ов) в день.</span>


                        <div class="file-upload__group">
                            <div class="account__file-result account__file_valid">Ваш чек успешно загружен</div>
                            <div class="account__file-result account__file_invalid">Не удалось загрузить чек, попробуйте еще раз</div>
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
                            </li> -->
                        </ul>

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
<!-- событие на кнопку выход -->
<script>
    logout()
</script>
</body>
</html>
