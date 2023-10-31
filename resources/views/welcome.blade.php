<!DOCTYPE html>
<html lang="ru">

<head>
    @include('template_parts.header_css_js')
    <title>Промостраница в честь 15-летия чайного бренда NIktea!</title>
    <meta name="description" content="Наши призы: сертификат на путешествие мечты, Macbook, IPhone, Sony PlayStation, электросамокат Bork, годовой запас чая NIktea и многое другое!"/>
    <link rel="stylesheet" href="{{ asset("css/round-slider.css?v=").time()}}">
</head>

<body class="main-body__image" data-variant="main-page">

<header>
    <div class="header-wrapper header-wrapper__main-page">
        @include('template_parts.header_menu')
    </div>
</header>

<!-- Вход, регистрация -->

@include('template_parts.modal')

<main class="main">


    <div class="header-wrapper__main-page--img"></div>

    <div class="main-page__container">


        <h1>Как принять участие в розыгрыше?</h1>

        <section class="rules__action">

            <div class="rules__item"> 
                <div class="rules__item-wrap">
                    <img class="rules__item--img" src="img/content/basket-prize.png" alt="Basket">
                    <span class="rules__item--text">Купите промо-пачку чая Niktea<br>
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
                <div class="rules__item-wrap rules__item-wrap_last">
                    <img class="rules__item--img rules__item--img_last" src="img/content/man-icon.png" alt="">
                    <span class="rules__item--text">
              Ждите результаты <br>
              розыгрыша</span>
                </div>
            </div>

        </section>

        <div class="links-partner__wrapper">
            <p class="links-partner__text">
                Промо-пачки можно купить на сайтах <a class="links-partner__link" href=" https://oasis-msk.ru/Paketirovannyj-tea-niktea-c-28_109_126.html" title="Oasis" target="_blank">Oasis</a>, <a class="links-partner__link" href="https://www.ozon.ru/brand/niktea-34988836/" title="Ozon" target="_blank">Ozon</a>, в магазинах О'Кей, гипермаркетах Глобус, Перекресток и других.
            </p>
        </div>

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
                                        <img class="main-slide__img slide-acc-bork-img" src="img/content/priz/borkL787.png" alt="borkL787">
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
