<nav class="navbar__wrap navbar-expand-lg">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon navbar-toggler-icon2"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-navq header__list">
            <li class='header__item header__item_registration' data-bs-target='#exampleModalToggle' data-bs-toggle='modal'>
                <a id="reglink" class='header__link'>Регистрация</a>
            </li>
            <li class="header__item">
                <a href="/winners" class="header__link">Победители</a>
            </li>
            <li class="nav-item header__logo d-none d-lg-block">
                <a href="/">
                    <img class="header__logo--img" src="{{ asset('img/icons/logo.svg') }}" alt="logo">
                </a>
            </li>
            <li class="header__item">
                <a href="#" class="header__link header__link-prizes">Призы</a>
            </li>
            <li class='header__item header__item_account' data-bs-target='#exampleModalToggle' data-bs-toggle='modal'>
                <a id="lkbuttonpc" class='header__link'>Личный кабинет</a>
            </li>
            <li class="close-mobile-menu">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" fill="none">
                    <path d="M1.76465 1.76465L26.7214 26.7214" stroke="white" stroke-width="3" stroke-linecap="round"/>
                    <path d="M26.4705 1.76465L1.76465 26.4705" stroke="white" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </li>
        </ul>
    </div>

</nav> 
<a class="navbar-brand d-lg-none logo-mobile--wrap" href="/">
    <img src="{{ asset('img/icons/logo-mobile.svg') }}" alt="logo-mobile">
</a>
<a class="navbar-brand d-lg-none account-logo-mobile" id="mobileaccountbutton" data-bs-target='#exampleModalToggle' data-bs-toggle='modal'>
</a>
<script>
    var auther = CurrentAuthorizeCheck()
    if (auther.is_auth === true) {
        div_href = "/account"

        // контроль активации/деактивации режима вызова модалки
        controllGetModal(true);
    } else {
        div_href = "#"
    }
    $("#reglink").attr('href', div_href);
    $("#lkbuttonpc").attr('href', div_href);
    $("#mobileaccountbutton").attr('href', div_href);
</script>
