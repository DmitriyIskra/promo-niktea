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
        "url": "/api/auth/checker",
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

    async function SendAuth(event) {
        event.preventDefault();
        const name = formSignIn.querySelector('[name="email"]') //получаем поле name
        const password = formSignIn.querySelector('[name="password"]') //получаем поле age

        if(!name.value || !password.value) {
          if(!name.value) {
            name.classList.add('invalid');
            name.nextElementSibling.textContent = 'Вы указали некорректную почту';
            name.nextElementSibling.style = 'color: #FFC0C0;';
            name.style = 'border: 1px solid #FFC0C0;';
          } else if (name.value && name.matches('.invalid')) {
            name.classList.remove('invalid');
            name.nextElementSibling.textContent = 'Укажите почту, набранную при регистрации';
            name.nextElementSibling.style = 'color: #ffffff;';
            name.style = 'border: 0;';
          }


          if(!password.value) {
            name.classList.add('invalid');
            password.nextElementSibling.textContent = 'Вы указали неверный код или вышло время ожидания';
            password.nextElementSibling.style = 'color: #FFC0C0;';
            name.style = 'border: 1px solid #FFC0C0;';
          } else if (password.value && password.matches('.invalid')) {
            password.classList.remove('invalid');
            password.nextElementSibling.textContent = 'Введите, пожалуйста, код из E-mail';
            password.nextElementSibling.style = 'color: #ffffff;';
            password.style = 'border: 0;';
          }

          return;
        }

        data = JSON.stringify({
            "email": name.value,
            "password": password.value
        })

        console.log(data)
        // var settings = {
        //     "url": "/api/auth/login",
        //     "method": "POST",
        //     "timeout": 0,
        //     "headers": {
        //         "Content-Type": "application/json",
        //     },
        //     "data": data
        // };

        const res = await fetch("/api/auth/login", {
          method: 'POST',
          headers: {
            "Content-Type": "application/json",
          },
          body: data
        })

        const result = await res.json()

        if(result.is_auth) {
          console.log(document.cookie = `niktea_session=${result.auth_token}`)
          window.location.href = "/account";
        } else {
          name.nextElementSibling.textContent = 'Не правильный логин или пароль';
          name.nextElementSibling.style = 'color: #FFC0C0; font-weight: 700;';

          password.nextElementSibling.textContent = 'Не правильный логин или пароль';
          password.nextElementSibling.style = 'color: #FFC0C0; font-weight: 700;';
        }

        // $.ajax(settings).done(function (response) {
        //   console.log(document.cookie = `niktea_session=${response.auth_token}`)
        //   window.location.href = "http://niktea/account";
        //   console.log(response);

        // });

    }
}


