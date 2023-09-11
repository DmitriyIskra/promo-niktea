<!DOCTYPE html>
<html lang="ru">

<head>
    @include('template_parts.header_css_js')
    <title>Главная</title>
    <link rel="stylesheet" href="{{ asset("css/rules.css") }}">
    <link rel="stylesheet" href="{{ asset("css/winners.css") }}">

</head>

<body class="main-body__image" data-variant="main-page">

<header>
    <div class="header-wrapper header-wrapper__main-page">
        @include('template_parts.header_menu')
    </div>
</header>

@include('template_parts.modal')

<main class="main">

    <div class="breadcrumbs__container">
        <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="/">Главная</a></li>
            <li class="breadcrumbs__item"><a class="breadcrumbs__item__link" href="/catalog"> Правила проведения акции </a></li>
        </ul>
    </div>

    <div class="rules__container">

        <div class="rules__head">
            <h1>Нам 15 лет!</h1>
        </div>

        <section class="rules">

            <div class="rules-body">

                <div class="rules-article">
                    <h2>Бренду Niktea исполняется 15 лет!</h2>
                    <p class="rules-body--text">
                        В честь этой важной для нас даты мы устраиваем розыгрыш призов, среди которых: сертификат на путешествие мечты, Macbook, IPhone, Sony PlayStation, электросамокат Bork и многое другое!
                        <br><br>
                        В 2008 году родился новый бренд – Niktea. Мы прошли долгий путь, сосредотачиваясь на качестве и бережно сохраняя неизменным вкус нашего чая, постоянно совершенствуясь, разрабатывая новые купажи, дизайны и рецепты.
                        <br><br>
                        Niktea — это уникальная коллекция превосходного свежего чая и чайных напитков со всех уголков света — от классического черного и зеленого чая до ароматизированных, фруктовых и травяных композиций.
                        <br><br>
                        Спустя 15 лет, с нашим брендом познакомились тысячи любителей чая.
                        <br><br>
                        Мы ценим каждого покупателя и хотим поделиться этим праздником с Вами!
                    </p>
                </div>

            </div>
            <div class="rules-docs">

                <h2>Правила проведения акции</h2>

                <div class="docs_links__wrap">
                    <div class="docs__link__icon"><img src="img/icons/pdf-icon.svg" alt="Document1" srcset=""></div>
                    <div class="docs__link__icon"><img src="img/icons/pdf-icon.svg" alt="Document2" srcset=""></div>
                </div>

            </div>

    </section>

    </div>

</main>
