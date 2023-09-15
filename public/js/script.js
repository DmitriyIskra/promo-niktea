window.addEventListener('load', () => {
    // Слайдер кодов

    // let codeArr = [];
    // let codePlace = null;

    // const codeAddbutton = document.querySelector('.code__add');
    // const codeSlider = document.querySelector('.code__slider');
    // const codeSubmit = document.querySelector('.code__submit')

    // function registerEvents() {
    //   codeAddbutton.addEventListener('click', () => {
    //     codeSlider.classList.add('code__sleder--display');
    //   })
    // }

    // if(codeAddbutton){


    //   codeSubmit.addEventListener('click', (e) => {
    //     console.log('Кнопка зарегистрировать код')
    //   })
    // }

    // слайдер кодов при добавлении
    let swiperCode = new Swiper(".codeSlider", {
        grabCursor: true,
        keyboard: true,
        slidesPerView: 1,
        spaceBetween: 2,
        loop: true,
        centeredSlides: true,
        slideShadows: true,
        navigation: {
            nextEl: ".code__carousel-next",
            prevEl: ".code__carousel-prev",
        },
        breakpoints: {
            992: {
                // centeredSlides: true,
                slidesPerView: 1,
                spaceBetween: 0,
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            300: {
                // with: 200,
                slidesPerView: 1,
                spaceBetween: 0,
            },
        },

    });

})




//--------------------- СЛАЙДЕР ЧЕКОВ


if(document.querySelector('.checkSlider')) {

    let swiperCheck = new Swiper(".checkSlider", {
        // grabCursor: true,
        keyboard: true,
        slidesPerView: 3,
        // spaceBetween: 10,
        // loop: true,
        slideShadows: true,
        // отменили перетаскивание на ПК
        simulateTouch: false,
        navigation: {
            nextEl: ".slider-button-next",
            prevEl: ".slider-button-prev",
        },

        pagination: {
            el: ".pagination",
            type: "bullets",
            // динамические булеты
            dynamicBullets: true,
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 1) + "</span>";
            },
        },

        // медиа запросы min-width
        breakpoints: {
            1920: {
                slidesPerView: 3,
                // spaceBetween: 15,
            },
            1536: {
                slidesPerView: 2,
                // spaceBetween: 15,
            },
            1280: {
                slidesPerView: 1,
                // spaceBetween: 15,
            },
            768: {
                // width: 940,
                slidesPerView: 3,
                // spaceBetween: 5,
            },
            // 540: {
            //   slidesPerView: 1,
            //   // spaceBetween: 0,
            // },
            300: {
                slidesPerView: 1,
                // spaceBetween: 5,
            },
        }
    });

    let checkPaginationNext = document.querySelector('.pagination-next--check')
    let checkPaginationPrev = document.querySelector('.pagination-prev--check')


    checkPaginationNext.addEventListener('click', function(){
        swiperCheck.slideNext();
    })

    checkPaginationPrev.addEventListener('click', function(){
        swiperCheck.slidePrev();
    })

}

//--------------------- END СЛАЙДЕР ЧЕКОВ


//--------------------- М А С К А  Т Е Л Е Ф О Н А

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

//--------------------- E N D  М А С К А  Т Е Л Е Ф О Н А


//   ------------ !!!!!!!!!!!!!!!!!!!!!!!!!!

// let add = document.querySelector('.navbar-toggler');

//   navToggler.addEventListener('click', function(){
//     navToggler.classList.toggle('burgerChecked');
//     document.querySelector('.navbar-toggler-icon').classList.toggle('navbar-toggler-icon--close')
//   })





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

//  if(document.querySelector('form')){
//   (function () {
//     'use strict'

//     var forms = document.querySelectorAll('.needs-validation')

//     Array.prototype.slice.call(forms)
//       .forEach(function (form) {
//         form.addEventListener('submit', function (event) {
//           if (!form.checkValidity()) {
//             event.preventDefault()
//             event.stopPropagation()
//           }

//           form.classList.add('was-validated')
//         }, false)
//       })
//   })()
//  }


// document.querySelector('.modal_close').addEventListener('click', function (){
//   document.getElementById("enterAccountForm").reset();
// })



//Проверка файлов

// ------------------------ pfrjvtynbk !!!!!!!!!!!!!!!!!!!!
// document.querySelector('.file__upload--input').addEventListener('onchange', ()=>{
//   fileValidation()
// })


// function fileValidation() {
//     let fileInput = document.querySelector('.file__upload--input');

//     let filePath = fileInput.value;
//     let allowedExtensions = /(\.jpg|\.jpeg|\.bmp|\.png|\.gif|\.jfif)$/i;
//     if (!allowedExtensions.exec(filePath)) {
//         let erer = document.getElementById('file-info');
//         erer.style.display = 'block';
//         erer.innerHTML = 'Тип файла должен быть .jpg,.png,.bmp,.gif,.jpeg, .jfif ';
//         fileInput.value = '';
//         return false;
//     } else {

//         if (fileInput.files && fileInput.files[0]) {
//             let reader = new FileReader();
//             reader.onload = function(e) {

//                 document.getElementById('info').style.display = 'block';
//                 document.getElementById('info').innerHTML = 'Загрузите, пожалуйста, чек (внимание, чек должен быть читабельным)';
//                 document.getElementById('imagePreview').innerHTML = '<img width="140" src="' + e.target.result + '"/>';
//             };
//             reader.readAsDataURL(fileInput.files[0]);
//         }
//     }
// }



// document.querySelector('.file-upload__input--user').addEventListener('onchange', ()=>{
//   fileValidation()
// })


// function fileValidation() {
//     let fileInput = document.querySelector('.file-upload__input--user');

//     let filePath = fileInput.value;
//     let allowedExtensions = /(\.jpg|\.jpeg|\.bmp|\.png|\.gif|\.jfif)$/i;
//     if (!allowedExtensions.exec(filePath)) {
//         let erer = document.getElementById('file-info');
//         erer.style.display = 'block';
//         erer.innerHTML = 'Тип файла должен быть .jpg,.png,.bmp,.gif,.jpeg, .jfif ';
//         fileInput.value = '';
//         return false;
//     } else {

//         if (fileInput.files && fileInput.files[0]) {
//             let reader = new FileReader();
//             reader.onload = function(e) {

//                 document.getElementById('info').style.display = 'block';
//                 document.getElementById('info').innerHTML = 'Загрузите, пожалуйста, чек (внимание, чек должен быть читабельным)';
//                 document.getElementById('imagePreview').innerHTML = '<img width="140" src="' + e.target.result + '"/>';
//             };
//             reader.readAsDataURL(fileInput.files[0]);
//         }
//     }
// }


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


// let scrollBarWidth = window.innerWidth - document.body.clientWidth;

// let overlayOpen = function() {

//   overlayBackground.style.display = "flex";
//   carouselOverlay.style.display = "flex";
//   document.body.style.position = 'fixed';
//   document.body.style.paddingRight =  scrollBarWidth + 'px';
//   console.log('Оверлей открыт');
// }

// carouselContent.addEventListener('click', function(event){
//   event.preventDefault();
//   overlayOpen();
// });

// // Закрытие модального окна

// let overlayClose = function() {
//   overlayBackground.style.display = "none";
//   carouselOverlay.style.display = "none";
//   document.body.style.position = 'relative';
//   document.body.style.paddingRight = 0 + 'px';
//   carouselOverlay.innerHTML = '';
//   console.log('Оверлей закрыт');
// }

// overlayBackground.addEventListener('click', function(event){
//   overlayClose();
// }, )


