// Коды пользователя

(async () => {
    let response = await fetch('/test.json');
    let userData = await response.json();


// for (var key in userData) {
//     console.log(key, userData[key])
// }

    const objectArray = Object.entries(userData);

// objectArray.forEach(([key, value]) => {
//   console.log(key);
//   console.log(value);
// });

    let activatedCodes = {}
    for (const [key, value] of Object.entries(userData)) {
        if (key.includes('activated_codes')) {
            activatedCodes[key] = value
        }
    }

    let activatedCodesValue = {}
    for (const [key, value] of Object.entries(activatedCodes)) {
        if (key.includes('service_device_id')) {
            activatedCodesValue[key] = value
        }
    }

    console.log(activatedCodesValue)

    let exampleCodes = {
        codeN: [
            '3548-QTNS5N',
            '3549-QTNS5N',
            '3550-QTNS5N',
            '3551-QTNS5N',
            '3552-QTNS5N',
            '3554-QTNS5N',
            '3554-QTNS5N',
            '3555-QTNS5N',
            '3556-QTNS5N',
            '3551-QTNS5N',
            '3552-QTNS5N',
            '3554-QTNS5N',
            '3554-QTNS5N',
            '3555-QTNS5N',
            '3556-QTNS5N',
            '3552-QTNS5N',
            '3554-QTNS5N',
            '3554-QTNS5N',
            '3555-QTNS5N',
            '3556-QTNS5N'
        ]
    }

    let codeList = document.querySelector('.code__list');

// codeList.innerHTML = '';

// exampleCodes.codeN.forEach((code, i) => {
//   codeList.innerHTML += `
//                   <li class="code__item">
//                   <span class="code__value">${code}</span>
//                   <span class="code__date">22.06.2023</span>
//                   </li>
//                   `
// })

})();

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


// Данные пользователя Account info


let testButton = document.querySelector('.test__button');

testButton.addEventListener('click', async event => {



    try {
        myHeaders.append("Cookie", "nektia_session=Ps2u4jm3pt9twSkj2VUgCNUqCWyyHt8Lt3dJ6Sr0");

        var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
        };

        const res = await fetch("https://dev.nikteaworld.com/api/account/info", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));

    } catch (err) {
        console.log(err.message);
    }


});

const form = document.getElementById('user-data');

