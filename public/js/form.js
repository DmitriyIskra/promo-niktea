function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}
function CurrentAuthorizeCheck(){
    let a = null
    console.log(getCookie("niktea_session"))
    cookie_auth = getCookie("niktea_session")
    var settings = {
        "url": "http://niktea/api/auth/checker",
        "method": "GET",
        "timeout": 0,
        "async": false
    };

    $.ajax(settings).done(function (response) {
        a = response;
    });
    return a;
}
function authorize() {
    const formSignIn = document.getElementById('signinForm');
    formSignIn.addEventListener('submit', SendAuth);

    function SendAuth(event) {
        event.preventDefault();
        const name = formSignIn.querySelector('[name="email"]'), //получаем поле name
            password = formSignIn.querySelector('[name="password"]') //получаем поле age
        data = JSON.stringify({
            "email": name.value,
            "password": password.value
        })

        console.log(data)
        var settings = {
            "url": "http://niktea/api/auth/login",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
            },
            "data": data
        };

        $.ajax(settings).done(function (response) {
            console.log(document.cookie = `niktea_session=${response.auth_token}`)
            //window.location.href = "http://niktea/account";
            console.log(response);
        });
    }
}


$( document ).ready(function() {
    CurrentAuthorizeCheck()
    authorize()
   // })

    /*
        const form = document.getElementById('user-data');

        form.addEventListener('submit', async event => {
            event.preventDefault();

            const formData = new FormData(form);

            console.log(formData)

            try {
                const res = await fetch(
                    'https://dev.nikteaworld.com/api/auth/register',
                    {
                        method: 'POST',
                        body: formData,
                        redirect: 'follow'
                    },
                );

                const resData = await res.json();

                console.log(resData);
            } catch (err) {
                console.log(err.message);
            }
        });

        let exampleCodes = {
            codeN: [
                '3548-QTNS5N',
                '3549-QTNS5N',
                't550-QTNS5N',
                'x551-QTNS5N',
                'x552-QTNS5N',
                'xrg4-QTNS5N',
                '3554-QTNS5N',
                'ee55-QTNS5N',
                '3556-QTNS5N',
                '3551-QTNS5N',
                'ww52-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',

                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',


                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',


                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',


                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',


                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',


                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                'два5-QTNS5N',
                '3556-QTNS5N',
                'три4-QTNS5N',
                'три5-QTNS5N',
                '3556-QTNS5N',
                '3552-QTNS5N',
                '3554-QTNS5N',
                '3554-QTNS5N',
                '3555-QTNS5N'

            ]
        }

    // Таблица кодов. Для даты заглушка

        let codeList = document.getElementsByClassName('code__list');

        codeList.innerHTML = '';

        exampleCodes.codeN.forEach((code, i) => {
            codeList.innerHTML += `
                      <li class="code__item">
                      <span class="code__value">${code}</span>
                      <span class="code__date">22.06.2023</span>
                      </li>
                      `
        })

        if (document.getElementsByClassName('winners__list')) {

            let winnersList = document.getElementsByClassName('winners__list');

            winnersList.innerHTML = '';

            exampleCodes.codeN.forEach((code, i) => {
                winnersList.innerHTML += `
      <tr>
      <td>Сертификат на путешествие 300 000р</td>
      <td>8-925-***-**-91    /    mo****002@mail.ru</td>
      <td>20.12.2023</td>
    </tr>
                      `
            })

        }


    // Слайдер кодов

        let codeSlides = document.getElementsByClassName('codeslider-output');

        codeSlides.innerHTML = '';

        exampleCodes.codeN.forEach((codeS, i) => {
            codeSlides.innerHTML += `
                      <div class="swiper-slide swiper-slide--width">
                      <span class="code__text">${codeS}</span>
                      </div>
                      `
        })

    // Слайдер чеков

        let exampleChecks = {
            checkIMAGE: [
                'img/check/check2.jpg',
                'img/check/check2.jpg',
                'img/check/check2.jpg',
                'img/check/check2.jpg',
                'img/check/check2.jpg',
                'img/check/check2.jpg',
                'img/check/check2.jpg',
                'img/check/check2.jpg',
                'img/check/check2.jpg',
                'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                // 'img/check/check2.jpg',
                'img/check/check2.jpg'

            ]
        }

        let checkSlides = document.getElementsByClassName('checkSlides');

        checkSlides.innerHTML = '';

        exampleChecks.checkIMAGE.forEach((check, i) => {
            checkSlides.innerHTML += `
      <div class="swiper-slide slide__check">
      <div class="slider__check-box">
        <img class="slider__check-image" src="${check}" alt="check">
      </div>
    </div>
    `
        })

    // Пагинация блока кодов

        const paginationNumbers = document.getElementById("pagination-numbers");
        const paginatedList = document.getElementById("paginated-list");
        const listItems = paginatedList.getElementsByTagName("li");
        const nextButton = document.getElementById("next-button");
        const prevButton = document.getElementById("prev-button");

        let paginationLimit = '';

        if (window.screen.width < 1200) {
            paginationLimit = 7;
        } else {
            paginationLimit = 14;
        }

        const pageCount = Math.ceil(listItems.length / paginationLimit);
        let currentPage = 1;

        const disableButton = (button) => {
            button.classList.add("disabled");
            button.setAttribute("disabled", true);
        };

        const enableButton = (button) => {
            button.classList.remove("disabled");
            button.removeAttribute("disabled");
        };

        const handlePageButtonsStatus = () => {
            if (currentPage === 1) {
                disableButton(prevButton);
            } else {
                enableButton(prevButton);
            }

            if (pageCount === currentPage) {
                disableButton(nextButton);
            } else {
                enableButton(nextButton);
            }
        };

        const handleActivePageNumber = () => {
            document.querySelectorAll(".pagination-number").forEach((button) => {
                button.classList.remove("active");
                const pageIndex = Number(button.getAttribute("page-index"));
                if (pageIndex == currentPage) {
                    button.classList.add("active");
                }
            });
        };

        const appendPageNumber = (index) => {
            const pageNumber = document.createElement("button");
            pageNumber.className = "pagination-number";
            pageNumber.innerHTML = index;
            pageNumber.setAttribute("page-index", index);
            pageNumber.setAttribute("aria-label", "Page " + index);

            paginationNumbers.appendChild(pageNumber);
        };

        const getPaginationNumbers = () => {
            for (let i = 1; i <= pageCount; i++) {
                appendPageNumber(i);
            }
        };

        const setCurrentPage = (pageNum) => {
            currentPage = pageNum;

            handleActivePageNumber();
            handlePageButtonsStatus();

            const prevRange = (pageNum - 1) * paginationLimit;
            const currRange = pageNum * paginationLimit;

            listItems.forEach((item, index) => {
                item.classList.add("hidden");
                if (index >= prevRange && index < currRange) {
                    item.classList.remove("hidden");
                }
            });
        };

        window.addEventListener("load", () => {
            getPaginationNumbers();
            setCurrentPage(1);

            prevButton.addEventListener("click", () => {
                setCurrentPage(currentPage - 1);
            });

            nextButton.addEventListener("click", () => {
                setCurrentPage(currentPage + 1);
            });

            document.querySelectorAll(".pagination-number").forEach((button) => {
                const pageIndex = Number(button.getAttribute("page-index"));

                if (pageIndex) {
                    button.addEventListener("click", () => {
                        setCurrentPage(pageIndex);
                    });
                }
            });
        });



        let cookies = document.cookie
            .split(';')
            .map(cookie => cookie.split('='))
            .reduce((accumulator, [key, value]) => ({...accumulator, [key.trim()]: decodeURIComponent(value)}), {});


        let keyCookie = cookies.nektia_session;


        console.log('передаваемый ключ из куки: ' + keyCookie)


        // очищаем куки

        function deleteAllCookies() {
            document.cookie.split(';').forEach(function (c) {
                document.cookie = c.trim().split('=')[0] + '=;' + 'expires=Thu, 01 Jan 1970 00:00:00 UTC;';
            });
        }


        // Деавторизация выход

        if (document.querySelector('.log-out__button')) {
            let logOut = document.querySelector('.log-out__button');

            logOut.addEventListener('click', async () => {

                var myHeaders = new Headers();
                myHeaders.append("Cookie", `"nektia_session=${keyCookie}"`);

                var requestOptions = {
                    method: 'GET',
                    headers: myHeaders,
                    redirect: 'follow'
                };

                await fetch("https://dev.nikteaworld.com/api/auth/logout", requestOptions)
                    .then(response => response.text())
                    .then(result => console.log(result))
                    .catch(error => console.log('error', error));


                deleteAllCookies()
            })
        }

    // Проверка авторизованности

        if (document.querySelector('.checkAuth')) {
            const checkAuth = document.querySelector('.checkAuth');

            checkAuth.addEventListener('click', async event => {
                event.preventDefault();

                console.log('проверка авторизованнсоти- куки: ' + document.cookie)

                var myHeaders = new Headers();

                myHeaders.append('Cookie', `'nektia_session=${keyCookie}'`)


                var requestOptions = {
                    method: 'GET',
                    headers: myHeaders,
                    // body: raw,
                    redirect: 'follow'
                };

                try {
                    const res = await fetch("https://dev.nikteaworld.com/api/auth/checker", requestOptions)
                        .then(response => response.text())
                        .then(result => console.log(result + 'проверка авторизованности'))
                        .catch(error => console.log('error', error));

                } catch (err) {
                    console.log(err.message);
                }

            });
        }


    // Данные пользователя Account info
        if (document.querySelector('.test__button')) {

            let testButton = document.querySelector('.test__button');

            testButton.addEventListener('click', async event => {

                var myHeaders = new Headers();

                myHeaders.append("Cookie", `"nektia_session=${keyCookie}"`)

                var requestOptions = {
                    method: 'GET',
                    headers: myHeaders,
                    redirect: 'follow',
                    credentials: "same-origin"
                };

                await fetch("https://dev.nikteaworld.com/api/account/info", requestOptions)
                    .then(response => response.text())
                    .then(result => console.log(result))
                    .catch(error => console.log('error', error));


                try {


                    myHeaders.append("Cookie", `"nektia_session=${keyCookie}"`);

                    var requestOptions = {
                        method: 'GET',
                        headers: myHeaders,
                        redirect: 'follow',
                        credentials: "same-origin"
                    };

                    const res = await fetch("https://dev.nikteaworld.com/api/account/info", requestOptions)
                        .then(response => response.text())
                        .then(result => console.log(result + ' данные пользователя'))
                        .catch(error => console.log('error', error));

                } catch (err) {
                    console.log(err.message);
                }

            });
        }
        */

})
