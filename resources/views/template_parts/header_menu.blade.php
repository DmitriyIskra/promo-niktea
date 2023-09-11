
<nav class="navbar__wrap navbar-expand-lg">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon navbar-toggler-icon2"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-navq header__list">
            <li class='header__item' data-bs-target='#exampleModalToggle' data-bs-toggle='modal'>
                <a id="reglink" class='header__link'>Регистрация</a>
            </li>
            <li class="header__item">
                <a href="#" class="header__link">Победители</a>
            </li>
            <li class="nav-item header__logo d-none d-lg-block">
                <a href="/">
                    <img class="header__logo--img" src="{{ asset('img/icons/logo.svg') }}" alt="logo">
                </a>
            </li>
            <li class="header__item">
                <a href="/winners" class="header__link">Призы</a>
            </li>
            <li class='header__item' data-bs-target='#exampleModalToggle' data-bs-toggle='modal'>
                <a id="lkbuttonpc" class='header__link'>Личный кабинет</a>
            </li>
        </ul>
    </div>

</nav>
<a class="navbar-brand d-lg-none logo-mobile--wrap" href="/">
    <img src="{{ asset('img/icons/logo-mobile.svg') }}" alt="logo-mobile">
</a>
<a class="navbar-brand d-lg-none account-logo-mobile" id="mobileaccountbutton">
</a>
<script>
    var auther = CurrentAuthorizeCheck()
    if (auther.is_auth === true) {
        div_href = "/account"
    } else {
        div_href = "#"
    }
    $("#reglink").attr('href', div_href);
    $("#lkbuttonpc").attr('href', div_href);
    $("#mobileaccountbutton").attr('href', div_href);
</script>