form.addEventListener('submit', async event => {
    event.preventDefault();

    const formData = new FormData(form);

    console.log(formData)

    // for (var value of formData.values()) {
    //     console.log(value);
    //   }


    const headersReg = '';

    try {
        const res = await fetch(
            'https://dev.nikteaworld.com/api/auth/register',
            {
                method: 'POST',
                // headers: headersReg,
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


// Вход в систему

const formSignIn = document.getElementById('signinForm');

formSignIn.addEventListener('submit', async event => {
    event.preventDefault();

    const formSignData = new FormData(formSignIn);

    formSignData.forEach((value, key) => {
        console.log(`${key}: ${value}`);
    });


    try {
        const res = await fetch(
            'https://dev.nikteaworld.com/api/auth/login',
            {
                method: 'POST',
                body: formSignData,
                redirect: 'follow'
            },
        );

        const resData = await res.json();

        console.log(resData);
    } catch (err) {
        console.log(err.message);
    }

});



// Проверка авторизованности

const checkAuth = document.getElementById('userAccount');

checkAuth.addEventListener('click', async event => {
    event.preventDefault();
//проверка авторизованности
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "nektia_session=F0dv16gjCbOHMu1iit8lzfW8p5lweUQ1igie6C4x");



    var requestOptions = {
        method: 'GET',
        // headers: myHeaders,
        // body: raw,
        redirect: 'follow'
    };

    try {
        const res = await fetch("https://dev.nikteaworld.com/api/auth/checker", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));

    } catch (err) {
        console.log(err.message);
    }

// получаем данные пользователя (без проверки)


});

// Данные пользователя Account info

// var requestOptions = {
//     method: 'POST',
//     headers: myHeaders,
//     body: formdata,
//     redirect: 'follow'
//   };

//   fetch("https://dev.nikteaworld.com/api/auth/register", requestOptions)
//     .then(response => response.text())
//     .then(result => console.log(result))
//     .catch(error => console.log('error', error));


//  var formdata = new FormData();
//  formdata.append("name", "Elvis");
//  formdata.append("second_name", "Presley");
//  formdata.append("patronymic", "89254958747");
//  formdata.append("phone", "89198189");
//  formdata.append("email", "dimaprogm3a@gmail.com");
//  formdata.append("code[]", "1889-3REG7BA");
//  formdata.append("code[]", "1889-3REG7BA");
//  formdata.append("check", fileInput.files[0], "[PROXY]");

//  var requestOptions = {
//    method: 'POST',
//    body: formdata,
//    redirect: 'follow'
//  };

//  fetch("https://dev.nikteaworld.com/api/auth/register", requestOptions)
//    .then(response => response.text())
//    .then(result => console.log(result))
//    .catch(error => console.log('error', error));


// const form = document.querySelector('#signinForm');
// const formData = new FormData(form);

// formData.forEach((value, key) => {
//     console.log(`${key}: ${value}`);
//   });

//   fetch('https://dev.nikteaworld.com/api/auth/login', {
//     method: 'POST',
//     body: new FormData( document.getElementById('signinForm') )
//  });

//// Просто образец

/// Пытался отправлять в виде json

// const codeArr = [];


//      const isValidElement = element => {

//       return element.name && element.value;
//     };

//     const isValidValue = element => {
//       return (!['checkbox', 'radio'].includes(element.type) || element.checked);
//     };

//     const isCheckbox = element => element.type === 'checkbox';

//     /**
//      * Проверяет, если input с множественным выбором
//      * @param  {Element} element  the element to check
//      * @return {Boolean}          true если мультиселект, false- если нет
//      */
//     const isMultiSelect = element => element.options && element.multiple;

//     /**
//      * Извлекает параметры в виде массива
//      * @param  {HTMLOptionsCollection} options  the options for the select
//      * @return {Array}                          an array of selected option values
//      */
//     const getSelectValues = options => [].reduce.call(options, (values, option) => {
//       return option.selected ? values.concat(option.value) : values;
//     }, []);

//     /**
//      * A more verbose implementation of `formToJSON()` to explain how it works.
//      *
//      * NOTE: This function is unused, and is only here for the purpose of explaining how
//      * reducing form elements works.
//      *
//      * @param  {HTMLFormControlsCollection} elements  the form elements
//      * @return {Object}                               form data as an object literal
//      */
//     const formToJSON_deconstructed = elements => {

//       // This is the function that is called on each element of the array.
//       const reducerFunction = (data, element) => {

//         // Add the current field to the object.
//         data[element.name] = element.value;

//         // For the demo only: show each step in the reducer’s progress.
//         console.log(JSON.stringify(data));

//         return data;
//       };

//       // Начальное значение `data` in `reducerFunction()`.
//       const reducerInitialValue = {};

//       // Вывод начального значения  `{}`.
//       console.log('Initial `data` value:', JSON.stringify(reducerInitialValue));

//       // Now we reduce by `call`-ing `Array.prototype.reduce()` on `elements`.
//       const formData = [].reduce.call(elements, reducerFunction, reducerInitialValue);

//       // Результат.
//       return formData;
//     };

//     /**
//      * Извлекает данные из формы и возвращает их в виде объекта JSON.
//      * @param  {HTMLFormControlsCollection} elements  элементы формы
//      * @return {Object}  данные в виде объекта
//      */
//     const formToJSON = elements => [].reduce.call(elements, (data, element) => {

//       // проверка валидности элемента.
//       if (isValidElement(element) && isValidValue(element)) {

//         /*
//          * Проверка на наличие множественных значений
//          */
//         if (isCheckbox(element)) {
//           data[element.name] = (data[element.name] || []).concat(element.value);
//         } else if (isMultiSelect(element)) {
//           data[element.name] = getSelectValues(element);
//         } else {
//           data[element.name] = element.value;
//         }
//       }

//       return data;
//     }, {});


//     const handleFormSubmit = event => {

//       event.preventDefault();

//       const data = formToJSON(form.elements);


//       const dataContainer = document.getElementsByClassName('results__display')[0];


//       dataContainer.textContent = JSON.stringify(data, null, "  ");


//       // console.log(dataContainer.textContent)


//       codeArr.push(Object.values(data))
//       if(codeArr.length<=15){
//         console.log(codeArr);
//         dataContainer.textContent = codeArr + " ";
//         document.querySelector('.registry__input--field').value= '';
//       }
//       else{
//         console.log('Вы ввели 15 кодов');
//       }

//       let valuesCode = Object.values(data);
//       console.log(valuesCode + " ")

//     };

//     fetch('https://dev.nikteaworld.com/api/auth/register')
//   .then((response) => {
//     return response.json();
//   })
//   .then((data) => {
//     console.log(data);
//   });

//     /*
//      * Находим элемент формы по классу, вызываем функцию `handleFormSubmit()` по событию `submit
//      */
//     const form = document.getElementsByClassName('contact-form')[0];
//     form.addEventListener('submit', handleFormSubmit);


