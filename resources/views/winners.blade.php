<!DOCTYPE html>
<html lang="ru">

<head>
    @include('template_parts.header_css_js')
    <link rel="stylesheet" href="{{ asset("css/winners.css") }}">
    <title>Призы</title>
</head>

<body data-variant="winners">

<header>
    <div class="header-wrapper header-wrapper--white">
        <title>Победители</title>
        @include('template_parts.header_menu')
        <link rel="stylesheet" href="{{ asset("css/winners.css") }}">

    </div>
</header>

<main class="main">

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
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Планшет Apple iPad mini 256GB</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Смартфон Apple iPhone 14 Pro 256GB</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Умная колонка Яндекс Станция 2, с Алисой</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Чайник Bork K 703 CH</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Наушники Apple AirPods Pro (2 поколение)</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Портативный аккумулятор Bork (L787)</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Фен Dyson Supersonic (hd07)</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Электросамокат Bork L602</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Консоль Sony PlayStation 5</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Воздухоотчиститель Dyson (HP05)</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Ноутбук Apple MacBook Air 13 M2, 16/256</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    </tbody>
                    <tbody class="winners__list winners__list--tea">
                    <tr>
                        <td>Сертификат на путешествие 300 000р</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Планшет Apple iPad mini 256GB</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Смартфон Apple iPhone 14 Pro 256GB</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Умная колонка Яндекс Станция 2, с Алисой</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Чайник Bork K 703 CH</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Наушники Apple AirPods Pro (2 поколение)</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Портативный аккумулятор Bork (L787)</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Фен Dyson Supersonic (hd07)</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Электросамокат Bork L602</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Консоль Sony PlayStation 5</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Воздухоотчиститель Dyson (HP05)</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    <tr>
                        <td>Ноутбук Apple MacBook Air 13 M2, 16/256</td>
                        <td>8-925-***-**-91 / mo****002@mail.ru</td>
                        <td>20.12.2023</td>
                    </tr>
                    </tbody>
                </table>

                <div class="winners__table__pagination">
                    <button class="pagination-number"><img src="{{ asset('img/icons/pagination-arrow-left.svg') }}"
                                                           alt="pagination-arrow-left"></button>
                    <button class="pagination-number active">1</button>
                    <button class="pagination-number">2</button>
                    <button class="pagination-number">3</button>
                    <button class="pagination-number"><img src="{{ asset('img/icons/pagination-arrow-right.svg') }}"
                                                           alt="pagination-arrow-right"></button>
                </div>

                <div class="winners__button--wrap">
                    <button class="button__return">ВЕРНУТЬСЯ НА ГЛАВНУЮ</button>
                    <div class="button__return--back"></div>
                </div>

            </div>

        </section>

    </div>

</main>

@include('template_parts.footer')

<!-- переход на главную -->
<script>
    if (document.querySelector('.button__return')) {

        buttonReturn = document.querySelector('.button__return');

        buttonReturn.addEventListener('click', function () {
            window.location.href = '/';
        })

        document.querySelector('.prize-button--mobile').addEventListener('click', {})

    }
</script>

<script>

    const prizePutton = document.querySelector('.prize-button')
    const prizeButtonWrap = document.querySelector('.prize-button--wrap')

    const prizeButtonMobile = document.querySelector('.prize-button--mobile')

    prizeButtonWrap.addEventListener('click', function () {

        if (window.screen.width > 991) {
            prizePutton.classList.toggle('prize-button--right')
        }

    })

    prizeButtonMobile.addEventListener('click', function () {

        prizeButtonMobile.classList.toggle('.prize-button--mobile--active')

    })

</script>
</body>
</html>
