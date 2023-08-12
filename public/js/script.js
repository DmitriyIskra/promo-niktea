let codeAddbutton = document.querySelector('.code__add');
let codeSlider = document.querySelector('.code__slider');


if (document.querySelector('.code__add')) {
    codeAddbutton.addEventListener('click', () => {
        codeSlider.classList.toggle('code__sleder--display');
    })

    document.querySelector('.code__submit').addEventListener('click', function () {
        console.log('Кнопка зарегистрировать код')
    })
}


var swiperCheck = new Swiper(".checkSlider", {
    grabCursor: true,
    keyboard: true,
    slidesPerView: 3,
    spaceBetween: 10,
    loop: true,
    // centeredSlide: true,
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
            // width: 540,
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


var roundSlider = new Swiper(".roundSlider", {
    slidesPerView: 8,
    spaceBetween: 10,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".slider-button-next",
        prevEl: ".slider-button-prev",
    },

    grabCursor: true,
    effect: "creative",
    creativeEffect: {
        prev: {
            shadow: true,
            origin: "center center",
            translate: ["55%", "50%", -9500],
            rotate: [0, 0, 0],
            scale: ["2.5"]
        },
        next: {
            origin: "center center",
            translate: ["-55%", "-50%", 1500],
            rotate: [0, 0, 0],
            scale: [22.5]
        },
    },
    limitProgress: 2,
});


let navToggler = document.querySelector('.navbar-toggler');

navToggler.addEventListener('click', function () {
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
    navigation: {
        nextEl: ".code__carousel-next",
        prevEl: ".code__carousel-prev",
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
