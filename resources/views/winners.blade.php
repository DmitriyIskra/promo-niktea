<!DOCTYPE html>
<html lang="ru">

<head>
    @include('template_parts.header_css_js')
    <link rel="stylesheet" href="{{ asset("css/winners.css") }}">
    <title>Главная</title>
</head>

<body data-variant="winners">

<header>
    <div class="header-wrapper header-wrapper--white">

        @include('template_parts.header_menu')

        <a class="navbar-brand d-lg-none logo-mobile--wrap" href="#">
            <img src="img/icons/logo-mobile.svg" alt="logo-mobile">
        </a>
        <a class="navbar-brand d-lg-none account-logo-mobile" href="/account">
        </a>

    </div>
</header>


<main class="main">

    <div class="breadcrumbs__container">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="/index">Главная</a></li>
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="/catalog"> Победители </a></li>
        </ul>
    </div>

    <div class="winners__container">

        <div class="winners__head">
            <h1>Победители</h1>
        </div>

        <section class="winners">

            <div class="winners-body">


                <div class="prize-button--wrap">


                    <button class="prize-button"></button>

                    <div class="prize__span--group">
                        <span class="prize__main">ГЛАВНЫЕ ПРИЗЫ</span>
                        <span class="prize__tea">ЧАЙНЫЕ ПРИЗЫ</span>
                    </div>

                    <button class="prize-button--mobile">ГЛАВНЫЕ ПРИЗЫ</button>

                    <button class="prize-button--mobile">ЧАЙНЫЕ ПРИЗЫ</button>

                </div>

                <table>
                    <thead class="winners__tabe__head">
                    <tr>
                        <th>Приз</th>
                        <th class="winner__contacts">Номер телефона и почта</th>
                        <th>Дата вручения</th>
                    </tr>
                    </thead>
                    <tbody class="winners__list winners__list--main">
                    <tr>
                        <td>Сертификат на путешествие 300 000р</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Планшет Apple iPad mini 256GB </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Смартфон Apple iPhone 14 Pro 256GB </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Умная колонка Яндекс Станция 2, с Алисой</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Чайник Bork K 703 CH</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Наушники Apple AirPods Pro (2 поколение)  </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Портативный аккумулятор Bork (L787)  </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Фен Dyson Supersonic (hd07) </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Электросамокат Bork L602</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Консоль Sony PlayStation 5  </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Воздухоотчиститель Dyson (HP05) </td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Ноутбук Apple MacBook Air 13 M2, 16/256</td>
                        <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    </tbody>
                    <!--
                                <tbody class="winners__list winners__list--tea">
                                  <tr>
                                    <td>Сертификат на путешествие 300 000р</td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Планшет Apple iPad mini 256GB </td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Смартфон Apple iPhone 14 Pro 256GB </td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Умная колонка Яндекс Станция 2, с Алисой</td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Чайник Bork K 703 CH</td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Наушники Apple AirPods Pro (2 поколение)  </td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Портативный аккумулятор Bork (L787)  </td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Фен Dyson Supersonic (hd07) </td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Электросамокат Bork L602</td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Консоль Sony PlayStation 5  </td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Воздухоотчиститель Dyson (HP05) </td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                  <tr>
                                    <td>Ноутбук Apple MacBook Air 13 M2, 16/256</td>
                                    <td>8-925-***-**-91    /    mo****002@mail.ru</td>
                                    <td>20.12.2023</td>
                                  </tr>
                                </tbody> -->

                </table>

                <div class="winners__table__pagination">
                    <button class="pagination-number"><img src="img/icons/pagination-arrow-left.svg" alt="pagination-arrow-left"></button>
                    <button class="pagination-number active">1</button>
                    <button class="pagination-number">2</button>
                    <button class="pagination-number">3</button>
                    <button class="pagination-number"><img src="img/icons/pagination-arrow-right.svg" alt="pagination-arrow-right"></button>
                </div>

                <div class="winners__button--wrap">
                    <button class="button__return">ВЕРНУТЬСЯ НА ГЛАВНУЮ</button>
                    <div class="button__return--back"></div>
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

<!-- переход на главную -->
<script>
    if(document.querySelector('.button__return')) {

        buttonReturn = document.querySelector('.button__return');

        buttonReturn.addEventListener('click', function(){
            window.location.href = 'index.html';
        })

        document.querySelector('.prize-button--mobile').addEventListener('click', {

        })

    }
</script>

<script>

    const prizePutton = document.querySelector('.prize-button')
    const prizeButtonWrap = document.querySelector('.prize-button--wrap')

    const prizeButtonMobile = document.querySelector('.prize-button--mobile')

    prizeButtonWrap.addEventListener('click', function(){

        if(window.screen.width > 991){
            prizePutton.classList.toggle('prize-button--right')
        }

    })

    prizeButtonMobile.addEventListener('click', function(){

        prizeButtonMobile.classList.toggle('.prize-button--mobile--active')

    })

</script>
<script src="{{ asset("js/bootstrap.js") }}"></script>
<script src="{{ asset("js/bootstrap.js.map") }}"></script>
<script src="{{ asset("js/swiper-bundle.min.js") }}"></script>
<script src="{{ asset("js/script.js") }}"></script>

</body>
</html>
