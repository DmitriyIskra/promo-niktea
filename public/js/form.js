function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}
function deleteAllCookies() {
    const cookies = document.cookie.split(";");

    for (let i = 0; i < cookies.length; i++) {
        const cookie = cookies[i];
        const eqPos = cookie.indexOf("=");
        const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
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
            "url": "/api/auth/login",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
            },
            "data": data
        };

        $.ajax(settings).done(function (response) {
            console.log(document.cookie = `niktea_session=${response.auth_token}`)
            window.location.href = "http://niktea/account";
            console.log(response);
        });
    }
}

function registration() {
    const formSignIn = document.getElementById('registerprovider');

    formSignIn.addEventListener('submit', SendRegister);

    function SendRegister(event) {
        event.preventDefault();

        const name = formSignIn.querySelector('[name="name"]'), //получаем поле name
            second_name = formSignIn.querySelector('[name="second_name"]'), //получаем поле age
            patronymic = formSignIn.querySelector('[name="patronymic"]'), //получаем поле age
            phone = formSignIn.querySelector('[name="phone"]'), //получаем поле age
            email = formSignIn.querySelector('[name="email"]'), //получаем поле age
            code = formSignIn.querySelector('[name="code"]'), //получаем поле age
            check = formSignIn.querySelector('[name="check"]') //получаем поле age

        var formdata = new FormData();
        formdata.append("name", name.value);
        formdata.append("second_name", second_name.value);
        formdata.append("patronymic", patronymic.value);
        formdata.append("phone", phone.value);
        formdata.append("email", email.value);
        formdata.append("code[]", code.value);
        formdata.append("check", check.files[0]);

        var settings = {
            "url": "/api/auth/register",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "mimeType": "multipart/form-data",
            "contentType": false,
            "data": formdata
        };

        $.ajax(settings).done(function (response) {
            auth_token = JSON.parse(response).auth_token
            console.log(document.cookie = `niktea_session=${auth_token}`)
            window.location.href = "http://niktea/account";
        });
    }
}
function logout() {
    const logOut = document.querySelector('.log-out__button');

    logOut.addEventListener('click', logouter);

    function logouter() {
        var settings = {
            "url": "http://niktea/api/auth/logout",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function (response) {
            console.log(response)
            if(response.is_auth === true) {
                deleteAllCookies()
                window.location.href = "/";
            }
        });
    }
}
async function accountInfo() {
    const requestOptions = {
        method: 'GET',
        redirect: 'follow'
    };

    return await fetch("/api/account/info", requestOptions)
}
// отрисовка данных о пользователе на всей странице личный кабинет
function fillAccountData(data) {
    const accountLastname = document.querySelector('.account__lastname');
    const accountFirstname = document.querySelector('.account__firstname');
    const accountPatronymic = document.querySelector('.account__patronymic');
    const accountPhone = document.querySelector('.account__phone');
    const accountMail = document.querySelector('.account__mail');
    const codeList = document.querySelector('.code__list')

    // Заполнение данных о пользователе
    accountLastname.textContent = data.user.second_name;
    accountFirstname.textContent = data.user.name;
    accountPatronymic.textContent = data.user.patronymic;
    accountPhone.textContent = data.user.phone;
    accountMail.textContent = data.user.email;

    // Заполнение кодов
    // data.activated_codes.forEach( el => {
    //   const codeItem = document.createElement('li');
    //   codeItem.classList.add('code__list');
    //   const codeValue = document.createElement('span');
    //   codeValue.classList.add('code__value');
    //   const codeDate = document.createElement('span');
    //   codeDate.classList.add('code__date');
    // })



    sessionStorage.todayCodesActivated = data.today_activated_codes[0].activated_today;
}


$( document ).ready(function() {
    authorize()
    registration()







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



// _____________________ Таблица кодов. Для даты заглушка

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

if(window.screen.width < 1200){
  paginationLimit = 7;
}
else
{
  paginationLimit =14;
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
  .reduce((accumulator, [key, value]) => ({ ...accumulator, [key.trim()]: decodeURIComponent(value) }), {});


  let keyCookie = cookies.nektia_session;


  console.log('передаваемый ключ из куки: ' + keyCookie)

  // ___________________________________________

  // очищаем куки

  function deleteAllCookies() {
    document.cookie.split(';').forEach(function(c) {
      document.cookie = c.trim().split('=')[0] + '=;' + 'expires=Thu, 01 Jan 1970 00:00:00 UTC;';
    });
}


  // Деавторизация выход

if(document.querySelector('.log-out__button')){
  let logOut = document.querySelector('.log-out__button');

  logOut.addEventListener('click', async ()=>{

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

if(document.querySelector('.checkAuth')){
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
if(document.querySelector('.test__button')){

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
