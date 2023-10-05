<!DOCTYPE html>
<html lang="ru">

<head>
    @include('template_parts.header_css_js')
    <title>Ваш личный кабинет на промостранице бренда Niktea</title>
    <meta name="description" content="Здесь вы можете выиграть путешествие, главные или чайные призы."/>

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
                        <div class="code__slider"> <!-- !!!!!!!!   code__sleder--display  скрытие -->

                            <div class="code__carousel-prev" type="button" data-bs-target="#codeCarousel" data-bs-slide="prev"></div>

                            <div class="code-carousel--wrap">

                                <div class="swiper account__slider-add-code codeSlider">
                                    <div class="swiper-wrapper codeslider-output">


                                    </div>
                                </div>

                            </div>

                            <div class="code__carousel-next" type="button" data-bs-target="#codeCarousel" data-bs-slide="next"></div>

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
                        <ul class="code__list" data-current-page="1" aria-live="polite">

                            
                        </ul>

                    </div>

                    <div class="account__wr-pag-code">
                        <div class="account__pag-code-arrow account__pag-code_prev">
                            <img src="{{ asset('img/icons/pagination-arrow-left.svg') }}" class="account__pag-arrow-img" alt="pagination-arrow-left">
                        </div>

                        <div class="account__pag-num" style="text-align: center;">

                        </div>

                        <div class="account__pag-code-arrow account__pag-code_next">
                            <img src="{{ asset('img/icons/pagination-arrow-right.svg') }}" class="account__pag-arrow-img" alt="pagination-arrow-right">
                        </div>
                    </div>




                    <div class="slider__group">

                        <h1>Ваши чеки</h1>

                        <div class="check__slider-container">
                            <div class="slider-button-prev account__slider-check-arrow" tabindex="0" role="button"></div>

                            <div class="swiper checkSlider account__slider-check">
                                <div class="swiper-wrapper checkSlides account__slider-check-wrapper">
                                    
                                </div>
                            </div>

                            <div class="slider-button-next account__slider-check-arrow account__slider-check-arrow_active" tabindex="0" role="button"></div>

                        </div>
                        <div class="pagination__container">
                            <div class="pagination-prev account__pagination-arrow pagination-prev--check">
                                <img src="{{ asset('img/icons/pagination-arrow-left.svg') }}" class="account__pag-arrow-img" alt="pagination-arrow-left">
                            </div>

                            <div class="pagination">
                                <div class="account__pagination-list"></div>
                            </div>

                            <div class="pagination-next account__pagination-arrow pagination-next--check">
                                <img src="{{ asset('img/icons/pagination-arrow-right.svg') }}" class="account__pag-arrow-img" alt="pagination-arrow-right">
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
