
let codeAddbutton = document.querySelector('.code__add');
let codeSlider = document.querySelector('.code__slider');


if(document.querySelector('.code__add')){
    codeAddbutton.addEventListener('click', ()=> {
        codeSlider.classList.toggle('code__sleder--display');
    })

    document.querySelector('.code__submit').addEventListener('click', function(){
        console.log('Кнопка зарегистрировать код')
    })
}


// Слайдер чеков

var swiperCheck = new Swiper(".checkSlider", {
    grabCursor: true,
    keyboard: true,
    slidesPerView: 3,
    spaceBetween: 10,
    loop: true,
    slideShadows: true,
    navigation: {
        nextEl: ".slider-button-next",
        prevEl: ".slider-button-prev",
    },

    pagination: {
        el: ".pagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },

    },


    breakpoints: {
        1360: {
            slidesPerView: 3,
            spaceBetween: 15,
        },
        960: {
            width: 940,
            slidesPerView: 2,
            spaceBetween: 5,
        },

        540: {
            slidesPerView: 2,
            spaceBetween: 0,
        },
        300: {
            with: 300,
            slidesPerView: 2,
            spaceBetween: 5,
        },
    }
});



let navToggler = document.querySelector('.navbar-toggler');

navToggler.addEventListener('click', function(){
    navToggler.classList.toggle('burgerChecked');
    document.querySelector('.navbar-toggler-icon').classList.toggle('navbar-toggler-icon--close')
})


var swiperCode = new Swiper(".codeSlider", {
    grabCursor: true,
    keyboard: true,
    slidesPerView: 3,
    spaceBetween: 2,
    loop: true,
    centeredSlides: true,
    slideShadows: true,
    // initialSlide: 2,
    navigation: {
        nextEl: ".code__carousel-next",
        prevEl: ".code__carousel-prev",
    },
    breakpoints: {
        300: {
            with: 300,
            slidesPerView: 3,
            // spaceBetween: 0,
        },
    },

    992: {
        centeredSlides: true,
        slidesPerView: 3,
        spaceBetween: 10,
    },


});

document.querySelector('.code__add').addEventListener('click', function(){
    swiperCode.slideNext();
})


// var roundSlider = new Swiper(".roundSlider", {
//   slidesPerView: 8,
//   spaceBetween: 10,
//   loop: true,
//   centeredSlides: true,
//   height: 500,
//   centeredSlidesBounds: true,
//   pagination: {
//     el: ".swiper-pagination",
//     clickable: true,
//   },
//   navigation: {
//     nextEl: ".slider-button-next",
//     prevEl: ".slider-button-prev",
//   },

//   grabCursor: true,
//   limitProgress: 1,
// });


// формы

//Валидация

if(document.querySelector('form')){
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
}


// document.querySelector('.modal_close').addEventListener('click', function (){
//   document.getElementById("enterAccountForm").reset();
// })

// Маска телефона

document.addEventListener("DOMContentLoaded", function () {
    var eventCalllback = function (e) {
        var el = e.target,
            clearVal = el.dataset.phoneClear,
            pattern = el.dataset.phonePattern,
            matrix_def = "+7(___) ___-__-__",
            matrix = pattern ? pattern : matrix_def,
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = e.target.value.replace(/\D/g, "");
        if (clearVal !== 'false' && e.type === 'blur') {
            if (val.length < matrix.match(/([\_\d])/g).length) {
                e.target.value = '';
                return;
            }
        }
        if (def.length >= val.length) val = def;
        e.target.value = matrix.replace(/./g, function (a) {
            return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
        });
    }
    var phone_inputs = document.querySelectorAll('[data-phone-pattern]');
    for (let elem of phone_inputs) {
        for (let ev of ['input', 'blur', 'focus']) {
            elem.addEventListener(ev, eventCalllback);
        }
    }
});

//Проверка файлов

function fileValidation() {
    let fileInput = document.querySelector('.file-upload__label');

    let filePath = fileInput.value;
    let allowedExtensions = /(\.jpg|\.jpeg|\.bmp|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
        let erer = document.getElementById('file-info');
        erer.style.display = 'block';
        erer.innerHTML = 'Тип файла должен быть .jpg,.png,.bmp,.gif,.jpeg ';
        fileInput.value = '';
        return false;
    } else {

        if (fileInput.files && fileInput.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {

                document.getElementById('info').style.display = 'block';
                document.getElementById('info').innerHTML = '<i class="fa fa-check"></i> Okay, Great. This file is accepted';
                document.getElementById('imagePreview').innerHTML = '<img width="140" src="' + e.target.result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

// document.querySelector('.file-upload__in').addEventListener('click', function
//  checkValidation() {
//   let fileInput = document.querySelector('.uploadPhoto');

//   let filePath = fileInput.value;
//   let allowedExtensions = /(\.jpg|\.jpeg|\.bmp|\.png|\.gif|\.avif|\.raw|\.heif|\.heic|\.webp|\.jfif)$/i;
//   if (!allowedExtensions.exec(filePath)) {
//       let erer = document.getElementById('checkUploadPhoto');
//       erer.style.display = 'block';
//       erer.innerHTML = 'Тип файла должен быть .jpg,.png,.bmp,.gif,.jpeg ';
//       erer.console.log('Тип файла должен быть .jpg,.png,.bmp,.gif,.jpeg ')
//       fileInput.value = '';
//       return false;

//     }

//     else {

//       //Image preview - лишнее
//       if (fileInput.files && fileInput.files[0]) {
//           let reader = new FileReader();
//           reader.onload = function(e) {

//               document.getElementById('info').style.display = 'block';
//               document.getElementById('info').innerHTML = '<i class="fa fa-check"></i> Okay, Great. This file is accepted';
//               document.getElementById('imagePreview').innerHTML = '<img width="140" src="' + e.target.result + '"/>';
//           };
//           reader.readAsDataURL(fileInput.files[0]);
//       }
//   }
// }
// )






// Валидация e-mail

const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;
const input = document.querySelector('.email-auth');

function isEmailValid(value) {
    return EMAIL_REGEXP.test(value);
}

function onInput() {
    if (isEmailValid(input.value)) {
        input.style.borderColor = 'green';
    } else {
        input.style.borderColor = 'red';
    }
}

// input.addEventListener('input', onInput);


// email: /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/gi,

// Оверлей


let scrollBarWidth = window.innerWidth - document.body.clientWidth;

let overlayOpen = function() {

    overlayBackground.style.display = "flex";
    carouselOverlay.style.display = "flex";
    document.body.style.position = 'fixed';
    document.body.style.paddingRight =  scrollBarWidth + 'px';
    console.log('Оверлей открыт');
}

carouselContent.addEventListener('click', function(event){
    event.preventDefault();
    overlayOpen();
});

// Закрытие модального окна

let overlayClose = function() {
    overlayBackground.style.display = "none";
    carouselOverlay.style.display = "none";
    document.body.style.position = 'relative';
    document.body.style.paddingRight = 0 + 'px';
    carouselOverlay.innerHTML = '';
    console.log('Оверлей закрыт');
}

overlayBackground.addEventListener('click', function(event){
    overlayClose();
}, )