function registration() {
    const formSignIn = document.getElementById('registerprovider');
    const check = formSignIn.querySelector('[name="check"]'); //получаем поле age
    // результат валидации
    let validateVoucher = null;
    // находим label для вывода результата загрузки
    const el = check.parentElement.previousElementSibling;

    // событие на загрузку чека
    check.addEventListener('change', (e) => {

        const regExpFile = /(\/jpg|\/jpeg|\/bmp|\/png|\/gif|\/svg|\/webp)$/g;
        const typeRes = regExpFile.test(e.target.files[0].type);
        const sizeRes = e.target.files[0].size <= 104857600;

        validateVoucher = typeRes && sizeRes ? true : false;


        if(!validateVoucher) {
          check.classList.add('invalid');
          el.textContent = 'Чек должен быть изображением и не превышать 100МБ';
          el.style = 'color: #FFC0C0;';
        } else {
          check.classList.remove('invalid');
          el.textContent = 'Ваш чек успешно загружен';
          el.style = 'color: #ffffff;';
        }

    })

    formSignIn.addEventListener('submit', SendRegister);

    function SendRegister(event) {
        event.preventDefault();

        const name = formSignIn.querySelector('[name="name"]'), //получаем поле name
            second_name = formSignIn.querySelector('[name="second_name"]'), //получаем поле age
            patronymic = formSignIn.querySelector('[name="patronymic"]'), //получаем поле age
            phone = formSignIn.querySelector('[name="phone"]'), //получаем поле age
            email = formSignIn.querySelector('[name="email"]'), //получаем поле age
            code = formSignIn.querySelector('[name="code"]'), //получаем поле age

            conditions = formSignIn.querySelector('.form-check-input')


        let validateEmail = null;
        let validateCode = null;


        if(email.value) {
          validateEmail = /^\S+@\S+\.\S+$/g.test(email.value);
          console.log('email.value', validateEmail)
        }

        if(code.value) {
          // http://niktea/api/code/checkout
          const data = JSON.stringify({code: code.value});

          (async () => {
            const res = await fetch('/api/code/checkout', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json;charset=utf-8'
              },
              body: data,
            })

            validateCode = await res.json(); // error:null или error: "Неверный код"
          })()
        }



        if(!name.value || !second_name.value || !patronymic.value
          || !phone.value || !email.value || !code.value || !check.files[0] ||
           !conditions.checked || !validateEmail || validateCode.error || !check.files[0]) {
            // если все верно то страница перезагрузится и ничего менять не надо,
            // все само сбросится, иначе если хоть одно условие не верно,
            // а какие то верно то убираем ошибку на верных
            if(!name.value) {
              name.classList.add('invalid');
              name.nextElementSibling.textContent = 'Заполните, пожалуйста, имя';
              name.nextElementSibling.style = 'color: #FFC0C0;';
              name.style = 'border: 1px solid #FFC0C0;';
            } else if (name.value && name.matches('.invalid')) {
              name.classList.remove('invalid');
              name.nextElementSibling.textContent = 'имя';
              name.nextElementSibling.style = 'color: #ffffff;';
              name.style = 'border: 0;';
            }

            if(!second_name.value) {
              second_name.classList.add('invalid');
              second_name.nextElementSibling.textContent = 'Заполните, пожалуйста, фамилию';
              second_name.nextElementSibling.style = 'color: #FFC0C0;';
              second_name.style = 'border: 1px solid #FFC0C0;';
            } else if (second_name.value && second_name.matches('.invalid')) {
              second_name.classList.remove('invalid');
              second_name.nextElementSibling.textContent = 'имя';
              second_name.nextElementSibling.style = 'color: #ffffff;';
              second_name.style = 'border: 0;';
            }

            if(!patronymic.value) {
              patronymic.classList.add('invalid');
              patronymic.nextElementSibling.textContent = 'Заполните, пожалуйста, отчество';
              patronymic.nextElementSibling.style = 'color: #FFC0C0;';
              patronymic.style = 'border: 1px solid #FFC0C0;';
            } else if (patronymic.value && patronymic.matches('.invalid')) {
              patronymic.classList.remove('invalid');
              patronymic.nextElementSibling.textContent = 'имя';
              patronymic.nextElementSibling.style = 'color: #ffffff;';
              patronymic.style = 'border: 0;';
            }

            if(!phone.value) {
              phone.classList.add('invalid');
              phone.nextElementSibling.textContent = 'Некорректный номер телефона';
              phone.nextElementSibling.style = 'color: #FFC0C0;';
              phone.style = 'border: 1px solid #FFC0C0;';
            } else if (phone.value && phone.matches('.invalid')) {
              phone.classList.remove('invalid');
              phone.nextElementSibling.textContent = 'имя';
              phone.nextElementSibling.style = 'color: #ffffff;';
              phone.style = 'border: 0;';
            }

            if(!email.value || (email.value && !validateEmail)) {
              email.classList.add('invalid');
              email.nextElementSibling.textContent = 'Некорректная электронная почта';
              email.nextElementSibling.style = 'color: #FFC0C0;';
              email.style = 'border: 1px solid #FFC0C0;';
            } else if (email.value && validateEmail) {
              email.classList.remove('invalid');
              email.nextElementSibling.textContent = 'имя';
              email.nextElementSibling.style = 'color: #ffffff;';
              email.style = 'border: 0;';
            }

            if(!code.value || (code.value && validateCode.error)) {
              code.classList.add('invalid');
              code.nextElementSibling.textContent = 'Извините, но без кода вы не можете принять участие в акции'
              code.nextElementSibling.style = 'color: #FFC0C0;';
              code.style = 'border: 1px solid #FFC0C0;';
            } else if (code.value && !validateCode.error) {
              code.classList.remove('invalid');
              code.nextElementSibling.textContent = 'имя';
              code.nextElementSibling.style = 'color: #ffffff;';
              code.style = 'border: 0;';
            }

            if(!check.files[0] || (check.files[0] && !validateVoucher)) {
              check.classList.add('invalid');
              const el = check.parentElement.previousElementSibling;
              el.textContent = 'Извините, но без чека вы не можете принять участие в акции';
              el.style = 'color: #FFC0C0;';
            }

            if(!conditions.checked) {
              conditions.classList.add('invalid-conditions');
              conditions.style = `border: 2px solid #FFC0C0;`;
            } else if(conditions.checked && conditions.matches('.invalid-conditions')) {
              conditions.classList.remove('invalid-conditions');
              conditions.style = `border: 0;`;
            }

            return;
          }

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
            window.location.href = "/account";
        });
    }
}
function logout() {
    const logOut = document.querySelector('.log-out__button');

    logOut.addEventListener('click', logouter);

    function logouter() {
        var settings = {
            "url": "/api/auth/logout",
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
    const codeList = document.querySelector('.code__list');
    const contCodePag = document.querySelector('.account__pag-num');
    const pagCodeNext = document.querySelector('.account__pag-code_next');

    const windowWidth = window.innerWidth;

    // Заполнение данных о пользователе
    accountLastname.textContent = data.user.second_name;
    accountFirstname.textContent = data.user.name;
    accountPatronymic.textContent = data.user.patronymic;
    accountPhone.textContent = data.user.phone;
    accountMail.textContent = data.user.email;

    const codeWinners = [];
    const restCodes = [];

    data.activated_codes.forEach( el => {
      if(el.code_main_win === 1 || el.code_tea_win === 1) {
        codeWinners.unshift(el);
      } else {
        restCodes.unshift(el);
      }
    })

    console.log(codeWinners)
    console.log(restCodes)

    // Заполнение кодов

    // Заполняем выигрышные коды
    if(codeWinners.length !== 0) {

      codeWinners.forEach( el => {

        const codeItem = document.createElement('li');
        codeItem.classList.add('code__item');
        codeItem.classList.add('code__item_win');

        // начало левой части
        const wrCodeAndWin = document.createElement('div');
        wrCodeAndWin.classList.add('account__wr-code-and-win');

        const wrValue = document.createElement('div');
        wrValue.classList.add('account__wr-value-code');
        const codeWinTextMobile = document.createElement('div');
        codeWinTextMobile.classList.add('account__code-win-text_mobile');
        codeWinTextMobile.textContent = 'ВЫ ВЫИГРАЛИ!';
        const codeValue = document.createElement('div');
        codeValue.classList.add('code__value');
        codeValue.textContent = el.code_string;
        wrValue.append(codeWinTextMobile);
        wrValue.append(codeValue);

        const wrTextIconWin = document.createElement('div');
        wrTextIconWin.classList.add('account__wr-text-icon-win');
        const iconWin = document.createElement('div');
        iconWin.classList.add('account__icon-win');
        if(el.code_main_win === 1) iconWin.classList.add('account__icon-win_main');
        if(el.code_tea_win === 1) iconWin.classList.add('account__icon-win_tea');
        const codeWinTextDesc = document.createElement('div');
        codeWinTextDesc.classList.add('account__code-win-text_desctop');
        codeWinTextDesc.textContent = 'ВЫ ВЫИГРАЛИ!';
        wrTextIconWin.append(iconWin);
        wrTextIconWin.append(codeWinTextDesc);

        wrCodeAndWin.append(wrValue);
        wrCodeAndWin.append(wrTextIconWin);
        // конец левой части

        const codeDate = document.createElement('div');
        const dateArr = el.created_time.split(' ')
        codeDate.textContent = dateArr[0];
        codeDate.classList.add('code__date');

        codeItem.append(wrCodeAndWin);
        codeItem.append(codeDate);


        codeList.append(codeItem);
      })
    }

    // Заполняем не выигрышные коды
    if(restCodes.length !== 0) {
      // количество кодов уже добавленных
      const amountCodes = codeList.children.length;
      // счетчик видимых кодов (сколько еще можно оставить видимыми)
      // показываем максимум 14 кодов
      let counter = 0 + amountCodes;

      restCodes.forEach( el => {
        counter += 1;

        const codeItem = document.createElement('li');
        codeItem.classList.add('code__item');
        const codeValue = document.createElement('span');
        codeValue.classList.add('code__value');
        codeValue.textContent = el.code_string;
        const codeDate = document.createElement('span');
        const dateArr = el.created_time.split(' ')
        codeDate.textContent = dateArr[0];
        codeDate.classList.add('code__date');

        codeItem.append(codeValue);
        codeItem.append(codeDate);

        // если соответствующий экран и сообщений в массиве больше чем разрешено
        // остальные скрываем
        if(windowWidth > 428 && counter > 14) {
          codeItem.classList.add('account__codeHide');
        }

        if(windowWidth <= 428 && counter > 7) {
          codeItem.classList.add('account__codeHide');
        }

        codeList.append(codeItem);
      });
    }

    // активируем пагинацию для десктопа
    if(windowWidth > 428 && data.activated_codes.length > 14) {
      pagCodeNext.classList.add('account__pag-code-arrow_active');

      const amountPagPages = Math.ceil(data.activated_codes.length / 14);

      const wrPagSlides = document.createElement('ul');
      wrPagSlides.classList.add('account__wr-code-pag-list');

      for(let i = 1; i <= amountPagPages; i += 1) {
        const pagSlideItem = document.createElement('li');
        pagSlideItem.classList.add('account__code-pag-item');
        const numPage = document.createElement('div');
        numPage.classList.add('account__code-pag-num-page');
        if( i === 1 ) numPage.classList.add('account__code-pag-num-page_active');
        numPage.textContent = i;
        pagSlideItem.append(numPage);

        wrPagSlides.append(pagSlideItem);
      }


      contCodePag.append(wrPagSlides);

    }

    // активируем пагинацию для мобильного устройства
    if(windowWidth <= 428 && data.activated_codes.length > 7) {
      pagCodeNext.classList.add('account__pag-code-arrow_active');

      const amountPagPages = Math.ceil(data.activated_codes.length / 7);

      const wrPagSlides = document.createElement('ul');
      wrPagSlides.classList.add('account__wr-code-pag-list');

      for(let i = 1; i <= amountPagPages; i += 1) {
        const pagSlideItem = document.createElement('li');
        pagSlideItem.classList.add('account__code-pag-item');
        const numPage = document.createElement('div');
        numPage.classList.add('account__code-pag-num-page');
        if( i === 1 ) numPage.classList.add('account__code-pag-num-page_active');
        numPage.textContent = i;
        pagSlideItem.append(numPage);

        wrPagSlides.append(pagSlideItem);
      }


      contCodePag.append(wrPagSlides);
    }


    sessionStorage.todayCodesActivated = data.today_activated_codes[0].activated_today;

    // Отрисовка оставшегося лимита кодов
    const limitCodesEl = document.querySelector('.code__count');
    const limitCodes = data.today_activated_codes[0].activated_today;
    limitCodesEl.textContent = 15 - limitCodes;
}

function controllMobileMenu() {
  // mobile menu работает от класса show
  const navBar = document.querySelector('.navbar-collapse');

  document.addEventListener('click', (e) => {
    if(!e.target.matches('.navbar-navq')) {
      navBar.classList.remove('show');
    }
  })
}

$( document ).ready(function() {
    authorize()
    registration()
    controllMobileMenu()







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
