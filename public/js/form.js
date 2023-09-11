// Коды пользователя

// Получаем данные пользователя и выводим в форму

// (async () => {
//   let response = await fetch('test.json');
//   let userData = await response.json();

//   JSON.parse(userData, function(k,v){
//     console.log(k);
//     return v;
//   });
  
// for (var key in userData) {
//     console.log(key, userData[key])      
// }    

// const objectArray = Object.entries(userData);

// objectArray.forEach(([key, value]) => {
//   console.log(key);
//   console.log(value);
// }); 

// let activatedCodes = {}
// for (const [key, value] of Object.entries(userData)) {
//   if (key.includes('activated_codes')) {
//     activatedCodes[key] = value
//   }
// }

// let activatedCodesValue = {}
// for (const [key, value] of Object.entries(activatedCodes)) {
//   if (key.includes('service_device_id')) {
//     activatedCodesValue[key] = value
//   }
// }

// console.log(activatedCodesValue)

// })();



// Регистрация

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


// Вход в систему. Авторизация

//   const formSignIn = document.getElementById('signinForm');

//   const formSignData = new FormData(formSignIn);  

//   (async function main() {
//     // var myHeaders = new Headers();
//     // myHeaders.append('Content-Type', 'application/json');
  


// var raw = formSignData

//     const res = await fetch('https://dev.nikteaworld.com/api/auth/login', {
//       // headers: myHeaders,
//       method: 'POST',
//       body: raw,
//       redirect: 'follow',
//     });
  
//     console.log(await res.json());
//   })();


  
// Прошлый вариант загрузки
// const formSignIn = document.getElementById('signinForm');

//   formSignIn.addEventListener('submit', async event => {
//     event.preventDefault();
  
//     const formSignData = new FormData(formSignIn);  
  

//   try {
//       const res = await fetch(
//         'https://dev.nikteaworld.com/api/auth/login',
//         {
//           method: 'POST',    
//           body: formSignData,
//           redirect: 'follow'
//         },
//       );
  
//       var resData = await res.json();
  
//       console.log(resData);
      
//       return res.json();

     
//     } catch (err) {
//       console.log(err.message);
//     }
    
//   });

 

 
// Тестовый набор кодов

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



// Коды для таблицы


// for(var codeAndDate in window.userDataObject) {
//   if(window.userDataObject.hasOwnProperty(codeAndDate)) {
//   //   console.log(codeAndDate); 
//     for (var i = 0, j = window.userDataObject[codeAndDate].length; i < j; i++) {
//       console.log("Код и время создания", window.userDataObject[codeAndDate][i].service_device_id, window.userDataObject[codeAndDate][i].created_time);
//     }
//   }
// }


// Таблица кодов. Для даты заглушка

let codeList = document.querySelector('.code__list'); 

codeList.innerHTML = '';

exampleCodes.codeN.forEach((code, i) => {
  codeList.innerHTML += `
                  <li class="code__item">
                  <span class="code__value">${code}</span>
                  <span class="code__date">22.06.2023</span>
                  </li>
                  `
})

if(document.querySelector('.winners__list')) {

  let winnersList = document.querySelector('.winners__list'); 

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

let codeSlides = document.querySelector('.codeslider-output'); 

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

let checkSlides = document.querySelector('.checkSlides'); 

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
const listItems = paginatedList.querySelectorAll("li");
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



            // Коды для таблицы

            // for(var codeAndDate in window.userDataObject) {
            //   if(window.userDataObject.hasOwnProperty(codeAndDate)) {
            //   //   console.log(codeAndDate); 
            //     for (var i = 0, j = window.userDataObject[codeAndDate].length; i < j; i++) {
            //       console.log("Код и время создания", window.userDataObject[codeAndDate][i].service_device_id, window.userDataObject[codeAndDate][i].created_time);
            //     }
            //   }
            // }

            // // Коды для слайдера

            // for(var codeSlide in window.userDataObject) {
            //   if(window.userDataObject.hasOwnProperty(codeSlide)) {
            //   //   console.log(codeSlide); 
            //     for (var i = 0, j = window.userDataObject[codeSlide].length; i < j; i++) {
            //       console.log("Код", window.userDataObject[codeSlide][i].service_device_id);
            //     }
            //   }
            // } 

            // // Изображения чеков

            // for(var checkImg in window.userDataObject) {
            //   if(window.userDataObject.hasOwnProperty(checkImg)) {
            //   //   console.log(checkImg); 
            //     for (var i = 0, j = window.userDataObject[checkImg].length; i < j; i++) {
            //       console.log("Изображение чека", window.userDataObject[checkImg][i].ticket_path);
            //     }
            //   }
            // } 

            // var myHeaders = new Headers();
            // myHeaders.append("Cookie", "niktea_session=DznQy3hhFrBCRmn90pTWVLZDvfdUK3zHqIqfM3aO");
            
            // var requestOptions = {
            //   method: 'GET',
            //   headers: myHeaders,
            //   redirect: 'follow'
            // };
            
            // fetch("https://dev.nikteaworld.com/api/winners", requestOptions)
            //   .then(response => response.text())
            //   .then(response => response.headers)
            //   .then(result => console.log(result))
            //   .catch(error => console.log('error', error));
            
   


// Вход в систему

// const formSignIn = document.getElementById('signinForm');

// formSignIn.addEventListener('submit', async event => {
//   event.preventDefault();

//   const formSignData = new FormData(formSignIn);  

//   console.log('форма работает')

//   formSignData.forEach((value, key) => {
//     console.log(`${key}: ${value}`);
//   });

// try {
//     const res = await fetch('https://dev.nikteaworld.com/api/auth/login',
//       {
//         method: 'POST',    
//         body: formSignData,
//         redirect: 'follow'
//       },
//     );

//     const resData = await res.json();

//     console.log(resData);

    

//   } catch (err) {
//     console.log(err.message);
//   }

// });

const formSignIn = document.getElementById('signinForm');

formSignIn.addEventListener('submit', function postData() {

  const formSignData = new FormData(formSignIn);  

  fetch('https://dev.nikteaworld.com/api/auth/login', {
      method: 'POST',      
      body: formSignData,
      redirect: 'follow'     
                   
  })
      .then(response => {
          // console.log(response);
          if (!response.ok) {                
              throw Error('ERROR')
          }
          return response.json();
      })              
      .then(data => {
      

        for (const [key, value] of Object.entries(data)) {

          if(key.includes('auth_token')){
            // console.log("токен " + value);

            document.cookie = `nektia_session=${value}`

            console.log(document.cookie)

          }          
        }
      
      })
      .catch(error => {
          console.log(error);
      });
})



let cookies = document.cookie
  .split(';')
  .map(cookie => cookie.split('='))
  .reduce((accumulator, [key, value]) => ({ ...accumulator, [key.trim()]: decodeURIComponent(value) }), {});


  let keyCookie = cookies.nektia_session;
  

  console.log('передаваемый ключ из куки: ' + keyCookie)



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

    console.log('проверка авторизованности- куки: ' + document.cookie)
    
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

  myHeaders.append("Cookie", `nektia_session=${keyCookie}`)

    
  var requestOptions = {
    method: 'GET',
    headers: myHeaders,
    redirect: 'follow'
  };
  
  fetch("https://dev.nikteaworld.com/api/account/info", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
});
}




// let x = document.cookie;

// console.log(x);



// DGSogOnn5y
// miliakhin@alephtrade.com
