<!DOCTYPE html>
<html lang="ru">

<head>
    @include('template_parts.header_css_js')
    <title>Бренд NIktea устраиваем розыгрыш призов в честь 15-летия чайного бренда NIktea!</title>
    <meta name="description" content="Наши призы: сертификат на путешествие мечты, Macbook, IPhone, Sony PlayStation, электросамокат Bork, годовой запас чая NIktea и многое другое!"/>
    <link rel="stylesheet" href="{{ asset("css/rules.css?v=").time()}}">
    <link rel="stylesheet" href="{{ asset("css/winners.css?v=").time()}}">

</head>

<body class="main-body__image" data-variant="main-page">

<header>
    <div class="header-wrapper header-wrapper--white">
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
                    <a class="docs__link__icon" href="привила_проведения_промо_акции_Niktea.pdf" download=""><img src="img/icons/pdf-icon.svg" alt="Document1" srcset=""></a>
                </div>

            </div>

    </section>

    </div>

</main>

@include('template_parts.footer')
</body>
</html>


