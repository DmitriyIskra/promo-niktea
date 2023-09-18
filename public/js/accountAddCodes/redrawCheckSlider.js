export default class RedrawCheckSlider {
    constructor(sliderPath, slidesWrapper) {
        this.sliderPath = sliderPath;
        this.slidesWrapper = slidesWrapper;
        this.slider = null;
    }

    initSlider() {
        this.slider = new Swiper(this.sliderPath, {
            // grabCursor: true,
            // keyboard: true,
            slidesPerView: 3,
            spaceBetween: 10,
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
    
        let checkPaginationNext = document.querySelector('.pagination-next--check');
        let checkPaginationPrev = document.querySelector('.pagination-prev--check');
        const r = document.querySelector('.slider-button-next');
        const l = document.querySelector('.slider-button-prev');
        console.log('checkPaginationNext', r)
    
        checkPaginationNext.addEventListener('click', function(){
            r.click();
            // this.slider.slideNext();
        })
    
        checkPaginationPrev.addEventListener('click', function(){
            l.click();
            // this.slider.slidePrev();
        })
    }

    addCheck(check) {

    }

    renderingChecks(arr) {
        console.log(arr)
        // this.slidesWrapper
        arr.forEach( el => {
            const swiperSlide = document.createElement('div');
            swiperSlide.classList.add('swiper-slide');
            swiperSlide.classList.add('account__wr-slide-check');

            const imgCheck = document.createElement('img');
            imgCheck.classList.add('account__img-check');
            imgCheck.src = el.ticket_path;
            imgCheck.alt = 'Чек';

            swiperSlide.append(imgCheck);
            this.slidesWrapper.prepend(swiperSlide);
        });

        this.updateSlider();
    }

    updateSlider() {
        this.slider.updateSlides();
    }
}