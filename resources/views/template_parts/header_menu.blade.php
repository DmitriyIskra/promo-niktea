<nav class="navbar__wrap navbar-expand-lg">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon navbar-toggler-icon2"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-navq header__list">
            <script>
                cookie_cache = getCookie("niktea_session")
                let div_login = document.createElement('div');
                if (cookie_cache) {
                    div_login.innerHTML = "<li class='header__item' data-bs-target='#exampleModalToggle' data-bs-toggle='modal'><a href='/account' class='header__link'>Регистрация</a> </li>"
                } else {
                    div_login.innerHTML = "<li class='header__item' data-bs-target='#exampleModalToggle' data-bs-toggle='modal'><a href='#' class='header__link'>Регистрация</a> </li>"
                }
                $(".navbar-navq").prepend(div_login);
            </script>
            <li class="header__item">
                <a href="#" class="header__link">Победители</a>
            </li>
            <li class="nav-item header__logo d-none d-lg-block">
                <a href="/">
                    <img class="header__logo--img" src="img/icons/logo.svg" alt="logo">
                </a>
            </li>
            <li class="header__item">
                <a href="/winners" class="header__link">Призы</a>
            </li>
            <script>
                let div_account = document.createElement('div');
                if (cookie_cache) {
                    div_account.innerHTML = "<li class='header__item'><button class='header__button' id='userAccount'><a href='/account'>Личный кабинет</a></button></li>"
                } else {
                    div_account.innerHTML = "<li class='header__item' data-bs-target='#exampleModalToggle' data-bs-toggle='modal'><a href='#' class='header__link'>Личный кабинет</a> </li>"
                }
                $(".navbar-navq").append(div_account);
            </script>
        </ul>
    </div>

</nav>
